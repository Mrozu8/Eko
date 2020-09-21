@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card margin-top--mid" >

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="login" >{{ __('Login') }}</label>
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror outline" name="login" value="{{ old('login') }}" required autocomplete="login">

                            @error('login')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name" >{{ __('Name') }}</label>
                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror outline" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="surname" >{{ __('Surname') }}</label>
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror outline" name="surname" value="{{ old('surname') }}" required autocomplete="surname">

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" >{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror outline" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-primary shadow-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
