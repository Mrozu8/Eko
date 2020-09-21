@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 offset-1">
            <h1 class="h3 mb-0 text-gray-800">Podstawowe dane do faktury</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12 offset-1">
                <form method="post" action="{{ route('invoice-edit') }}">
                    @csrf
                    <fieldset>
                        <div class="form-group col-md-4">
                            <label for="nip">Nip</label>
                            <input type="text" class="outline form-control @error('nip') is-invalid @enderror" id="nip" name="nip" placeholder="xxx" value="{{ $invoice->nip }}">
                            @error('nip')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="name">Nazwa firmy</label>
                            <input type="text" class="outline form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="xxxx" value="{{ $invoice->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="login">Adres</label>
                            <input type="text" class="outline form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="xxx-xxx" value="{{ $invoice->address }}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
