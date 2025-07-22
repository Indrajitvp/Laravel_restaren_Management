<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food\Food;
use App\Models\Food\review;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breakfastFoods=Food::select()->take(4)->where('category','Breakfast')->orderBy('id','desc')->get();

        $launchFoods=Food::select()->take(4)->where('category','launch')->orderBy('id','desc')->get();

        $dinnerFoods=Food::select()->take(4)->where('category','dinner')->orderBy('id','desc')->get();


        $Reviews=review::select()->take(4)->orderBy('id','desc')->get();

        return view('home',compact('breakfastFoods','launchFoods','dinnerFoods','Reviews'));

    }
    public function about()
    {
        return view('pages.about');
    }
    public function services()
    {
        return view('pages.services');
    }
    public function contact()
    {
        return view('pages.contact');
    }
}
