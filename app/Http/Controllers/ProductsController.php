<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;

class ProductsController extends Controller
{
    public function fetch()
    {
    	$products = DB::table('products')->get();


    	return view('products', compact('products'));
    }

    public function addProduct(Request $request)
    {
    	$producto = new Product;
    	if($request->nazov !== '' && $request->kod !== '' && is_numeric($request->cena)){
    		$producto->nazov = $request->nazov;
	    	$producto->kod = $request->kod;
	    	$producto->cena = $request->cena;
	    	$producto->save();
    	}

    	return back();
    }

    public function delete($id)
    {
        Product::find($id)->delete();

        return back();
    }

    public function edit($id)
    {

        $producto = Product::find($id);


        return view('edit', compact('producto'));

    }

    public function updateProduct(Request $request)
    {	
    	$producto = Product::find($request->id);
    	if($request->nazov !== '' && $request->kod !== '' && is_numeric($request->cena)){
    		$producto->nazov = $request->nazov;
	    	$producto->kod = $request->kod;
	    	$producto->cena = $request->cena;
	    	$producto->save();
    	}

    	return redirect('/products');    
    }
}
