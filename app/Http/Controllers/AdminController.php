<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.login');
    }

    public function login(Request $req){
        $ad = DB::table('Admins')->where(['Email' => $req->Email], ['Password' => hash::make($req->Password)])->join('Employees', 'Admins.ID_Admin', 'Employees.ID_Employee')->first();
        if($ad) {
            Session::put('id', $ad->ID_Admin);
            Session::put('Name', $ad->Fullname);
            Session::put('Avatar', $ad->Avatar);
            return redirect('/admin/home');
        }
        else {
            Session::put('message', 'Sai tài khoản hoặc mật khẩu!');
            return redirect('/admin');
        }
    }

    public function home() {
        if (Session::get('id') == null) return view('admin.login');
        else {
            return view('admin.home');
        }
    }

    public function logout(){
        Session::put('id', null);
        Session::put('Name', null);
        Session::put('Avatar', null);
        return redirect('/admin');
    }

    public function add($id){
        $Emp = Employee::where(['ID_Employee' => $id])->first();
        $pwd = explode("@", $Emp->Mail);
        $Ad = new Admin;
        $Ad->ID_Admin = $Emp->ID_Employee;
        $Ad->Email = $Emp->Mail;
        $Ad->Password = hash::make($pwd[0]);
        $Ad->created_at = now();
        $Ad->updated_at = now();
        $Ad->save();
        return redirect('/admin/employee');
    }

    public function del($id){
        $Ad = Admin::where(['ID_Admin' => $id])->delete();
        return redirect('/admin/employee');
    }
    
}
