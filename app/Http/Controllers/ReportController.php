<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = "Laporan Transaksi";
        $data['menu']  = 7;
        $data['no']    = 1;

        if(!isset($_GET['type'])) {
            return view('page.report.index', $data);
        } else {
            $data['data'] = $request->toArray();
            switch ($request->type) {
                case 'all' :
                    $data['booking'] = Booking::whereBetween('order_date', [$request['start_date'], $request['end_date']])
                    ->join('clients', 'clients.clinet_id', '=', 'bookings.client_id')
                    ->join('items', 'items.item_id', '=', 'bookings.item_id')->get();
                break;

                case 'process' :
                    $data['booking'] = Booking::where('status', 'process')->whereBetween('order_date', [$request['start_date'], $request['end_date']])
                    ->join('clients', 'clients.clinet_id', '=', 'bookings.client_id')
                    ->join('items', 'items.item_id', '=', 'bookings.item_id')->get();
                break;

                case 'paid' :
                    $data['booking'] = Booking::where('status', 'paid')->whereBetween('order_date', [$request['start_date'], $request['end_date']])
                    ->join('clients', 'clients.clinet_id', '=', 'bookings.client_id')
                    ->join('items', 'items.item_id', '=', 'bookings.item_id')->get();
                break;
            }
            if ($request->type == 'all') {
                
            } elseif ($request->type == 'process'){

            }

            return view('page.report.transaction', $data);
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $bio
     * @return \Illuminate\Http\Response
     */
    public function show(Report $bio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $bio
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $bio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $bio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $bio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $bio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $bio)
    {
        //
    }
}
