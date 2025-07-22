@extends('layouts.app')

@section('content')


<div class="py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">My Bookings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('food.display.cart') }}">Cart</a></li>
            </ol>
        </nav>
    </div>
</div>


<div class="container" style="height: 40vh">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover text-center" style="border-collapse: collapse; background-color: #f9f9f9; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">
            @if ($allBookings->count() > 0)
                <thead class="thead-dark" style="background-color: #343a40; color: #fff;">
                    <tr>
                        <th scope="col" style="padding: 15px;">Name</th>
                        <th scope="col" style="padding: 15px;">Email</th>
                        <th scope="col" style="padding: 15px;">No of People</th>
                        <th scope="col" style="padding: 15px;">Date</th>
                        <th scope="col" style="padding: 15px;">Status</th>
                        <th scope="col" style="padding: 15px;">Review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allBookings as $bookings)
                        <tr style="border-bottom: 1px solid #ddd;">
                            <td style="padding: 15px;">{{ $bookings->name }}</td>
                            <td style="padding: 15px;">{{ $bookings->email }}</td>
                            <td style="padding: 15px;">{{ $bookings->num_people }}</td>
                            <td style="padding: 15px;">{{ $bookings->date }}</td>
                            <td style="padding: 15px;">{{ $bookings->status }}</td>
                            @if($bookings->status == 'Booked')
                                <td style="padding: 15px;"><a href="{{route('users.review.create')}}" class="btn btn-success" style="padding: 10px 20px; font-size: 0.9rem;">Review</a></td>
                            @else
                                <td style="padding: 15px; color: #999;">Unavailable</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            @else
                <h3 class="alert alert-danger text-center py-3" style="font-size: 1.5rem; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 5px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
                    No bookings
                </h3>
            @endif
        </table>
    </div>
</div>
@endsection
