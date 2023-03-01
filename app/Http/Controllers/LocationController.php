<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;
use App\Models\Teacher;
class LocationController extends Controller
{
    public function location(){
        $divisions = Division::all();
        return view('location',compact('divisions'));
    }
    public function getDistrictsByDivisionId($division_id){
        $districts = District::where('division_id','=',$division_id)
                            ->select('id','name')
                            ->get();
        return response()->json([
            'districts' => $districts 
        ]);
    }
    public function store(Request $req){
        $obj = new Teacher();
        $obj->division_id = $req->division;
        $obj->district_id = $req->district;
        $obj->name = $req->teacher_name;
        if($obj->save()){
            return response()->json([
                'teacher' => $obj,
                'msg' => 'Successfully Inserted' 
            ]);
        }
    }
}