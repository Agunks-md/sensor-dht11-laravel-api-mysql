<?php

namespace App\Http\Controllers;

use App\Models\Order_model;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // $order = Order_model::select('orders.order_id', 
        //         'customers.name',
        //         'orders.order_date',
        //         'menu.name',
        //         'order_items.price',
        //         'order_items.quantity')
        //         ->join ('customers','customers.customer_id','=','orders.customer_id')
        //         ->join ('order_items','order_items.order_id','=','orders.order_id')
        //         ->join ('menu','menu.menu_id','=','menu.menu_id')
        //         ->get(); 

        // SELECT  
        // pemesanan_item.harga_jual, pemesanan_item.jumlah_jual,
        // pemesanan.tanggal, 
        // produk.nama_produk, 
        // pelanggan.nama_pelanggan
        // FROM pemesanan_item 
        // JOIN pemesanan ON pemesanan.id_pemesanan=pemesanan_item.id_pemesanan
        // JOIN produk ON produk.id_produk= pemesanan_item.id_produk
        // JOIN pelanggan ON pelanggan.id_pelanggan= pemesanan.id_pelanggan

        $pemesanan_item = Pemesananitem_model::select('pemesanan_item.harga_jual','pemesanan_item.jumlah_jual', 
                'pelanggan.nama_pelanggan',
                'pemesanan.tanggal',
                'produk.nama_produk',)
                ->join ('pelanggan','pelanggan.id_pelanggan','=','pemesanan.id_pelanggan')
                ->join ('pemesanan','pemesanan.id_pemesanan','=','pemesanan_item.id_pemesanan')
                ->join ('produk','produk.id_produk','=','pemesanan_item.id_produk')
                ->get(); 

       return view('order.index', compact('order'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
