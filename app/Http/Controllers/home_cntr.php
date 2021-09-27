<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\User;
use App\Models\cart;
use App\Models\order;
class home_cntr extends Controller
{
    public function redirect()
    {
       $usertype=Auth::user()->usertype;
       if($usertype=='1')
       {
           return view('admin.home');
       }
       else{
        $data = product::paginate(3);
        $user=auth()->user();
        $count=cart::where('phone',$user->phone)->count();
        return view('user.home',compact('data','count'));
       }

    }
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirect');
        }
        else
        {
           $data = product::paginate(3);
          return view('user.home',compact('data'));
          
        }
    }
    public function search(Request $request)
    {
        $search=$request->search;
        if($search=='')
        {
            $data = product::paginate(3);
          return view('user.home',compact('data'));
        }
        $data=product::where('title','like','%'.$search.'%')->get();
        return view('user.home',compact('data'));
    }
    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user=auth()->user();
            $product=product::find($id);
            $cart=new cart();
             $cart->name=$user->name;
             $cart->phone=$user->phone;
             $cart->address=$user->address;
             $cart->product_title = $product->title;
             $cart->price=$product->price;
             $cart->quantity=$request->quantity;
             $cart->save();
             return redirect()->back()->with('message','Add to cart successfully');

        }else
        {
            return redirect('login');
        }
        
    }
    public function showcart()
    {
        $user=auth()->user();
        $count=cart::where('phone',$user->phone)->count();
        $cart=cart::where('phone',$user->phone)->get();
        return view('user.showcart', compact('count','cart'));
    }
    public function deletecart($id)
    {
        $data=cart::find($id);
        $data->delete();
        return redirect()->back()->with('message','Delete to cart successfully');
    }
    public function confirmorder(Request $request)
    {
     $user=auth()->user();
     $name=$user->name;
     $phone=$user->phone;
     $address=$user->address;
     foreach($request->product_name as $key=>$productname)
     {
       $order=new order;
       $order->product_name=$request->product_name[$key];
       $order->quantity=$request->quantity[$key];
       $order->price=$request->price[$key];
       $order->name=$name;
       $order->phone=$phone;
       $order->address=$address;
       $order->status='not delivered';
       $order->save();
     }
      DB::table('carts')->where('phone',$phone)->delete();
      return redirect()->back()->with('message','Get orderd successfully');
    }
    public function product()
    { if( $user=auth()->user())
        {
        $data = product::paginate(3);
       
        $count=cart::where('phone',$user->phone)->count();
        return view('user.home',compact('data','count'));
        }
        else{
            $data = product::all();
            return view('user.home',compact('data'));
        }
    }
    public function home()
    { if( $user=auth()->user())
        {
        $data = product::paginate(3);
       
        $count=cart::where('phone',$user->phone)->count();
        return view('user.home',compact('data','count'));
        }
        else{
            $data = product::all();
            return view('user.home',compact('data'));
        }
    }
    public function about()
    { 
      return view('user.about');
    }
    public function contact()
    { 
      return view('user.contact_us');
    }
}