<?php

namespace App\Http\Controllers;

use App\Barber;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barbers = Barber::all();
        return view('customer.add-form', compact('barbers'));
    }

    public function view(Request $request)
    {
        $customer = Customer::with('Barber')->where('id', $request->get('id'))->first();
        $barbers = Barber::all();
        return view('customer.view', compact('customer', 'barbers'));
    }

    public function listView()
    {
        $customers = Customer::with('Barber')->get();
        return view('customer.list', compact('customers'));
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
        try {
            Customer::find($id)->delete();
            return redirect()->back()->with('message', 'Success remove customer');
        } catch (\Throwable $th) {
            return redirect()->back()->with('message', 'failed to remove customer');
        }
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
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'ktp' => 'required|numeric',
            'barber_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } 

        $customer = new Customer();
        $customer->first_name =$request->get('first_name') ;
        $customer->last_name= $request->get('last_name');
        $customer->address= $request->get('address');
        $customer->phone= $request->get('phone');
        $customer->ktp = $request->get('ktp');
        $customer->barber_id = $request->get('barber_id');
        $customer->save();

        return redirect()->back()->with('message', 'Success add customer');
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
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'ktp' => 'required|numeric',
            'barber_id' => 'required'
        ] ,[
            'first_name.required' => "Nama depan harus terisi",
            "last_name.required" => "Nama Belakang harus terisi",
            "address.required" => "Alamat harus terisi",
            "phone.required" => "Telepon harus terisi",
            "ktp.required" => "KTP harus terisi",
            'barber_id.required' => "Barber harus terisi"
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } 

        $customer = Customer::find($request->get('id'));
        $customer->first_name =$request->get('first_name') ;
        $customer->last_name= $request->get('last_name');
        $customer->address= $request->get('address');
        $customer->phone= $request->get('phone');
        $customer->ktp = $request->get('ktp');
        $customer->barber_id = $request->get('barber_id');
        $customer->save();

        return redirect()->back()->with('message', 'Success edit customer');
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
