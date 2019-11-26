<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = "Data Pelanggan";
        $data['no']     = 1;
        $data['menu']   = 4;
        $data['client'] = Client::all();

        return view('page.client.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']  = "Tambah Data Pelanggan";
        $data['menu']   = 4;
        $data['random'] = mt_rand(100000, 999999);
        return view('page.client.create', $data);
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
            'name'      => 'required|string',
            'dob'       =>  'required',
            'phone'     => 'required|numeric|min:11',
            'address'   => 'required'
        ]);

            $data = [
                'name'  => $request->input('name'),
                'no_member' => $request->input('no_member'),
                'dob'       => $request->input('dob'),
                'phone'     =>$request->input('phone'),
                'address'   => $request->input('address'),
                'gender'    => $request->input('gender'),
            ];

            $insert = Client::create($data);
            $request->session()->flash('success', 'Berhasil Menambahkan Pelanggan');
            return redirect()->route('pelanggan.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $bio
     * @return \Illuminate\Http\Response
     */
    public function show(Client $bio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $bio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']      = "Edit Data Pelanggan";
        $data['menu']       = 4;
        $data['no']         =1;
        $data['client']     = Client::find($id);
        return view('page.client.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $bio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $client)
    {
        $validate = $request->validate([
            'name'      => 'required|string',
            'dob'       =>  'required',
            'phone'     => 'required|numeric|min:11',
            'address'   => 'required'
        ]);    

            $client = Client::find($client);
            $client->name       = $request->input('name');
            $client->no_member      = $request->input('no_member');
            $client->dob       = $request->input('dob');
            $client->phone     = $request->input('phone');
            $client->address   = $request->input('address');
            $client->gender       = $request->input('gender');

            $client->save();
            return redirect()->route('pelanggan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $bio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =Client::find($id);
        $delete->delete();

        return redirect()->route('pelanggan.index');
    }
}
