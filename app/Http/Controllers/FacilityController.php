<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $facilities = Facility::all();
        return view('facility.add-form', compact('facilities')); 
    }

    public function view(){
        $facilities = Facility::all();
        return view('facility.view', compact('facilities'));
    }

    public function listView(){
        $facilities = Facility::all();
        return view('facility.list', compact('facilities'));
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
    
    public function remove($id){
        Facility::find($id)->delete();
        return redirect()->back()->with('message', 'Success Delete Facility');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required', 
            'image' => 'required'
        ]);
        if($validator->fails())return redirect()->back()->withInput()->withErrors($validator);
        $path = Storage::putFile('public/storage', $request->file('image'));
        $facility = new Facility();
        $facility->name = $request->get('name');
        $facility->image = $path;
        $facility->save();

        return redirect()->back()->with('message', 'Success Add Facility');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
