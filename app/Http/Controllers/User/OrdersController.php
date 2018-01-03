<?php

namespace App\Http\Controllers\User;

use App\Models\OrderUser;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Auth;

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
                'products.image as product_image',
                DB::raw("(CASE order_user.status WHEN 1 THEN 'Pago' WHEN 0 THEN 'Pendente' END) AS order_user_status")
            )
            ->where('order_user.user_id', '=', Auth::guard('web')->user()->id)
            ->get();

        return view('user.orders.index', compact('orders'));
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
    public function store(Request $request){

        try{
            $product = Product::find($request->get('product_id'));
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $user->products()->attach($request->get('product_id'), [
                'status' => 0,
                'quantity' => $request->get('quantity'),
                'value' => $product->amount,
            ]);

            return redirect()->route('user.orders.index')->with('success', 'Compra realizada com sucesso!');
        }catch(\Exception $e){
            return redirect()->route('user.products.show', $request->product_id)->with('danger', 'Ocorreu um erro, tente novamente!');
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
