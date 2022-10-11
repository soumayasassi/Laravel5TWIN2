<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
       return view ('Product.index', compact('products')) ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $catalogues = Catalogue::all();
        return view('Product.create', compact('categories',
            'catalogues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(ProductRequest $request)
    {



        $validated=$request->validated();
        $product = Product::create($request->all());

        /*$product = new Product([
            "name" => $request->get('name'),
            "description" => $request->get('description'),
            "price" => $request->get('price'),
            "stock" => $request->get('stock'),
        ]);*/

        $product->category_id  = $request->category_id;
        $product->catalogues()->attach($request->cats);

        return redirect()->route('product.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //$product = Product::find($id) ; on utilise si paramètre est id fonctionnel
        return view('Product.show', compact('product'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('Product.edit', compact('product'));

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
        $product = ['name'=>$request->name,'description'=>$request->description,
            'price'=>$request->price,
            'stock'=>$request->stock];
        Product::whereId($id)->update($product) ;
        return  redirect()->route('product.index')
            ->with('info','Product updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id) ;
        //var_dump($product);
        $product->delete() ;
        return redirect()->route('product.index')
            ->with('success','Product deleted successfully.') ;
    }
}
