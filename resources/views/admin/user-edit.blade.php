@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 offset-1">
            <h1 class="h3 mb-0 text-gray-800">Edytuj dane pracownika</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12 offset-1">
                <form method="post" action="{{ route('user-update', $user->id) }}">
                    @csrf
                    <fieldset>
                        <div class="form-group col-md-4">
                            <label for="name">Imię</label>
                            <input type="text" class="outline form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Imię" value="{{ $user->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="surname">Nazwisko</label>
                            <input type="text" class="outline form-control @error('surname') is-invalid @enderror" id="surname" name="surname" placeholder="Nazwisko" value="{{ $user->surname }}">
                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="login">Login</label>
                            <input type="text" class="outline form-control @error('login') is-invalid @enderror" id="login" name="login" placeholder="Login" value="{{ $user->login }}">
                            @error('login')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="workplace">Miejsce pracy</label>
                            <select class="outline form-control @error('workplace') is-invalid @enderror" id="workplace" name="workplace">
                                <option value="1" @if($user->workplace == 1) selected @endif>Przemyśl</option>
                                <option value="2" @if($user->workplace == 2) selected @endif>Jarosław</option>
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
                                <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                                <option value="2" @if($user->role == 2) selected @endif>Księgowy</option>
                                <option value="2" @if($user->role == 3) selected @endif>Pracownik biurowy</option>
                                <option value="2" @if($user->role == 4) selected @endif>Technik</option>
                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="password">Nowe hasło (opcjonalnie) </label>
                            <input type="password" class="outline form-control" id="password" name="password" placeholder="******">
                        </div>
                        <div class="form-group col-md-4">
                            <button type="submit" class="btn btn-primary shadow-btn">Edytuj</button>
                        </div>

                    </fieldset>
                </form>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- Content Row -->
    </div>


@endsection
