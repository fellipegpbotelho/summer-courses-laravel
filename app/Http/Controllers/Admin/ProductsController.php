<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        try{

            $validator = $this->validate($request, [
                'name' => 'required|max:255',
                'amount' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = $this->uploadImage($request);

            $product = Product::create([
                'name' => $request->name,
                'amount' => $request->amount,
                'description' => $request->description,
                'image' => $imageName,
            ]);

            return redirect()->route('admin.products.index')->with('success', 'Produto cadastrado com sucesso!')->withErrors($validator)->withInput();

        }catch(Exeption $e){
            return redirect()->route('admin.products.index')->with('danger', 'Ocorreu um erro, tente novamente!');
        }
    }

    private function uploadImage(Request $request){

        $image = $request->file('image');
        $input['imageName'] = time().'.'.$image->getClientOriginalExtension();

        $img = Image::make($image->getRealPath());

        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imageName']);

        return $input['imageName'];
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
