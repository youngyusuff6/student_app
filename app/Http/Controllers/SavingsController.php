<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SavingsController extends Controller
{
    //crud
    public function index(){
        $get_all_students = DB::table('students')->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'data' => $get_all_students
        ]);
    }

    public function store(Request $request){
        // insert into students table
        
        // $request->key_name;
        // $request->get('key_name');
        // $request->input('key_name');

        $name = $request->get('name');
        $course = $request->get('course');
        
        $insert = DB::table('students')->insert(
            ['name' => $name, 'course' => $course, 'created_at' => date('Y-m-d h:i:s')]
        );

        return response()->json([
            'status' => true,
            'message' => 'Record Inserted Successfully!'
        ], 200);
    }


    public function update(Request $request, $id){
        
        if (DB::table('students')->where('id', $id)->exists()) {
            // update the record
            $name = $request->get('name');
            $course = $request->get('course');

            DB::table('students')->where('id', $id)->update(['name' => $name, 'course' => $course, 'updated_at' => date('Y-m-d h:i:s')]);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Record with id ' . $id . ' not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Record updated successfully'
        ], 200);
    }




    public function delete($id){
        
        if (DB::table('students')->where('course', $id)->exists()) {
            // update the record
           //return "am here";
            DB::table('students')->where('course', $id)->delete();
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Record with id ' . $id . ' not found'
            ]);
        }

        return response()->json([
            'status' => true,
            'message' => 'Record deleted successfully'
        ], 200);
    }









    
}
