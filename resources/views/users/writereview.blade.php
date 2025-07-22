@extends('layouts.app')

 @section('content')

<div class=" py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Review</h1>
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Review</a></li>
                </ol>
            </nav>
            </div>
</div>

@if (Session::has('success'))
    <div class="alert alert-success text-center py-3 px-4 rounded shadow-lg" style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; font-size: 1.2rem; font-weight: bold;">
        <i class="fas fa-check-circle me-2"></i> {{ Session::get('success') }}
    </div>
@endif


  <div class="container py-5">
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Write Review</h5>
                        <h1 class="text-white mb-4">Write Review</h1>
                        <form class="col-md-12" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" name="name" value="{{ old('name', Auth::user()->name) }}">
                                        <label for="name">Your Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('review') is-invalid @enderror" name="review" placeholder="Review" id="message" style="height: 100px">{{ old('review') }}</textarea>
                                        <label for="message">Review</label>
                                        @error('review')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
@endsection
