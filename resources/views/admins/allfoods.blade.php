@extends('layouts.admin')
@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

    @endif
</div>
<div class="container">
    @if (session('delete'))
        <div class="alert alert-success">
            {{ session('delete') }}
        </div>

    @endif
</div>
 <div class="container-fluid">

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Foods</h5>
              <a  href="{{route('create.foods')}}" class="btn btn-primary mb-4 text-center float-right">Create Foods</a>

              <table class="table">
                <thead>
                  <tr>

                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr>
                            <td><img src="asset{{'/img/'.$food->image}}" alt=""  style="width: 60px; height: 60px;border-radius: 50%; object-fit: cover;"></td>
                            <td>{{$food->name}}</td>
                            <td>{{$food->price}}</td>
                            <td><a href="{{route('delete.foods',$food->id)}}" class="btn btn-danger  text-center ">delete</a></td>
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
