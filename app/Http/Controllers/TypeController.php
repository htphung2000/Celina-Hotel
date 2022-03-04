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

class TypeController extends Controller
{
    #========================== ADMIN ==========================#

    public function index () {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Types'] = Type::orderBy('Price', 'desc')->paginate(5);
            return view('admin.type', $result);
        }
    }

    public function add () {
        return view('admin.add_type');
    }

    public function store (Request $request) {
        if ($request->hasFile('Image')){
            $file = $request->file('Image');
            $extension = $file->getClientOriginalExtension();
            $name = $file->getClientOriginalName();
            $name = date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
            $destinationPath = '/storage/Room_Type/';
            $photo = $destinationPath.$name;
            $file->storeAs('/public/Room_Type/', $name);

            $Tp = new Type;
            $Tp->Type_Name = $request->post('Type_Name');
            $Tp->Describe = $request->post('Describe');
            $Tp->Price = $request->post('Price');
            $Tp->Image = $photo;
            $Tp->save();

            Session::put('message', 'Thêm loại phòng thành công!');
            return redirect('/admin/room-type');
        }
        else {
            Session::put('message', 'Thêm loại phòng không thành công!');
            return redirect()->back();
        }
    }

    public function update_get ($id) {
        if (Session::get('id') == null) return view('admin.login');
        else {
            $result['Types'] = Type::where(['ID_Type' => $id])->get();
            return view('admin.update_type', $result);
        }
    }

    public function update_post (Request $request, $id) {
        if ($request->hasFile('Image')){
            $file = $request->file('Image');
    	    $extension = $file->getClientOriginalExtension();
    	    $name = $file->getClientOriginalName();
    	    $name = date('Y-m-d').Time().rand(11111, 99999).'.'.$extension;
    	    $destinationPath = '/storage/Room_Type/';
            $photo = $destinationPath.$name;
            $file->storeAs('/public/Room_Type/', $name);

            $Type = Type::where(['ID_Type' => $id])->update([
                'Type_Name'     =>  $request->post('Type_Name'),
                'Describe'      =>  $request->post('Describe'),
                'Price'         =>  $request->post('Price'),
                'Image'         =>  $photo,
                'updated_at'    =>  now()
            ]);
            Session::put('Message', 'Cập nhật thành công!');
            return redirect('/admin/room-type');
        }
        else {
            Session::put('Message', 'Cập nhật không thành công!');
            return redirect('/admin/room-type/{{$id}}/update');
        }
    }

    public function del ($id) {
        $Tp = Type::where(['ID_Type' => $id])->delete();
        return redirect('/admin/room-type');
    }

}

