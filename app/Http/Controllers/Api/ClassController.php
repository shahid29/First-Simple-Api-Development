<?php

namespace App\Http\Controllers\Api;

use App\Model\MClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data = MClass::all();
       return $data;
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
        $validate = $request->validate([
        'class_name' => 'required|unique:mclasses|max:25'
        ]);

        MClass::create($request->all());
        return response('done');
//        $data = array();
//        $data['class_name'] = $request->class_name;
//        DB::table('mclasses')->insert($data);
//        return response('done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = MClass::find($id);
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
        $validate = $request->validate([
            'class_name' => 'required|unique:mclasses|max:25'
        ]);

        $update = MClass::find($id);
        $update->class_name = $request->class_name;
        $update->save();
        return response('Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MClass::find($id)->delete();
        return response('done');
    }
}
