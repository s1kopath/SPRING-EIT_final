<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;
// --------------- new ------------------
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
// -----------------------------------


class CustomerLoginController extends Controller
{




    public function checkoutForm(Request $request){
      if(Session::get('customer_id')){
        // return view('wellknown.frontend.product_checkout');
        return view('wellknown.frontend.shipping');
      }else{}

      return view('wellknown.frontend.customer_login');
    }



    public function index()
    {

    if (Session::get('customer_id')){

        return redirect()->route('product.shipping');

    }

         return view('wellknown.frontend.customer_login');
       // return view('wellknown.frontend.customerlogin');
    }


    public function registerview()
    {
        return view('wellknown.frontend.customer_register');
    }


    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password"  => "required"
        ]);
        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            if (password_verify($request->password, $customer->password)) {
                if(Session()->has('LoginStudent')){
                    Session::forget('LoginStudent');

                }
                Session::put('customer_id', $customer->id);
                Session::put('customer_fname', $customer->f_name);
                Session::put('customer_lname', $customer->l_name);
                Session::put('customer_email', $customer->email);
                if (!Cart::content()->count() > 0) {
                    return redirect()->route('product.display');
                } else {

                    return redirect()->route('product.shipping');

                }
            } else {
                $this->login_error();
                return redirect()->back()->with('message','Invalid email or password');
            }
        } else {
            $this->login_error();
            return redirect()->back()->with('message','Invalid email or password');
        }
    }

    public function login_error(){
            Session::forget('login_error','something wrong');
    }

    public function logout(){
        Session::forget('customer_id');
        $this->destroyAll();
         return redirect()->route('product.display');
      //  return redirect()->guest(route('product.checkout'));
    }

    public function destroyAll(){
        Cart::destroy();
      //  return view('wellknown.frontend.product_cart');
    }


    public function register(Request $request)
    {


     // return $request->all();
    //  dd($request->all());
        $request->validate([
            "f_name" =>  "required|min:2|max:20",
            "l_name" => "required|min:2|max:20",
            "phone"  => "required|min:11|max:11|unique:customers,phone|regex:/^[0-9]{11}+$/",
            "email" => "required|unique:customers,email",
            "password"  => "min:6|required|required_with:password_confirmation|same:password_confirmation",

            "password_confirmation" => "min:6|required"

        ]);
        $customer = Customer::create([
                'f_name' =>$request->f_name,
                'l_name'=>$request->l_name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'password_confirmation'=>bcrypt($request->password_confirmation),
        ]);
          if(Session()->has('LoginStudent')){
                    Session::forget('LoginStudent');

                }
        Session::put('customer_id',$customer->id);

        Session::put('customer_fname', $customer->f_name);
        Session::put('customer_lname', $customer->l_name);
        Session::put('customer_email', $customer->email);


           if (!Cart::content()->count() > 0) {
            return redirect()->route('product.display')->with('message','Account Create Successfully');
        } else {

            return redirect()->route('product.shipping')->with('message','Account Create Successfully');

        }


    }

    public function profile_update($id){

         $update_profile = Customer::find($id);
         return view('pages.tables.update_profile',['update_profile'=>$update_profile]);

     }


    public function update_profile(Request $request)
    {

        if($request->password){
            $customer = Customer::find($request->id);
            $customer->f_name = $request->f_name;
            $customer->l_name = $request->l_name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->password = bcrypt($request->password);
            $customer->update();
            session()->flash('message', 'Update Successfully with Password !!');

            return redirect()->back();
        }
        else{
            $customer = Customer::find($request->id);
            $customer->f_name = $request->f_name;
            $customer->l_name = $request->l_name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            // $customer->password = $request->password;
            $customer->update();
            session()->flash('message', 'Update Successfully  without Password !!');

            return redirect()->back();

        }

    }

    // -------------------- 22/6/21 new --------------------------
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $check = Customer::where('email', $user->email)->first();

        if ($check) {
            try{
                if(Session()->has('LoginStudent')){
                    Session::forget('LoginStudent');

                }
                Session::put('customer_id', $check->id);
                Session::put('customer_fname', $check->f_name);
                Session::put('customer_lname', $check->l_name);
                Session::put('customer_email', $check->email);
                if (!Cart::content()->count() > 0) {
                    return redirect()->route('product.display');
                } else {

                    return redirect()->route('product.shipping');

                }
            }catch(Exception $e){
                $this->login_error();
                return redirect()->back();
            }

        } else {
            $data = new Customer();
            $data->f_name = $user->name;
            $data->email = $user->email;
            $data->password= bcrypt(uniqid());
            $data->save();
            try{
                if(Session()->has('LoginStudent')){
                    Session::forget('LoginStudent');

                }
                Session::put('customer_id', $data->id);
                Session::put('customer_fname', $data->f_name);
                Session::put('customer_lname', $data->l_name);
                Session::put('customer_email', $data->email);
                if (!Cart::content()->count() > 0) {
                    return redirect()->route('product.display');
                } else {

                    return redirect()->route('product.shipping');

                }
            }catch(Exception $e){
                $this->login_error();
                return redirect()->back();
            }
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        try{
            $user = Socialite::driver('facebook')->user();
            $check = Customer::where('email', $user->email)->first();

            if ($check) {
                try{
                    if(Session()->has('LoginStudent')){
                        Session::forget('LoginStudent');

                    }
                    Session::put('customer_id', $check->id);
                    Session::put('customer_fname', $check->f_name);
                    Session::put('customer_lname', $check->l_name);
                    Session::put('customer_email', $check->email);
                    if (!Cart::content()->count() > 0) {
                        return redirect()->route('product.display');
                    } else {

                        return redirect()->route('product.shipping');

                    }
                }catch(Exception $e){
                    $this->login_error();
                    return redirect()->back();
                }

            } else {
                $data = new Customer();
                $data->f_name = $user->name;
                $data->email = $user->email;
                $data->password= bcrypt(uniqid());
                $data->save();
                try{
                    if(Session()->has('LoginStudent')){
                        Session::forget('LoginStudent');

                    }
                    Session::put('customer_id', $data->id);
                    Session::put('customer_fname', $data->f_name);
                    Session::put('customer_lname', $data->l_name);
                    Session::put('customer_email', $data->email);
                    if (!Cart::content()->count() > 0) {
                        return redirect()->route('product.display');
                    } else {

                        return redirect()->route('product.shipping');

                    }
                }catch(Exception $e){
                    $this->login_error();
                    return redirect()->back();
                }
            }
        }catch(Exception $e){
            $this->login_error();
            return redirect()->route('customer.login.form');
        }
    }

    // -------------------------------------------------------------

    public function destroy($id)
    {
        //
    }
}
