@extends('layouts.app')

@section('content')


<div class="py-5 bg-dark hero-header mb-5">
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

@if (Session::has('success'))
    <div class="alert alert-danger text-center py-3" style="font-size: 1.5rem; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        {{ Session::get('success') }}
    </div>
    @endif

        <!-- Service Start -->
        <div class="container">

            <div class="col-md-12">
                <table class="table">

                        @if ($cartItems->count()>0)
                        <thead>
                            <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Delete</th>
                            </tr>
                        </thead>
                         @foreach ($cartItems as $items)
                            <tbody>
                            <tr>
                            <th><img src="{{asset('/asset/img/'.$items->image)}}" alt="" style="width: 60px; height: 60px;"></th>
                            <td>{{$items->name}}</td>
                            <td>{{$items->price}}</td>
                            <td><a class="btn btn-danger text-white" href="{{Route('food.delete.cart',$items->id)}}">delete</a></td>
                            </tr>
                         @endforeach
                        @else
                            <h3 class="alert alert-danger text-center py-3" style="font-size: 1.5rem; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">No items in the cart</h3>
                        @endif

                      {{-- <tr>
                        <th>image</th>
                        <td>Pizza</td>
                        <td>$10</td>
                        <td><a class="btn btn-danger text-white">delete</td>
                      </tr> --}}

                    </tbody>
                  </table>
                  <div class="position-relative mx-auto mb-5" style="max-width: 400px; padding-left: 679px;">
                    <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: ${{$price}}</p>
                    @if ($price!=0)
                    <button type="button" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                    @endif

                </div>
            </div>
        </div>
    <!-- Service End -->
@endsection
