<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use App\Models\Food\Food;
use Illuminate\Http\Request;
use App\Models\Food\Cart;
use App\Models\Food\Booking;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FoodsController extends Controller
{
    public function foodDetails($id){
        $foodItem=Food::find($id);
        if(Auth::user()){
        //Verifying if user added item to cart
        $cartVerifing=Cart::where('food_id',$id)->where('user_id',Auth::user()->id)->count();
        return view('foods.food-details',compact('foodItem', 'cartVerifing'));
        }
        else{
            return view('foods.food-details',compact('foodItem'));
        }
    }

    public function cart(Request $request, $id){
        $cart=Cart::create($request->all());
        if($cart){
            return redirect()->route('food.details',$id)->with([ 'success' => 'Food added to cart successfully']);
        //  $foodItem=Food::find($id);
        // return view('foods.food-details',compact('foodItem'))

        }
    }

    public function displayCartItems(){
        if(Auth::user()){
            //display cart items
            $cartItems=Cart::where('user_id',Auth::user()->id)->get();
            //price
            $price=Cart::where('user_id',Auth::user()->id)->sum('price');
            return view('foods.cart',compact('cartItems','price'));
        } else {
            abort(404);
        }
    }

    public function deleteCartItems($id){
        $cart=Cart::find($id);
        if($cart){
            $cart->delete();
            return redirect()->route('food.display.cart')->with([ 'success' => 'Food removed from cart successfully']);
        }
    }
    public function bookingTables(Request $request)
    {
        $currentDate = Carbon::now();

        // Validate the request
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'date' => 'required|date_format:"m/d/Y h:i A"|after:now',
            'num_people' => 'required|integer|min:1',
            'spe_request' => 'nullable|string|max:255',
        ]);

        // Convert the input date to the correct format
        $formattedDate = Carbon::createFromFormat('m/d/Y h:i A', $request->date)->format('Y-m-d H:i:s');

        $bookingTables = Booking::create([
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'date' => $formattedDate,
            'num_people' => $request->num_people,
            'spe_request' => $request->spe_request,
        ]);

        if ($bookingTables) {
            return redirect()->route('home')->with('booked', 'Table booked successfully');
        }
    }
    public function menu(){

        $breakfastFoods=Food::select()->take(4)->where('category','Breakfast')->orderBy('id','desc')->get();

        $launchFoods=Food::select()->take(4)->where('category','launch')->orderBy('id','desc')->get();

        $dinnerFoods=Food::select()->take(4)->where('category','dinner')->orderBy('id','desc')->get();

        return view('foods.menu',compact('breakfastFoods','launchFoods','dinnerFoods'));
    }

}
