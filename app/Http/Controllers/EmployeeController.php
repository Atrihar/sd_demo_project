<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;
use Image;
use SebastianBergmann\Complexity\ComplexityCalculatingVisitor;
class EmployeeController extends Controller
{
    public function create()
    {
        return view('employee.create');
    }
    // public function store(Request $req)
    // {
    //     // // dd($req);
    //     // $obj = new Employee();
    //     // $obj->name =$req->name;
    //     // $obj->email =$req->email;
    //     // $obj->birth_date =$req->birth_date;
    //     // $obj->department =$req->department;
    //     // $obj->salary =$req->salary;
        
    //     // $obj->gender =$req->gender;
    //     // $obj->address =$req->address;
    //     // $obj->status =$req->status;
    //     // if ($obj->save()) {
    //     //     echo "Successfully inserted";
    //     // }
    //     if($req->gender){
    //         $gender = $req->gender;
    //     }
    //     else{
    //         $gender = 'None';
    //     }
    //     if ($req->status) {
    //         $status = 1;
    //     } else {
    //         $status = 0;
    //     }

    //     $originalImage = $req->file('profile_pic');
    //     $image = Image::make($originalImage);
    //     $extension = $originalImage->getClientOriginalExtension();
    //     $name = time() . "." . $extension;

    //     $thumbnailPath = public_path().'/thumbnail/';
    //     $originalPath = public_path().'/images/';

    //     $image->save($originalPath . $name);
    //     $image->resize(150, 150);
    //     $image->save($thumbnailPath . $name);



    //     DB::table('employees')->insert([
    //         'name' => $req->name,
    //         'email' => $req->email,
    //         'birth_date' => $req->birth_date,
    //         'department' => $req->department,
    //         'salary' => $req->salary,
    //         'gender' => $req->gender,
    //         'address' => $req->address,
    //         'status' => $req->status,
    //         'profile_pic' => $name
    //     ]);
    //     echo 'Successfully Inserted';
    // }

    public function store(Request $req){
        if($req->gender){
            $gender = $req->gender;
        }
        else{
            $gender = 'NONE';
        }
        if($req->status){
            $status = 1;
        }
        else{
            $status = 0;
        }
        // echo $req->name;
        // echo $req->email;
        /* $obj = new Employee(); employees ; php artisan make:model Employee -m
        $obj->name = $req->name;
        $obj->email = $req->email;
        $obj->birth_date = $req->birth_date;
        $obj->salary = $req->salary;
        $obj->department = $req->department;
        if($req->gender){
            $gender = $req->gender;
        }
        else{
            $gender = 'NONE';
        }
        $obj->gender = $gender;
        $obj->address = $req->address;
        if($req->status){
            $status = 1;
        }
        else{
            $status = 0;
        }
        $obj->status = $status;
        if($obj->save()){
            echo 'Successfully Inserted';
        } */

        // Image
        $originalImage = $req->file('profile_pic');
        $image = Image::make($originalImage); // Image = Intervention
        $extension = $originalImage->getClientOriginalExtension();
        $name = time().'.'.$extension; // 1215212.png

        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';

        $image->save($originalPath.$name);

        $image->resize(100,100);
        $image->save($thumbnailPath.$name);
        // Image


        DB::table('employees')->insert([
            'name' => $req->name,
            'email' => $req->email,
            'birth_date'=> $req->birth_date,
            'salary'=> $req->salary,
            'department'=> $req->department,
            'gender'=> $gender,
            'address'=> $req->address,
            'status'=> $status,
            'profile_pic'=>$name
        ]);
        echo 'Successfully Inserted';
    }
    public function all()
    {
        $employees = Employee::all();
        return view('employee.employee',compact('employees'));
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employee.edit',compact('employee'));
    }
    public function update($id, Request $req)
    {
        $obj = Employee::find($id);
        $obj->name =$req->name;
        $obj->email =$req->email;
        $obj->birth_date =$req->birth_date;
        $obj->department =$req->department;
        $obj->salary =$req->salary;
        
        if($req->gender){
            $gender = $req->gender;
        }
        else{
            $gender = 'None';
        }
        if ($req->status) {
            $status = 1;
        } else {
            $status = 0;
        }
        $obj->address =$req->address;
        if ($obj->save()) {
            return redirect('employees');
        }
    }


    public function delete($id){
        Employee::find($id)->delete();
        return redirect('employees');
    }
}
