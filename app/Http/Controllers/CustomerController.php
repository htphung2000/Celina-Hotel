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
use Illuminate\Support\Facades\Hash;
use DB;
use Session;
use Carbon\Carbon;
use Validator;

class CustomerController extends Controller
{

    #========================== ADMIN ==========================#

    public function index() {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Customers'] = Customer::paginate(20);
            return view('admin.customer', $result);
        }
    }

    public function info($id) {
        $result['Customers'] = Customer::where(['ID_Customer' => $id])->get();
        $result['Bills'] = Bill::where(['Customer' => $id])->get();
        return view('admin.customer_info', $result);
    }

    #========================== CUSTOMER ==========================#

    public function register(Request $request) {
        $C = Customer::where(['Username' => $request->post('Username')])->select('ID_Customer')->first();
        if ($C != null) {
            Session::put('Message', 'Tài khoản đã tồn tại!');
            return view('register');
        }
        if ($request->hasFile('CTM_Avatar')) {
            $file = $request->file('CTM_Avatar');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $name = date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
            $destinationPath = '/storage/Avatar/';
            $photo = $destinationPath.$name;
            $file->storeAs('/public/Avatar/', $name);

            $Ctm = new Customer;
            $Ctm->Username = $request->post('Username');
            $Ctm->Pass = hash::make($request->post('Pass'));
            $Ctm->CTM_Name = $request->post('CTM_Name');
            $Ctm->CTM_DoB = $request->post('CTM_DoB');
            $Ctm->CTM_Gender = $request->post('CTM_Gender');
            $Ctm->CTM_Phone = $request->post('CTM_Phone');
            $Ctm->CTM_Mail = $request->post('CTM_Mail');
            $Ctm->CTM_Address = $request->post('CTM_Address');
            $Ctm->CTM_Avatar = $photo;
            $Ctm->created_at = now();
            $Ctm->updated_at = now();
            $Ctm->save();

            Session::put('Customer_ID', $Ctm->ID_Customer);
            Session::put('Customer_Name', $Ctm->CTM_Name);
            Session::put('Customer_DoB', $Ctm->CTM_DoB);
            Session::put('Customer_Gender', $Ctm->CTM_Gender);
            Session::put('Customer_Phone', $Ctm->CTM_Phone);
            Session::put('Customer_Mail', $Ctm->CTM_Mail);
            Session::put('Customer_Address', $Ctm->CTM_Address);
            Session::put('Customer_Avatar', $Ctm->CTM_Avatar);
            return redirect('/');
        }
        else {
            Session::put('Message', 'Đăng ký không thành công!');
            return redirect()->back();
        }
    }

    public function login(Request $request) {
        if (Session::put('Customer_ID')){
            return redirect('/');
        }
        $Ctm = Customer::where(['Username' => $request->post('Username')], ['Pass' => hash::make($request->post('Pass'))])->first();
        if ($Ctm) {
            Session::put('Customer_ID', $Ctm->ID_Customer);
            Session::put('Customer_Name', $Ctm->CTM_Name);
            Session::put('Customer_DoB', $Ctm->CTM_DoB);
            Session::put('Customer_Gender', $Ctm->CTM_Gender);
            Session::put('Customer_Phone', $Ctm->CTM_Phone);
            Session::put('Customer_Mail', $Ctm->CTM_Mail);
            Session::put('Customer_Address', $Ctm->CTM_Address);
            Session::put('Customer_Avatar', $Ctm->CTM_Avatar);
            return redirect('/');
        }
        else {
            Session::put('Message', 'Sai tài khoản hoặc mật khẩu!');
            return redirect('/login');
        }
    }

    public function logout() {
        Session::put('Customer_ID', null);
        Session::put('Customer_Name', null);
        Session::put('Customer_DoB', null);
        Session::put('Customer_Gender', null);
        Session::put('Customer_Phone', null);
        Session::put('Customer_Mail', null);
        Session::put('Customer_Address', null);
        Session::put('Customer_Avatar', null);
        return redirect('/');
    }

    public function update_get() {
        $result['Customers'] = Customer::where(['ID_Customer' => Session::get('Customer_ID')])->first();
        return view('update_personal_info', $result);
    }

    public function update_post(Request $request) {
        if ($request->hasFile('CTM_Avatar')){
            $file = $request->file('CTM_Avatar');
    	    $extension = $file->getClientOriginalExtension();
    	    $name = $file->getClientOriginalName();
    	    $name = date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
            $destinationPath = '/storage/Avatar/';
    	    $photo = $destinationPath.$name;
    	    $file->storeAs('/public/Avatar/', $name);
            
            $Ctm = Customer::where(['ID_Customer' => Session::get('Customer_ID')])->update([
                'CTM_Name'      => $request->post('CTM_Name'),
                'CTM_DoB'       => $request->post('CTM_DoB'),
                'CTM_Gender'    => $request->post('CTM_Gender'),
                'CTM_Phone'     => $request->post('CTM_Phone'),
                'CTM_Mail'      => $request->post('CTM_Mail'),
                'CTM_Address'   => $request->post('CTM_Address'),
                'CTM_Avatar'    => $photo,
                'updated_at'    => now()
            ]);
            Session::put('Customer_Name', $request->post('CTM_Name'));
            Session::put('Customer_DoB', $request->post('CTM_DoB'));
            Session::put('Customer_Gender', $request->post('CTM_Gender'));
            Session::put('Customer_Phone', $request->post('CTM_Phone'));
            Session::put('Customer_Mail', $request->post('CTM_Mail'));
            Session::put('Customer_Address', $request->post('CTM_Address'));
            Session::put('Customer_Avatar', $photo);
            Session::put('Message', 'Chỉnh sửa thành công!');
            return view('personal_info');
        }
        else {
            Session::put('Message', 'Chỉnh sửa không thành công!');
            return view('update_personal_info');
        }
    }

    public function history(){
        $result['Bills'] = Bill::where(['Customer' => Session::get('Customer_ID')])->orderBy('ID_Bill', 'desc')->get();
        return view('history', $result);
    }

}
