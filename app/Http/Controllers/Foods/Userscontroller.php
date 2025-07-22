<?php

namespace App\Http\Controllers\Foods;

use App\Http\Controllers\Controller;
use App\Models\Food\Booking;
use App\Models\Food\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Userscontroller extends Controller
{
    public function getBookings(){
        $allBookings=Booking::where('user_id', Auth::user()->id)->get();
        return view('users.bookings',compact('allBookings'));
    }


    public function viewReview(){
        return view('users.writereview');
    }
    //Submitting review
    public function submitReview(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'review' => 'required|max:255',
        ]);
        $review = review::create($request->all());
        if ($review) {
            return redirect()->route('users.review.store')->with(['success' => 'Thank You for sharing your review']);
        }
        return back()->withErrors($request->errors())->withInput();
    }
}
