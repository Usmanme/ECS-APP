@extends('layouts.auth-master')

@section('content')
    <form method="post" action="{{ route('login.perform') }}" class="login-form">

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <p>Enter your email and password to Login</p>

        @include('layouts.partials.messages')

        <div class="form-group mb-3">
            <label class="floatingName login_form_label">Email</label>
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username"
                required="required" autofocus>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-group mb-3">
            <label class="floatingPassword login_form_label">Password</label>
            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password"
                required="required">
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <button class="w-100 btn btn-lg btn-primary login_btn" type="submit">Login</button>
    </form>
@endsection
