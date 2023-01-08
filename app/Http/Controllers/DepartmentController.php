<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\support\Facades\Auth;

class DepartmentController extends Controller
{
   public function index(){ 
    return view('admin.department.index');
   }

   public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate([
            'department_name'=>'required|unique:departments|max:255'
        ],
        [
            'department_name.required'=>"กรุณาป้อนชื่อแผนก",
            'department_namr.max'=>"ห้ามป้อนข้อความเกิน 255",
            'department_name.unique'=>"ชื่อแผนกซ้ำ"
        ]
        );
        //บันทึกข้อมูล
        $department = new Department;
        $department->department_name = $request->department_name;
        $department->user_id = Auth::user()->id;
        $department->save();
        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อยเเล้ว");
    }
}