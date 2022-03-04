<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Department;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class RoomController extends Controller
{
    //// ADMIN 
    public function index()
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Room'] = DB::table('Rooms')->join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->select('ID_Room', 'Department_ID', 'DPM_Name', 'Type_Name', 'Price')->orderBy('Department_ID', 'asc')->orderBy('ID_Room', 'asc')->orderBy('Price', 'asc')->paginate(20);
            return view('admin.room', $result);
        }
    }

    public function add()
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Department'] = Department::all();
            $result['Type'] = Type::all();
            return view('admin.add_room', $result);
        }
    }

    public function store(Request $request)
    {
        $Dpm = Department::where(['DPM_Name' => $request->post('Select_Department')])->select('ID_Department')->first();
        $R = Room::where(['ID_Room' => (integer)$request->post('ID_Room') + $Dpm->ID_Department * 1000])->first();
        if ($R) {
            echo $R;
            Session::put('message', 'Phòng này đã tồn tại!');
            return redirect()->back();
        }
        else {
            $Rm = new Room;
            $Rm->Department_ID = $Dpm->ID_Department;
            $Rm->ID_Room = (integer)$request->post('ID_Room') + $Rm->Department_ID * 1000;
            $Tp = Type::where(['Type_Name' => $request->post('Select_Type')])->select('ID_Type')->first();
            $Rm->Type = $Tp->ID_Type;
            $Rm->created_at = now();
            $Rm->updated_at = now();
            $Rm->save();
            return redirect('/admin/room');
        }
    }

    public function update_get($id)
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Room'] = DB::table('Rooms')->join('Departments', 'Rooms.Department_ID', 'Departments.ID_Department')->join('Types', 'Rooms.Type', 'Types.ID_Type')->select('ID_Room', 'Department_ID', 'DPM_Name', 'Type_Name', 'Price')->where(['ID_Room' => $id])->get();
            $result['Type'] = Type::all();
            return view('admin.update_room', $result);
        }
    }

    public function update_post(Request $request, $id)
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $Tp = Type::where(['Type_Name' => $request->post('Select_Type')])->select('ID_Type')->first();
            $Rm = Room::where(['ID_Room' => $id])->update([
                'Type'       =>     $Tp->ID_Type,
                'updated_at' =>     now()
            ]);
            return redirect('/admin/room');
        }
    }

    public function del($id)
    {
        $Rm = Room::where(['ID_Room' => $id])->delete();
        return redirect('/admin/room');
    }
}
