@extends('layouts.app')

@section('content')

<div class="">
    <div class="col-md-12 bg-dark">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>
            <h1 class="text-white mb-4">Register for a new user</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3" style="max-width: 600px;">
                    <div class="form-floating">
                        <input id="name" type="text"
                               class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}"
                               required autocomplete="name" autofocus placeholder="Name">
                        <label for="name">Name</label>
                        @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3" style="max-width: 600px;">
                    <div class="form-floating">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}"
                               required autocomplete="email" placeholder="Email">
                        <label for="email">Your Email</label>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3" style="max-width: 600px;">
                    <div class="form-floating">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" required autocomplete="new-password" placeholder="Password">
                        <label for="password">Password</label>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-4" style="max-width: 600px;">
                    <div class="form-floating">
                        <input id="password-confirm" type="password"
                               class="form-control"
                               name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        <label for="password-confirm">Confirm Password</label>
                    </div>
                </div>

                <div class="mb-3" style="max-width: 200px;">
                    <button class="btn btn-primary w-100 py-2" type="submit" name="submit">
                        Register
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
