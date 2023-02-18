<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{


    public function update($id, Request $request){
        $validated = $request->validate([
            "firstname" => ['required'],
            "lastname" => ['required'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email'],
        ]);

        Employee::where('id', $id)->update($validated);

        return back()->with('message', 'Data Updated Successfully');
    }

    public function destroy($id, Request $request){
        Employee::where('id', $id)->delete();
        return redirect('/student')->with('message','Data Deleted Successfully');
    }

    public function index(){
        $data = array("empStudent" => DB::table('employees')->orderBy('created_at', 'desc')->simplepaginate(10));
          
        return view('students.index', $data);
    }

    public function addStudent(){
        return view('students.addnew');
    }

    public function storeStudent(Request $request){

        $validated = $request->validate([
            "firstname" => ['required'],
            "lastname" => ['required'],
            "gender" => ['required'],
            "age" => ['required'],
            "email" => ['required', 'email', Rule::unique('employees','email')]
        ]);

        $student = Employee::create($validated);

        return redirect('/student')->with('message', 'Added Successfully');
    }

    public function showStudent($id){

        $data = Employee::findOrFail($id);
        
        return view('students.edit', ['student' => $data]);
    }



}

