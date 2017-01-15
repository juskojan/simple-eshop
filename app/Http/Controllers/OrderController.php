<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Orders;
use App\Product;
use App\OrderList;

class OrderController extends Controller
{
    public function fetch()
    {
        $orders = DB::table('objednavka')->get();
        return view('objednavky', compact('orders'));
    }

    public function delete($id)
    {

        Orders::find($id)->delete();
        return back();

    }

    public function edit($id)
    {

        //fetch this order
        $order = Orders::find($id);
        //fetch list of products
        $list_of_products_in_order = DB::table('orderlist')->where('order_id', '=', $order->id)->get();

        $all_products = DB::table('products')->get();

        foreach ($list_of_products_in_order as $item) {
            foreach ($all_products as $product) {
                if ($item->product_id == $product->id) {
                    $items[] = $product;
                }
            }
        }


        return view('orderedit', compact('order', 'items', 'all_products'));

    }

    public function add()
    {

        $products = DB::table('products')->get();

        return view('addorder', compact('products'));

    }


    public function create(Request $request)
    {
        $order = new Orders;
        if($request->meno !== '' && $request->adresa !== '' && !empty($request->product)){
            $order->meno = $request->meno;
            $order->adresa = $request->adresa;
            $order->save();
            $orderid = $order->id;
            $productList = $request->product;
            $sum = 0;
            //produkty v novej objednavke
            foreach ($productList as $product){
                $products_to_sum = DB::table('products')->where('id', '=', $product)->get();
                foreach ($products_to_sum as $key) {
                    $sum = $sum + $key->cena;
                }

                $orderList = new OrderList;
                $orderList->order_id = $orderid;
                $orderList->product_id = $product;
                $orderList->save();
            }
            $order = Orders::find($orderid);
            $order->cena = $sum;
            $order->save();
        }

        return back();
    }

    public function view($id)
    {
        //fetch this order
        $order = Orders::find($id);
        //fetch list of products
        $list_of_products_in_order = DB::table('orderlist')->where('order_id', '=', $order->id)->get();

        $all_products = DB::table('products')->get();

        foreach ($list_of_products_in_order as $item) {
            foreach ($all_products as $product) {
                if ($item->product_id == $product->id) {
                    $items[] = $product;
                }
            }
        }
        return view('viewedit', compact('order', 'items'));

    }

    public function updatehead(Request $request)
    {
        $order = Orders::find($request->id);
        if($request->meno !== '' && $request->adresa !== ''){
            $order->meno = $request->meno;
            $order->adresa = $request->adresa;
            $order->save();
        }

        return redirect('/objednavky');

    }

    public function updateproducts(Request $request)
    {
        //cislo editovanej objednavky
        $order = Orders::find($request->id);
        //zoznam zaciarknutych produktov
        if (empty($request->products)) {
            return back();
        }

        $productList = $request->products;
        //aktualna suma
        $sum = $order->cena;

        // pre kazdy odobraty pordukt odcitaj jeho cenu zo sumy
        foreach ($productList as $minus_product) {
            $products_to_sum = DB::table('products')->where('id', '=', $minus_product)->get();
            foreach ($products_to_sum as $key) {
                $sum = $sum - $key->cena;
            }
        }

        $products_to_delete = DB::table('orderlist')->where('order_id', '=', $order->id)->get();
        
        foreach ($productList as $deletee) {
            foreach ($products_to_delete as $nominee) {
                if ($deletee == $nominee->product_id) {
                    OrderList::find($nominee->id)->delete();
                }
            }
        }   
        $order->cena = $sum;
        $order->save();

        return back();
    }

    public function addtoproducts(Request $request)
    {
        //cislo editovanej objednavky
        $order = Orders::find($request->id);
        //zoznam zaciarknutych produktov
        if (empty($request->producty)) {
            return back();
        }
        $productList = $request->producty;

        $sum = $order->cena;
        foreach ($productList as $plus_product) {
            $products_to_sum = DB::table('products')->where('id', '=', $plus_product)->get();
            foreach ($products_to_sum as $key) {
                $sum = $sum + $key->cena;
            }
        }

        foreach ($productList as $product){
            $orderList = new OrderList;
            $orderList->order_id = $order->id;
            $orderList->product_id = $product;
            $orderList->save();
        }

        $order->cena = $sum;
        $order->save();
        return back();
    }
}
