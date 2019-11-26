<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Client;
use App\Item;
use App\Retrun;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 5;
        $data['title'] = "Sewa Barang";
        $data['item'] = Item::all();
        return view('page.booking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createClient(Request $request)
    {
        $validate = $request->validate([
            'name'      => 'required|string',
            'dob'       =>  'required',
            'phone'     => 'required|numeric|max:14',
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
            $request->session()->flash('success', 'Berhasil Menambahkan Data Pelanggan');
            return redirect()->route('booking.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function calculate(Request $request)
    {
        $validate = $request->validate([

            'order_date'    => 'required',
            'duration'      => 'required'

        ]);

        //waktu pengembalian
        $order_duration = $request->input('duration');
        $order_date     = $request->input('order_date');
        $return_date    = date('Y-m-d', strtotime('+'. $order_duration .'days', strtotime($order_date)));

        //harga
        $item = Item::find($request->client_id);
        $total_price = $item->price * $order_duration;

        //bayar dp(30% dari harga total)
        $dp = ($total_price * 10) / 100;

        $data = $request->toArray();

        $client = Client::find($request->client_id);

        $title = 'Detail Pesanan';
        $menu = 5;

        return view('page.booking.detail', compact('return_date', 'total_price', 'item', 'dp', 'data', 'client','title', 'menu'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $bio
     * @return \Illuminate\Http\Response
     */
    public function listMember()
    {
        $get = $_GET['data'];

        $data = Client::where('name', 'like', "%get%")->get();

        $output = "<ul class='ul-client'>";

        if(count($data)) {
            foreach($data as $row) {
                $output = "<li class='li-client'>".$row->client_id. " - ". $row->name ."</li>";
            }
        } else {
            $output = '<li class="li-client-null">Belum Terdaftar? <a href="" data-toggle="modal" data-target="#clientModal">';
        }

        echo $output;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $bio
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $bio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $bio
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        $validate = $request->validate([
            'order_date'        => 'required',
            'duration'          => 'required',
            'client_id'         => 'required|integer',
            'return_date_supposed' => 'required',
            'price'             => 'required|integer',
            'employee_id'       => 'required',
            'type'              => 'required',
            'amount'            => 'required|integer'
        ]);
        
        $amount = $request->input('amount_item');
        $insert_booking = Booking::create([
            'booking_code'      => $request->input('booking_code'),
            'order_date'        => $request->input('order_date'),
            'duration'          => $request->input('duration'),
            'return_date_supposed' => $request->input('return_data_supposed'),
            'amount_item'       => $amount,
            'price'             => $request->input('price'),
            'status'            => 'process',
            'employee_id'       => $request->input('employee_id'),
            'item_id'           => $request->input('item_id'),
            'client_id'         => $request->input('client_id'),
        ]);

        $insert_payment = Retrun::create([
            'type'          => $request->input('type'),
            'amount'        => $request->input('amount'),
            'date'          => date('Y-m-d'),
            'client_id'     => $request->input('client_id'),
            'employee_id'   => $request->input('employee_id'),
            'booking_code'  => $request->input('booking_code'),

        ]);

        $item = Item::find($request->item_id);
        $result = $item->amount - $amount;
        $result->save();

        $request->session()->flash('success', 'Transaksi Berhasil!');
        return redirect()->route('booking.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $bio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $bio)
    {
        //
    }
}
