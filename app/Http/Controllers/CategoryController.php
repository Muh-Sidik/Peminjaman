<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']      = "Kategori Barang";
        $data['category']   = Category::all();
        $data['no']         = 1;
        $data['menu']       = 2;
        
        return view('page.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = "Tambah Kategori";
        $data['menu']       = 2;

        return view('page.category.create', $data);
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
            'category_name' => 'required|max:16',
        ]);

        $input = $request->toArray();

        $insert = Category::create($input);

        if($insert == true) {

            $request->session()->flash('success', 'Berhasil Menambahkan Kategori');
            return redirect()->route('kategori.index');

        } else {
            $request->session()->flash('danger', 'Gagal Menambahkan Kategori');
            return redirect()->back();
        }
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
        $data['title']      = "Edit Data Kategori";
        $data['menu']       = 2;
        $data['category']   = Category::find($id);

        return view('page.category.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $update)
    {
        $update->category_name      = $request->input('category_name');

        $update->save();

        if($update) {

            $request->session()->flash('success', 'Berhasil Mengubah Kategori');
            return redirect()->route('kategori.index');

        } else {
            $request->session()->flash('danger', 'Gagal Mengubah Kategori');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =Category::find($id);
        $delete->delete();

        return redirect()->route('kategori.index');
    }
}
