@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Aktualne zlecenia</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Tabela</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Kod</th>
                                    <th>Data dodania</th>
                                    <th>Data wizyty</th>
                                    <th>Adres</th>
                                    <th>Producent</th>
                                    <th>Opis usterki</th>
                                    <th>Podgląd</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($repairs as $repair)
                                    <tr>
                                        <td>{{ $repair->repair_number }}</td>
                                        <td>{{ $repair->created_at }}</td>
                                        <td>{{ $repair->repair_date }}</td>
                                        <td>{{ $repair->address }}</td>
                                        <td>{{ $repair->supplier }}</td>
                                        <td>{{ str_limiter($repair->damage_note, 70) }}</td>
                                        <td>
                                            <a href="{{ route('repair-single', $repair->id) }}">
                                                <button class="btn btn-primary shadow-btn">
                                                    Podgląd
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>


@endsection
