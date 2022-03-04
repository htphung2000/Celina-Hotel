<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Salary;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class EmployeeController extends Controller
{
    # ============================= ADMIN ============================= #
    public function index()
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Employees'] = DB::table('Employees')->join('Departments', 'Employees.ID_Dpm', 'Departments.ID_Department')->join('Salaries', 'Employees.Position_Emp', 'Salaries.ID_Position')->orderBy('ID_Department', 'asc')->orderBy('Sal', 'desc')->paginate(20);
            $result['Admin'] = Admin::all();
            return view('admin.employee', $result);
        }
    }

    public function info($id)
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Employee'] = DB::table('Employees')->where(['ID_Employee' => $id])->join('Departments', 'Employees.ID_Dpm', 'Departments.ID_Department')->join('Salaries', 'Employees.Position_Emp', 'Salaries.ID_Position')->get();
            $result['Admin'] = DB::table('Admins')->where(['ID_Admin' => $id])->get();
            return view('admin.info_employee', $result);
        }
    }

    public function add()
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Departments'] = Department::all();
            $result['Salaries'] = Salary::all();
            return view('admin.add_employee', $result);
        }
    }

    public function store(Request $request)
    {
        if ($request->hasFile('Avatar')){
            $file = $request->file('Avatar');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $name = date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
            $destinationPath = '/storage/Avatar/';
            $photo = $destinationPath.$name;
            $file->storeAs('/public/Avatar/', $name);

            $emp = new Employee;
            $emp->Fullname = $request->post('Fullname');
            $emp->DoB = $request->post('DoB');
            $emp->Gender = $request->post('Select_Gender');
            $emp->Phone = $request->post('Phone');
            $emp->Mail = $request->post('Mail');
            $emp->Address = $request->post('Address');
            $emp->ID_DPM = $request->post('Select_Department'); 
            $emp->Position_Emp = $request->post('Select_Position');
            $emp->Avatar = $photo;
            $emp->created_at = now();
            $emp->updated_at = now();
            $emp->save();
            return redirect('/admin/employee');
        }
        else {
            Session::put('message', 'Thêm nhân viên không thành công!');
            return redirect()->back();
        }
    }

    public function update_get($id)
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Employees'] = Employee::where(['ID_Employee' => $id])->join('Departments', 'Employees.ID_Dpm', 'Departments.ID_Department')->get();
            $result['Departments'] = Department::all();
            $result['Salaries'] = Salary::all();
            return view('admin.update_employee', $result);
        }
    }

    public function update_post(Request $request, $id)
    {
        if ($request->hasFile('Avatar')){
            $file = $request->file('Avatar');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $name = date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
            $destinationPath = '/storage/Avatar/';
            $photo = $destinationPath.$name;
            $file->storeAs('/public/Avatar/', $name);

            $emp = Employee::where(['ID_Employee' => $id])->update([
                'Fullname'      =>  $request->post('Fullname'),
                'ID_Dpm'        =>  $request->post('Select_Department'),
                'DoB'           =>  $request->post('DoB'),
                'Gender'        =>  $request->post('Select_Gender'),
                'Phone'         =>  $request->post('Phone'),
                'Mail'          =>  $request->post('Mail'),
                'Address'       =>  $request->post('Address'),
                'Position_Emp'  =>  $request->post('Select_Position'),
                'Avatar'        =>  $photo,
                'updated_at'    =>  now()
            ]);

            if ($id == Session::get('id')){
                Session::put('Name', $request->post('Fullname'));
                Session::put('Avatar', $photo);
            }
            return redirect('/admin/employee');
        }
        else {
            Session::put('message', 'Chỉnh sửa không thành công!');
            return redirect()->back();
        }
    }

    public function del($id)
    {
        $Ad = Admin::where(['ID_Admin' => $id])->delete();
        $Emp = Employee::where(['ID_Employee' => $id])->delete();
        return redirect('/admin/employee');
    }

}