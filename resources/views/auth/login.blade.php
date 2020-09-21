@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card margin-top--mid">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="login">Login (admin)</label>
                            <input id="login" type="text" class="form-control @error('login') is-invalid @enderror outline" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus>
                            @error('login')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password (admin)</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror outline" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary shadow-btn">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
