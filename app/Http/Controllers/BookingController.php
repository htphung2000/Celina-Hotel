<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Department;
use App\Models\Type;
use App\Models\Salary;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Statistic;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Carbon\Carbon;

class BookingController extends Controller
{

    #========================== CUSTOMER ==========================#

    public function index() {
        $result['Types'] = Type::all();
        $result['Departments'] = Department::all();
        return view('booking', $result);
    }

    public function search(Request $request) {
        $time_from = $request->post('start');
        $time_to = $request->post('end');
        if ($time_from >= $time_to) {
            Session::put('Message', 'Ngày trả phòng phải lớn hơn ngày nhận phòng!');
            return redirect('/booking');
        }
        elseif ($time_from < date("Y-m-d")) {
            Session::put('Message', 'Ngày nhận và trả phòng phải lớn hơn ngày hiện tại!');
            return redirect('/booking');
        }
        else {
            $Dpm = Department::where(['DPM_Name' => $request->post('select-department')])->select('ID_Department')->first();
            $Tp = Type::where(['ID_Type' => $request->post('select-room-type')])->select('ID_Type')->first();
    
            $result['Start'] = $request->post('start');
            $result['End'] = $request->post('end');
            $result['Types'] = Type::all();
            $result['Departments'] = Department::all();
            $result['Bills'] = db::table('Bill_Details')->join('Rooms', 'Bill_Details.Room', 'Rooms.ID_Room')->where(['Type' => $Tp->ID_Type])->where(['Department_ID' => $Dpm->ID_Department])->where(function($q) use ($time_from, $time_to) {
                $q->where(['Check_out' => null])->whereBetween('Start_at',  [$time_from, $time_to])->orWhereBetween('End_at', [$time_from, $time_to]);
            })->get();
    
            $result['Count_Bill'] = $result['Bills']->count();
            $result['Rooms'] = Room::join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->where(['Type' => $Tp->ID_Type])->where(['Department_ID' => $Dpm->ID_Department])->get();
            $result['Count_Room'] = $result['Rooms']->count();
            return view('search', $result);
        }
    }

    public function show() {
        $result['Types'] = Type::all();
        $result['Departments'] = Department::all();
        return view('search', $result);
    }

    public function add_into_cart(Request $request) {
        if (Session::get('Customer_ID') == null) {
            return view('login');
        }
        else {
            $Cr = new Cart;
            $Cr->Customer_ID = Session::get('Customer_ID');
            $Cr->Room_ID = $request->post('Room_ID');
            $Cr->Start = $request->post('start');
            $Cr->End = $request->post('end');
            $Cr->created_at = now();
            $Cr->updated_at = now();
            $Cr->save();
            return redirect('/booking');
        }
    }

    public function show_cart() {
        if (Session::get('Customer_ID') == null) {
            return view('login');
        }
        else {
            $result['Items'] = Cart::where(['Customer_ID' => Session::get('Customer_ID')])->join('Rooms', 'Carts.Room_ID', 'Rooms.ID_Room')->join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->get();
            $result['Count_Items'] = $result['Items']->count();
            
            $Days = [];
            $Total = 0;
            foreach($result['Items'] as $Item) {
                $ci = Carbon::parse($Item->Start);
                $co = Carbon::parse($Item->End);
                $d = $ci->diffInDays($co) + 1;
                $Days[] = $d;
                $Total += $d * $Item->Price;
            }
            $result['Days'] = $Days;
            $result['Total_Price'] = $Total;
            return view('cart', $result);
        }
    }

    public function del($id) {
        $Cr = Cart::where(['Item' => $id])->delete();
        return redirect('/cart');
    }

    public function booking(Request $request) {
        if (Session::get('Customer_ID') == null) {
            return view('login');
        }
        else {
            $Items = Cart::where(['Customer_ID' => Session::get('Customer_ID')])->get();
            $flap = 0;
            foreach($Items as $Item) {
                $time_from = $Item->Start;
                $time_to = $Item->End;
                $Rm = db::table('Bill_Details')->where(['Room' => $Item->Room_ID])->where(function($q) use ($time_from, $time_to) {
                    $q->where(['Check_out' => null])->whereBetween('Start_at',  [$time_from, $time_to])->orWhereBetween('End_at', [$time_from, $time_to]);
                })->get();
                if ($Rm->count() > 0) {
                    $flap = 0;
                    Session::put('Message', 'Không thể đặt phòng! Có phòng đã được đặt trong khoảng thời gian mà bạn chọn!');
                    return redirect('/cart');
                }
                else $flap = 1;
            }
            if($flap == 1) {
                $result['Ctm'] = Customer::where(['ID_Customer' => Session::get('Customer_ID')])->first();
                $result['Items'] = Cart::where(['Customer_ID' => Session::get('Customer_ID')])->join('Rooms', 'Carts.Room_ID', 'Rooms.ID_Room')->join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->get();
                
                $Days = [];
                $Total = 0;
                foreach($result['Items'] as $Item) {
                    $ci = Carbon::parse($Item->Start);
                    $co = Carbon::parse($Item->End);
                    $d = $ci->diffInDays($co) + 1;
                    $Days[] = $d;
                    $Total += $d * $Item->Price;
                }
                $result['Days'] = $Days;
                $result['Total_Price'] = $Total;
                return view('bill', $result);
            }
        }
    }

    public function create_bill() {
        $Items = Cart::where(['Customer_ID' => Session::get('Customer_ID')])->join('Rooms', 'Carts.Room_ID', 'Rooms.ID_Room')->join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->get();
        $Total = 0;
        foreach($Items as $Item) {
            $ci = Carbon::parse($Item->Start);
            $co = Carbon::parse($Item->End);
            $d = $ci->diffInDays($co) + 1;
            $Total += $d * $Item->Price;
        }

        $Bll = new Bill;
        $Bll->Customer = Session::get('Customer_ID');
        $Bll->Total_Price = $Total;
        $Bll->Status = "Đã đặt";
        $Bll->save();

        foreach($Items as $Item) {
            $Detail = new BillDetail;
            $Detail->Bill = $Bll->ID_Bill;
            $Detail->Room = $Item->ID_Room;
            $Detail->Start_at = $Item->Start;
            $Detail->End_at = $Item->End;
            $Detail->save();
            $Cr = Cart::where(['Item' => $Item->Item])->delete();
        }
        Session::put('Message', 'Đặt phòng thành công!');
        return redirect('/history');
    }

    public function show_bill_detail($id) {
        $result['Bills'] = Bill::where(['ID_Bill' => $id])->first();
        $result['Items'] = BillDetail::where(['Bill' => $result['Bills']->ID_Bill])->join('Rooms', 'Bill_Details.Room', 'Rooms.ID_Room')->join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->get();
        $result['Ctm'] = Customer::where(['ID_Customer' => Session::get('Customer_ID')])->first();
        $Days = [];
        foreach($result['Items'] as $Item) {
            $ci = Carbon::parse($Item->Start_at);
            $co = Carbon::parse($Item->End_at);
            $d = $ci->diffInDays($co) + 1;
            $Days[] = $d;
        }
        $result['Days'] = $Days;
        return view('bill_detail', $result);
    }

    
    #========================== ADMIN ==========================#

    public function bill () {
        $result['Bills'] = Bill::orderBy('ID_Bill', 'desc')->get();
        return view('admin.bill', $result);
    }

    public function detail ($id) {
        $result['Bills'] = Bill::where(['ID_Bill' => $id])->first();
        $result['Items'] = BillDetail::where(['Bill' => $result['Bills']->ID_Bill])->join('Rooms', 'Bill_Details.Room', 'Rooms.ID_Room')->join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->get();
        $result['Ctm'] = Customer::where(['ID_Customer' => $result['Bills']->Customer])->first();
        $Days = [];
        foreach($result['Items'] as $Item) {
            $ci = Carbon::parse($Item->Start_at);
            $co = Carbon::parse($Item->End_at);
            $d = $ci->diffInDays($co) + 1;
            $Days[] = $d;
        }
        $result['Days'] = $Days;
        return view('admin.bill_detail', $result);
    }

    public function check_in (Request $request) {
        $Bll = BillDetail::where(['Bill' => $request->post('ID_Bill')])->where(['Room' => $request->post('ID_Room')])->where(['Start_at' => $request->post('Start_at')])->first();
        if($Bll->Start_at <= date("Y-m-d")) {
            if($Bll->End_at > date("Y-m-d")) {
                $Detail = BillDetail::where(['Bill' => $request->post('ID_Bill')])->where(['Room' => $request->post('ID_Room')])->where(['Start_at' => $request->post('Start_at')])->update([
                    'Check_in'      => now(),
                    'updated_at'    => now()
                ]);
                Session::put('message', 'Đã nhận phòng thành công!');
                return redirect()->back();
            }
            else {
                Session::put('message', 'Đã quá thời gian, không thể nhận phòng!');
                return redirect()->back();
            }
        }
        else {
            Session::put('message', 'Chưa đến thời gian nhận phòng!');
            return redirect()->back();
        }
    }

    public function check_out (Request $request) {
        $Bll = BillDetail::where(['Bill' => $request->post('ID_Bill')])->where(['Room' => $request->post('ID_Room')])->where(['Start_at' => $request->post('Start_at')])->first();
        if($Bll->End_at >= date("Y-m-d")) {
            $Detail = BillDetail::where(['Bill' => $request->post('ID_Bill')])->where(['Room' => $request->post('ID_Room')])->where(['Start_at' => $request->post('Start_at')])->update([
                'Check_out' => now(),
                'updated_at'    => now()
            ]);
            $BD = BillDetail::where(['Bill' => $Bll->Bill])->where(['Check_out' => null])->get();
            if ($BD->count() == 0) {
                $complete = Bill::where(['ID_Bill' => $Bll->Bill])->update([
                    'Status'    => 'Hoàn thành',
                    'updated_at'=> now()
                ]);
                $m = Carbon::now()->month;
                $y = Carbon::now()->year;
                $B = Bill::where(['ID_Bill' => $Bll->Bill])->first();
                $Stt = Statistic::where(['Month' => $m])->where(['Year' => $y])->first();
                
                if($Stt->count() > 0) {
                    $sum = $Stt->Sales + $B->Total_price;
                    $updt = Statistic::where(['Month' => $m])->where(['Year' => $y])->update([
                        'Sales'         => $sum,
                        'updated_at'    => now()
                    ]);
                }
                else {
                    $new_stt = new Statistic;
                    $new_stt->Month = $m;
                    $new_stt->Year = $y;
                    $new_stt->Sales = $B->Total_price;
                    $new_stt->created_at = now();
                    $new_stt->updated_at = now();
                }
            }
            Session::put('message', 'Đã trả phòng thành công!');
            return redirect()->back();
        }
        else {
            Session::put('message', 'Chưa đến thời gian trả phòng!');
            return redirect()->back();
        }
    }

    public function statistics () {
        $result['Departments'] = Department::all();
        $result['Customers'] = Customer::all();
        $result['Booked'] = Bill::where(['Status' => 'Đã đặt'])->get();
        $result['Completed'] = Bill::where(['Status' => 'Hoàn thành'])->get();
        $result['Current_Year'] = Carbon::now()->year;
        $result['Months'] = Statistic::where(['Year' => $result['Current_Year']])->get();
        $result['Years'] = Statistic::select(DB::raw('Year as Yr, sum(Sales) as Sale'))->groupBy('Year')->get();
        return view('admin.statistics', $result);
    }

}
