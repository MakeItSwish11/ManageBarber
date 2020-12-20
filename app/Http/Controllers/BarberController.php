<?php

namespace App\Http\Controllers;

use App\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Comment\Doc;

class BarberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('barber.add-form');
    }

    public function view(Request $request)
    {
        $id = $request->get('id');
        $barber = Barber::with("Customers")->where('id', $id)->first();
        return view('barber.view', compact('barber'));
    }

    public function listView()
    {
        $barbers = Barber::all();
        return view('barber.list', compact('barbers'));
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

    public function remove($id)
    {
        $barber = Barber::find($id);
        if ($barber->Customers->count() > 0) return redirect()->back()->with('message', 'failed to remove barber because have customer(s)');
        $barber->delete();
        return redirect()->back()->with('message', 'Success remove barber');
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
            'NIP' => 'required|numeric',
            'specialist' => 'required',
            'practice' => 'required|date',
            'price_consultation' => 'required'
        ],[
            'name.required' => "Nama harus terisi",
            'NIP.required' => "NIP harus terisi",
            'specialist.required' => "spesialis harus terisi",
            'practice.required' => "Jadwal Potong Rambut harus terisi",
            'price_consultation' => "Harga Potong Rambut harus terisi"
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);
        $barber = new Barber();
        $barber->name = $request->get('name');
        $barber->NIP = $request->get("NIP");
        $barber->specialist = $request->get('specialist');
        $barber->practice = $request->get('practice');
        $barber->price_consultation = $request->get('price_consultation');
        $barber->save();

        return redirect()->back()->with('message', 'Success add barber');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'NIP' => 'required|numeric',
            'specialist' => 'required',
            'practice' => 'required|date',
            'price_consultation' => 'required'
        ],[
            'name.required' => "Nama harus terisi",
            'NIP.required' => "NIP harus terisi",
            'specialist.required' => "spesialis harus terisi",
            'practice.required' => "Jadwal Potong Rambut harus terisi",
            'price_consultation' => "Harga Potong Rambut harus terisi"
        ]);
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $barber = Barber::find($request->get('id'));
        $barber->name = $request->get('name');
        $barber->NIP = $request->get("NIP");
        $barber->specialist = $request->get('specialist');
        $barber->practice = $request->get('practice');
        $barber->price_consultation = $request->get('price_consultation');
        $barber->save();

        return redirect()->back()->with('message', 'Success edit barber');
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
