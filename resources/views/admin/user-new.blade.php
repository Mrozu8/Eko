@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 offset-1">
            <h1 class="h3 mb-0 text-gray-800">Dodaj pracownika</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12 offset-1">
                <form method="post" action="{{ route('user-create') }}">
                    @csrf
                    <fieldset>
                        <div class="form-group col-md-4">
                            <label for="name">Imię</label>
                            <input type="text" class="outline form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Imię">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="surname">Nazwisko</label>
                            <input type="text" class="outline form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Nazwisko">
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="login">Login</label>
                            <input type="text" class="outline form-control @error('login') is-invalid @enderror" id="login" name="login" placeholder="Login">
                            @error('login')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="workplace">Miejsce pracy</label>
                            <select class="outline form-control @error('workplace') is-invalid @enderror" id="workplace" name="workplace">
                                <option value="1">Przemyśl</option>
                                <option value="2">Jarosłae</option>
                            </select>
                            @error('workplace')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="role">Rodzaj konta</label>
                            <select class="outline form-control @error('role') is-invalid @enderror" id="role" name="role">
                                <option value="1">Admin</option>
                                <option value="2">Księgowy</option>
                                <option value="3">Pracownik biurowy</option>
                                <option value="4">Technik</option>
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="password">Hasło</label>
                            <input type="password" class="outline form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="******">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary shadow-btn">Dodaj</button>
                        </div>

                    </fieldset>
                </form>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- Content Row -->
    </div>


@endsection
