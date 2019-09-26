<?php

namespace App\Http\Controllers\Api;

use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Student();
        $store->class_id = $request->class_id;
        $store->section_id = $request->section_id;
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->photo = $request->photo;
        $store->address = $request->address;
        $store->gender = $request->gender;
        $store->save();
        return response()->json($store);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Student::find($id);
        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $store = Student::find($id);
        $store->class_id = $request->class_id;
        $store->section_id = $request->section_id;
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->email = $request->email;
        $store->password = Hash::make($request->password);
        $store->photo = $request->photo;
        $store->address = $request->address;
        $store->gender = $request->gender;
        $store->save();
        return response()->json($store);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Student::find($id);
        $image_path = $delete->photo;
        unlink($image_path);

        $delete = Student::find($id);
        $delete->delete();
        return response('done');
    }
}
