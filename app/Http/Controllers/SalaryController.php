<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Type;
use App\Models\Salary;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

class SalaryController extends Controller
{
    public function index ()
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Salaries'] = Salary::orderBy('Sal', 'desc')->paginate(10);
            return view('admin.position', $result);
        }
    }

    public function add()
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            return view('admin.add_position');
        }
    }

    public function store(Request $request)
    {
        if($request->post('Allowance') >= 0 && $request->post('Allowance') <= 100) {
            $Pos = new Salary;
            $Pos->Position = $request->post('Position');
            $Pos->Sal = $request->post('Sal');
            $Pos->Allowance = $request->post('Allowance');
            $Pos->created_at = now();
            $Pos->updated_at = now();
            $Pos->save();
            return redirect('/admin/position');
        }
        else return redirect()->back();
    }

    public function update_get($id)
    {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Salaries'] = Salary::where(['ID_Position' => $id])->get();
            return view('admin.update_position', $result);
        }
    }

    public function update_post(Request $request, $id)
    {
        if($request->post('Allowance') >= 0 && $request->post('Allowance') <= 100) {
            $Sal = Salary::where(['ID_Position' => $id])->update([
                'Position'  =>  $request->post('Position'),
                'Sal'       =>  $request->post('Sal'),
                'Allowance' =>  $request->post('Allowance'),
                'updated_at'=>  now()
            ]);
            return redirect('/admin/position');
        }
        else return redirect()->back();
    }

    public function del($id)
    {
        $Emp = Employee::where(['Position_Emp' => $id])->delete();
        $Sal = Salary::where(['ID_Position' => $id])->delete();
        return redirect('/admin/position');
    }
    

}
