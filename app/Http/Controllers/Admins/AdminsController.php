<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Food\Booking;
use App\Models\Food\Food;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request){
        $remember_me=$request->has('remember_me') ? true : false;
        if(auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('admins.dashboard');
    }
        return redirect()->back()->with('error', 'Error logging in');
    }
    public function index()
    {
        //food count
        $foodCount=Food::select()->count();
        $adminCount=Admin::select()->count();
        $BookingCount=Booking::select()->count();
        return view('admins.index', compact('foodCount','adminCount','BookingCount'));
    }
    //Admin
    public function allAdmins(){
        $admins=Admin::select()->orderBy('id','desc')->get();
        return view('admins.alladmins', compact('admins'));
    }


    public function createAdmins(){

        return view('admins.createadmins');
    }

    public function storeAdmins(Request $request){
        $request->validate([
            'name'=>'required| string|max:255',
            'email'=>'required|email|unique:admins,email',
            'password'=>'required|min:2',
        ]);
        $admin=Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        if($admin){
            return redirect()->route('admins.all')->with('success', 'Admin created successfully');
        }
    }
    //Bookings
     public function allBookings(){
        $bookings=Booking::select()->orderBy('id','desc')->get();
        return view('admins.allbookings', compact('bookings'));
    }

     public function editBookings($id){
        $booking=Booking::find($id);
        return view('admins.editbookings', compact('booking'));
    }
    //Update bookings
    public function updateBookings(Request $request,$id){
        $booking=Booking::find($id);
        // dd($request->status);
        $booking->update(["status" => $request->status]);
        // dd($booking->status);
        if($booking){
            return redirect()->route('bookings.all')->with('success', 'Booking status updated successfully');
        }
    }
    //delete bookings
    public function deleteBookings($id){
        $booking=Booking::find($id);
        $booking->delete();
        return redirect()->back()->with('delete', 'Booking deleted successfully');
    }

    //foods
     public function allFoods(){
        $foods=Food::select()->orderBy('id','desc')->get();
        return view('admins.allfoods', compact('foods'));
    }


    public function createFood(){
        return view('admins.createfoods');
    }



    public function storeFood(Request $request){

$destinationPath = 'asset/img/';
$myimage=$request->image->getClientOriginalName();
$request->image->move(public_path($destinationPath), $myimage);

        $foods=Food::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'category'=>$request->category,
            'image'=>$myimage
        ]);
        if($foods){
            return redirect()->route('all.foods')->with('success', 'Food Item created successfully');
        }
    }

    public function deleteFood($id){
        $food=Food::find($id);
        $food->delete();
        return redirect()->back()->with('delete', 'Food Item deleted successfully');
    }

}
