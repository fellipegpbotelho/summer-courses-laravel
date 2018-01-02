<?php

namespace App\Http\Controllers\Admin;

use App\Models\OrderUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrdersController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $orders = DB::table('order_user')
                    ->join('users', 'users.id', '=', 'order_user.user_id')
                    ->join('products', 'products.id', '=', 'order_user.product_id')
                    ->select(
                        'order_user.id as order_id',
                        'users.name as user_name',
                        'products.name as product_name',
                        DB::raw("(CASE order_user.status WHEN 1 THEN 'Pago' WHEN 0 THEN 'Pendente' END) AS order_user_status")
                    )
                    ->get();

        return view('admin.orders.index', compact('orders'));
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
