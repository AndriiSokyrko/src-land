<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(view()->exists('admin.pages')) {

            $products = \App\Product::all();

            $data = [

                'title' => 'Продукты',
                'pages' => $products

            ];

            return view('admin.products',$data);

        }

        abort(404);
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
    public function edit(Product $product, Request $request )
    {

        if($request->isMethod('post')) {
            $input = $request->except('_token');


            $massages = [

                'required'=>'Поле :attribute обязательно к заполнению',
                'unique'=>'Поле :attribute должно быть уникальным'

            ];


            $validator = Validator::make($input,[

                'name' => 'required|max:255',
                'alias' => 'required|unique:pages|max:255',
                'text'=> 'required'

            ], $massages);

            if($validator->fails()) {
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');

                $input['images'] = $file->getClientOriginalName();

                $file->move(public_path().'/assets/img',$input['images']);

            }




            //$page->unguard();

            $product->fill($input);

            if($product->save()) {
                return redirect('admin')->with('status','Продукт добавлен');
            }

        }


        if(view()->exists('admin.products_add')) {

            $data = [

                'title' => 'Новый продукт'

            ];
            return view('admin.products_add',$data);

        }

        abort(404);


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
