<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = "Data Barang";
        $data['menu']   = 1;
        $data['no']     = 1;
        $data['item']   = Item::orderBy('created_at', 'desc')->paginate(10);
        
        return view('page.item.index', $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = "Tambah Data Barang";
        $data['menu']       =1;
        $data['category']   = Category::all();
        return view('page.item.create', $data);
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
            'item_name' => 'required',
            'amount'     => 'required|numeric',
            'price'     => 'required|numeric',
            'type'      => 'required',
            
        ]);

        $input = [
            'item_name' => $request->input('item_name'),
            'amount'    => $request->input('amount'),
            'price'     => $request->input('price'),
            'type'      => $request->input('type'),
            'category_id' => $request->input('category_id')
        ];

        $insert = Item::create($input);

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $bio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data ['title'] = "Barang";
        $data ['item'] = Item::find($id);
        $data ['category'] = Category::all();
        return view('page.item.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $item->item_name          = $request->input('item_name');
        $item->amount             = $request->input('amount');
        $item->price              = $request->input('price');
        $item->type               = $request->input('type');
        $item->category_id        = $request->input('category_id');
        
        $item->save();

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete =Item::find($id);
        $delete->delete();

        return redirect()->route('barang.index');
    }
}
