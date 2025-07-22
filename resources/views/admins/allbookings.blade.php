@extends('layouts.admin')
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
@endif
@if (session('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('delete') }}
    </div>
@endif
<div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Bookings</h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    {{-- <th scope="col">email</th> --}}
                    <th scope="col">date_booking</th>
                    <th scope="col">num_people</th>
                    <th scope="col">special_request</th>
                    <th scope="col">status</th>
                    <th scope="col">change status</th>
                    <th scope="col">created_at</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($bookings as $booking) )
                    <tr>
                    <th scope="row">{{$booking->id}}</th>
                    <td>{{$booking->name}}</td>
                    {{-- <td>{{$booking->email}}</td> --}}
                    <td>{{$booking->date}}</td>
                    <td>{{$booking->num_people}}</td>
                    <td>{{$booking->spe_request}}</td>
                    <td>{{$booking->status}}</td>
                    <td><a href="{{route('bookings.edit',$booking->id)}}" class="btn btn-warning text-white  text-center ">change status</a></td>
                    <td>{{$booking->created_at}}</td>
                    <td><a href="{{route('bookings.delete',$booking->id)}}" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>



  </div>
@endsection
