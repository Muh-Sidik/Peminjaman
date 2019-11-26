<?php

namespace App\Http\Controllers;

use App\Bio;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData(){
        $employee= Employee::get();

        return response()->json([
            'data' => $employee
        ]);

    }
    public function index()
    {
        $data['title']  = "Data Pegawai";
        $data['menu']   = 3;
        $data['no']     = 1;
        $data['employee'] = Employee::all();

        return view('page.employee.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = "Tambah Data";
        $data['menu']       = 3;
        
        return view('page.employee.create', $data);
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
            'email'     => 'required|unique:users',
            'password'  => 'required'
        ]);
        
            $user = [
                'name'      => $request->input('name'),
                'email'     => $request->input('email'),
                'password'  => bcrypt($request->input('password'))
            ];

            // $bio = [
            //     'address'   => $request->input('address'),
            //     'phone'     => $request->input('phone'),
            //     'position'  => $request->input('position'),
            //     'user_id'   => $request->input('user_id')
            // ];

            $inuser = Employee::create($user);
            // $inbio  = Bio::create($bio);
            
            if($inuser) {

                $request->session()->flash('success', 'Berhasil Menambah Pegawai');
                return redirect()->route('pegawai.index');
    
            } else {
                $request->session()->flash('danger', 'Gagal Menambah Pegawai');
                return redirect()->back();
            }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $bio
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $bio)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $bio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title']      = "Edit Data Pegawai";
        $data['menu']       = 3;
        $data['employee']   = Employee::find($id);
        // $data['bio']        = Bio::find($id);

        return view('page.employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $bio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $update)
    {
    
            $update = Employee::find($update);
            $update->name       = $request->input('name');
            $update->email      = $request->input('email');
            $update->address    = $request->input('address');
            $update->phone      = $request->input('phone');
            $update->position   = $request->input('position');
            $update->password   = bcrypt($request->input('password'));

            $update->save();

            if($update) {

                $request->session()->flash('success', 'Berhasil Mengubah Data');
                return redirect()->route('pegawai.index');
    
            }
    }

    public function update_bio(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $bio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =Employee::find($id);
        $delete->delete();

        return redirect()->route('pegawai.index');
    }
}
