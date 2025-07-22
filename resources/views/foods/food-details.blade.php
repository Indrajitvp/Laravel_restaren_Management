@extends('layouts.app')

@section('content')

<div class=" py-5 bg-dark hero-header mb-5" style="height: 75vh">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('food.display.cart') }}">Cart</a></li>
            </ol>
        </nav>
    </div>
</div>

<div class="container mb-4">
    @if (Session::has('success'))
    <div class="alert alert-success text-center py-3 px-4 rounded" style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
        {{ Session::get('success') }}
    </div>
    @endif
</div>
     <!-- Service Start -->
     <div class=" py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-6">
                    <div class="row g-3">
                        <div class="col-12 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{asset('asset/img/'.$foodItem->image)}}">
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <h1 class="mb-4">{{$foodItem->name}}</h1>
                    <p class="mb-4">{{$foodItem->description}}</p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                <h3>{{$foodItem->price}}</h3>
                            </div>
                        </div>

                    </div>
                    @if(Auth::user())
                    <form action="{{route('food.cart',$foodItem->id)}}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input type="hidden" name="food_id" value="{{$foodItem->id}}">
                        <input type="hidden" name="name" value="{{$foodItem->name}}">
                        <input type="hidden" name="image" value="{{$foodItem->image}}">
                        <input type="hidden" name="price" value="{{$foodItem->price}}">
                        @if($cartVerifing>0)
                        <button type="button" class="btn py-3 px-5 mt-2" disabled style="background-color: #6c757d; color: white; border-radius: 25px; cursor: not-allowed;">
                            <i class="fas fa-check-circle me-2"></i> Added to the Cart
                        </button>
                        @else
                        <button type="submit" name="submit" class="btn py-3 px-5 mt-2" style="background-color: #0d6efd; color: white; border-radius: 25px;">Add to Cart</button>
                        @endif
                    </form>
                    @else
                        <div class="text-center py-3 px-4 rounded" style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 25px;">
                            <p class="mb-0">Please <a href="{{ route('login') }}" class="text-decoration-none" style="color: #0d6efd; font-weight: bold;">Login</a> to add this item to your cart.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
