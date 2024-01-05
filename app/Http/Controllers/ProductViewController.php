<?php

namespace App\Http\Controllers;

use App\Course;
use DB;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductViewController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('customer',[
    //         'except'=>[
    //             'login_form',
    //            'checkoutForm',
    //            'lo'
    //         ]
    //     ]);
    // }

    public function index(){
        $course = Course::all();
        return view('wellknown.frontend.productview',compact('course'));
     //   return view('wellknown.frontend.product_view',compact('course'));
    }

    public function shipping(Request $request)
    {
        if (Session::get('customer_id')) {
            if (! Cart::content()->count() > 0) {
                return redirect()->route('product.display');

            } else {

                // return view('wellknown.frontend.product_checkout');
               return view('wellknown.frontend.shipping');
               // return view('wellknown.frontend.product_cart');


            }
        }
        else{
            return redirect()->route('customer.login.form');

        }
    }
    public function checkout(Request $request)
    {
        $name = Session::get('name');
        return $name;
        return $request->all();
    }

    public function showCart(){
        return view('wellknown.frontend.product_cart');

    }


    public function productcart($id, $name, $price)
    {
        // return  Cart::add($id,$name,1,$price)->associate('App\AdminProduct');
        Cart::add($id, $name, 1, $price)->associate('App\AdminProduct');
        session()->flash('message', 'Cart Add Successfully. Thanks !!');
        //  return view('wellknown.frontend.product_cart');
//        return redirect()->route('product.shipping');
        return redirect()->route('cart.view');
    }

    public function cart()
    {
        return view('wellknown.frontend.product_cart');
        // return redirect()->route('product.shipping');
    }

    public function add_to_cart($id, $name, $price)
    {

        Cart::add($id, $name, 1, $price)->associate('App\AdminProduct');
        session()->flash('message', 'Cart Add Successfully. Thanks !!');
        //return view('wellknown.frontend.product_cart');
        return redirect()->route('cart.view');
    }




// public function increase($rowId)
// {
//     $product = Cart::get($rowId);
//     $qty = $product->qty + 1;
//     Cart::update($rowId, $qty);
//     return view('wellknown.frontend.product_cart');
// }


// public function increase(Request $request)
// {
//     $rowId = $request->id;
//     $product = Cart::get($rowId);
//     $qty = $product->qty + 1;
//     Cart::update($rowId, $qty);
//     return view('wellknown.frontend.product_cart');
// // }
// }


public function increase($rowId)
{

    $product = Cart::get($rowId);
    $qty = $product->qty + 1;
    Cart::update($rowId, $qty);
    //return view('wellknown.frontend.product_cart');
    return response()->json('successfully updated');

}
public function reduce($rowId)
{

    $product = Cart::get($rowId);
    $qty = $product->qty - 1;
    if ($qty == 0){
        $qty = 1;
    }
    Cart::update($rowId, $qty);
//    return view('wellknown.frontend.product_cart');
    return response()->json('successfully updated');
}

public function qtyUpdate(Request $request)
{
    $qty = $request->qty;
    if ($qty == 0){
        $qty =1;
    }
    Cart::update($request->id,$qty);
    return response()->json('successfully update');
}

public function destroy($rowId){
    Cart::remove($rowId);
    session()->flash('success_message','Item remove Successfully !!');
    return view('wellknown.frontend.product_cart');
}
public function destroyAll(){
    Cart::destroy();
    return view('wellknown.frontend.product_cart');
}


    public function payment(Request $request)
    {
        return view('wellknown.frontend.product_payment');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


}
