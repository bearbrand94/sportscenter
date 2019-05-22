@extends('layouts.app')

@section('content')
<section class="login py-5 border-top-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8 align-item-center">
                    <div class="border border">
                        <h3 class="bg-gray p-4">Register Now</h3>
                        <form method="POST" action="{{ route('register') }}">
                            <fieldset class="p-4">
                                @csrf
                                <input name="name" type="name" placeholder="Full Name*" class="border p-3 w-100 my-2" value="{{ old('name') }}" required autocomplete="name">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                                <input name="email" type="email" placeholder="Email*" class="border p-3 w-100 my-2" value="{{ old('email') }}" required autocomplete="email">
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                                <input name="password" type="password" placeholder="Password*" class="border p-3 w-100 my-2">
                                @if ($errors->has('password'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                                <input name="password_confirmation" type="password" placeholder="Confirm Password*" class="border p-3 w-100 my-2">
                                <div class="loggedin-forgot d-inline-flex my-3">
                                        <input type="checkbox" id="registering" class="mt-1">
                                        <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                </div>
                                <button type="submit" class="d-block py-3 px-4 bg-primary text-white border-0 rounded font-weight-bold">Register Now</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection