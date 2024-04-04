<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\carts;
use App\Models\products;

class ShippingController extends Controller
{
    //

    public function ShowShipping(Request $request)
    {


        $data = DB::table('products')->join('product_details', 'products.id', '=', 'product_id')->get();


        $tax = 0.15;
        $descount = 10;
        // الطريقه الاولى
        foreach ($data as $key => $row) {
            $data[$key]->total = ($data[$key]->price * $tax) + $data[$key]->price;
            $data[$key]->descount = $descount;
            $data[$key]->tax = $tax;
            $data[$key]->net = $data[$key]->total - $data[$key]->descount;
        }
        // dd($data);
        // $row = [];
        // الطريقه الثالنيه وهي افضل 
        // foreach ($data as $key => $items) {
        //     $row[$key] = [
        //         'ProductName' => $data[$key]->ProductName,
        //         'color' => $data[$key]->color,
        //         'price' => $data[$key]->price,
        //         'qty' => $data[$key]->qty,
        //         'description' => $data[$key]->description,
        //         'images' => $data[$key]->images,
        //         'total' => ($data[$key]->price * $tax) + $data[$key]->price,
        //         'descount' => $data[$key]->descount,
        //         'tax' => $data[$key]->tax,
        //         'net' => $data[$key]->total - $data[$key]->descount,


        //     ];
        // }
        // dd($row);
        return view('Shipping.list_items', ['data' => $data]);

    }

    public function Add_to_cart(Request $request, $id)
    {
        $userid = $request->user()->id;
        $data = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->where('product_details.id', '=', $id)
            ->first();
        $tax = 0.15;
        $descount = 10;
        $data->total = ($data->price * $tax) + $data->price;
        $data->descount = $descount;
        $data->tax = $tax;
        $data->net = $data->total - $data->descount;

        $row[] = [
            'product_id' => $data->id,
            'price' => $data->price,
            'qty' => $data->qty,
            'tax' => $data->tax,
            'total' => $data->total,
            'discount' => $data->descount,
            'Net' => $data->net,
            'user_id' => $userid,
        ];
        DB::table('carts')->insert($row);
        $cont = DB::table('carts')->where('user_id', '=', $userid)->count();
        Session::put('cont', $cont);
        return redirect()->back();
        // dd($data);


    }


    public function details($id)
    {
        $data = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_id')
            ->where('product_details.id', '=', $id)
            ->first();


        $tax = 0.15;
        $descount = 10;
        $data->total = ($data->price * $tax) + $data->price;
        $data->descount = $descount;
        $data->tax = $tax;
        $data->net = $data->total - $data->descount;
        return view('Shipping.details', ['data' => $data]);
    }


    public function Show_cart()
    {
        // $carts = carts::all();

        $data = DB::table('product_details')->join('carts', 'product_details.id', '=', 'carts.product_id')->get();
        // dd($data);
        return view('Shipping.Show_cart', ['data' => $data]);


    }
    // public function Dil($id)
    // {
    //     $Product = carts::find($id);
    //     $Product->delete();
    //     return Redirect('/Shipping/Show_cart');
    // }
}