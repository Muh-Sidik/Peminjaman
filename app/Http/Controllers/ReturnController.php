<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Retrun;
use DateTime;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['menu'] = 6;
        $data['title'] = "Pengembalian";
        $data['booking_data'] = Booking::join('clients', 'clients.client_id', '=', 'bookings.client_id')->join('items', 'items.item_id', '=', 'bookings.item_id')->where('status', 'process')->get();
        $data['no'] = 1;

        return view('page.return.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function information(Request $request)
    {
        $booking_code = $request->booking_code;
        
        if($booking_code == '') {
            $request->session()->flash('warning', 'Pilih data Pempinjaman dahulu');
            return redirect()->route('pengembalian.index');
        }

        $booking_table = Booking::where('booking_code', $booking_code)->first();
        if ($booking_table->count() == 0) {
            $request->session()->flash('warning', 'Data Peminjaman tidak ditemukan');
            return redirect()->route('pengembalian.index');
        }

        //denda (10% perhari)

        if($booking_table->return_date_supposed < date('Y-m-d')) {
            $return_supposed = new DateTime($booking_table->return_date_supposed);
            $return_now      = new DateTime(date('Y-m-d'));
            $selisih         = $return_supposed->diff($return_now);
            for($i=1; $i<=$selisih->days; $i++) {
                $fine = ($booking_table->price * $i. '0')/100;
            }
             $data['fine'] = $fine;
             $data['late'] = $selisih->days;
        } else {
            $data['fine'] = null;
            $data['late']  = null;
        }


        $data['payment'] = Retrun::where('booking_code', $booking_code)->get()->first();
        $data['data']    = $booking_table;
        $data['client']  = Client::find($booking_table->client_id);
        $data['item']   = Item::find($booking_table->item_id);
        $data['total']  = $booking_table->price + $data['fine'] - $data['payment']->amount;
        $data['title']  ="Proses Pengembalian";
        $data['menu']   = 6;

        return view('pengembalian.information', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function process(Request $request)
    {
        $validate = $request->validate([
            'amount' => 'required|min'.$request->total .'|numeric',
            'booking_code' => 'required'
        ]);

        if($request->amount > $request->total) {
            $request->amount = $request->total;
        }

        //update table booking
        $amount = Booking::where('booking_code', $request->booking_code);
        $update_booking = $amount->update([
            'return_date'   => date('Y-m-d'),
            'fine'          => $request->fine,
            'status'        => 'paid'
        ]);

        //add data ke table payments
        $payment = Retrun::create([
            'type'          => $request->input('type'),
            'amount'        => $request->input('amount'),
            'date'          => date('Y-m-d'),
            'client_id'     => $request->input('client_id'),
            'employee_id'   => $request->input('employee_id'),
            'booking_code'  => $request->input('booking_code'),
        ]);

        $item = Item::find($request->item_id);
        $result = $item->amount + $amount->amount_item;
        $result->save();

        $request->session()->flash('success', 'Pengembalian Barang Berhasil');
        return redirect()->route('pengembalian.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Retuns  $bio
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Retuns  $bio
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Retuns  $bio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Retuns  $bio
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
