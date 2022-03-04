<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Department;
use App\Models\Type;
use App\Models\Salary;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class DepartmentController extends Controller
{
    # ============================= ADMIN ============================= #

    public function index() {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Departments'] = Department::all();
            return view('admin.department', $result);
        }
    }

    public function add() {
        if (Session::get('id') == null) return view('admin.login');
        else {
            return view('admin.add_department');
        }
    }

    public function store(Request $request) {
        $dpm = new Department;
        $dpm->DPM_Name = $request->post('DPM_Name');
        $dpm->DPM_Phone = $request->post('DPM_Phone');
        $dpm->DPM_Address = $request->post('DPM_Address');
        $dpm->created_at = now();
        $dpm->updated_at = now();
        $dpm->save();
        if ($dpm->save()) return redirect('/admin/department');
        else return redirect()->back()->with(['message', 'Thêm không thành công!']);
    }

    public function update_get($id) {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Departments'] = Department::where(['ID_Department' => $id])->get();
            return view('admin.update_department', $result);
        }
    }

    public function update_post(Request $request, $id) {
        $dpm = Department::where(['ID_Department' => $id])->update([
            'DPM_Name'      =>  $request->post('DPM_Name'),
            'DPM_Phone'     =>  $request->post('DPM_Phone'),
            'DPM_Address'   =>  $request->post('DPM_Address'),
            'updated_at'    =>  now()
        ]);
        if($dpm) return redirect('/admin/department');
        else return redirect()->back()->with(['message', 'Chỉnh sửa không thành công!']);
    }

    public function del($id) {
        $Rm = Room::where(['Department_ID' => $id])->delete();
        $Emp = Employee::where(['ID_Dpm' => $id])->delete();
        $dpm = Department::find($id)->delete();
        return redirect('/admin/department');
    }

}
