<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\product_details;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;




class DashboardController extends Controller
{

    //نجبر مستخدم علي تسجيل الدخول
    public function __construct()
    {
        $this->middleware('auth');
    }


    // insart
    public function CreateProducts(Request $request)
    {
        $Product = products::create
        ([
                'ProductName' => $request->ProductName
            ]);
        $Product->save();
        return Redirect('dashboard/Products');
    }







    // الداله ذي ترجع صفحه
    public function index()
    {

        // طريقه السشن 
        Session::put('key', " Section انا ");
        Cookie::queue('key', "Cookieانا ", 1);

        return view('dashboard.index');
    }


// ======================================================================================

    // read   
    public function Products()
    {
        $Product = products::all();
        return view('dashboard.Products', ['Key' => $Product]);
    }


    // delete
    public function Dil($id)
    {
        $Product = products::find($id);
        $Product->delete();
        return Redirect('dashboard/Products');
    }


    public function Edit($id)
    {

        $Product = products::find($id);

        return view('dashboard.edit', ['Key' => $Product]);
    }


    public function ubdate(Request $request)
    {
        $Product = products::where('id', $request->id)->update
        ([
                'ProductName' => $request->ProductName,
            ]);

        return Redirect('dashboard/Products');
    }




    public function Search(Request $request)
    {

        $Product = products::where('ProductName', 'like', '%' . $request->name . '%')->get();

        return view('dashboard.Products', ['Key' => $Product]);

    }



    // داله كل وظيفتها انها  ترجع القيم كلها بعد البحث
    public function NotSearch()
    {
        return Redirect('dashboard/Products');
    }

// ======================================================================================






    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }



    // يرجع صفحه Product Deatals
    public function Product_Deatals(Request $request)
    {
        // $Product = products::all();
        // هنا انا احتاج اسم ورقم المنتج عشان تظهر  لما اجي اضيف تفاصيل المتج
        $Product_Deatals = DB::table('products')
            ->join('product_details', 'products.id', '=', 'product_details.product_id')
            ->select(
                'products.id',
                'product_details.id',
                'product_id',
                'products.ProductName',
                'product_details.color',
                'product_details.price',
                'product_details.qty',
                'product_details.description'
            )
            ->where('color', 'like', '%' . $request->name . '%')
            ->orWhere('price', 'like', '%' . $request->name . '%')
            ->orWhere('qty', 'like', '%' . $request->name . '%')
            ->orWhere('description', 'like', '%' . $request->name . '%')
            ->orWhere('ProductName', 'like', '%' . $request->name . '%')
            ->get();
        return view('dashboard.Productdeatals', ['product_details' => $Product_Deatals]);

    }

    // insart
    public function CreateProduct_Deatals(Request $request)
    {

        // dd($request);
        //  بنسوي تحقق علي الفورم 
        $valdit = $request->validate([
            'color' => 'required|string|max:20',
            'price' => 'required',
            'qty' => 'required',
            'description' => 'required'



        ]);

        $Product_Deatals = product_details::create

        ([



                'color' => $request->color,
                'price' => $request->price,
                'qty' => $request->qty,
                'description' => $request->description,
                'product_id' => $request->Product

            ]);
        $Product_Deatals->save();
        return Redirect('/dashboard/ProductDeatals');



    }
    // delete
    public function deleteproduct_details($id)
    {
        $product_details = product_details::find($id);
        $product_details->delete();
        return Redirect('/dashboard/ProductDeatals');
    }

    // Editproduct_details  
    public function Editproduct_details($id)
    {
        $product_details = product_details::find($id);

        return view('dashboard.Edit_product_details', ['product_details' => $product_details]);
    }

    public function ubdateproduct_details(Request $request)
    {
        $product_details = product_details::where('id', $request->id)->update
        ([

                'color' => $request->color,
                'price' => $request->price,
                'qty' => $request->qty,
                'description' => $request->description,
            ]);

        return Redirect('/dashboard/ProductDeatals');
    }

    // public function Searchproduct_details(Request $request)
    // {

    //     $Product_Deatals = DB::table('products')
    //         ->join('product_details', 'products.id', '=', 'product_details.product_id')
    //         ->select('products.id', 'product_details.id', 'product_id', 'products.ProductName', 'product_details.color', 'product_details.price', 'product_details.qty', 'product_details.description')
    //         ->where('color', 'like', '%' . $request->name . '%')
    //         ->orWhere('price', 'like', '%' . $request->name . '%')
    //         ->orWhere('qty', 'like', '%' . $request->name . '%')
    //         ->orWhere('description', 'like', '%' . $request->name . '%')
    //         ->orWhere('ProductName', 'like', '%' . $request->name . '%')

    //         ->get();
    //     return view('dashboard.Productdeatals', ['product_details' => $Product_Deatals]);
    // }



    // داله كل وظيفتها انها  ترجع القيم كلها بعد البحث
    public function NotSearchproduct_details()
    {
        return $this->Product_Deatals(new Request()); // Passing an empty Request object to simulate no search criteria

    }

}