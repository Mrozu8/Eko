@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Archiwum wykonanych napraw</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        {{--<h6 class="m-0 font-weight-bold text-primary">Tabela</h6>--}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Numer naprawy</th>
                                    <th>Klient</th>
                                    <th>Telefon</th>
                                    <th>Data naprawy</th>
                                    <th>PDF</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($repairs as $repair)
                                    <tr>
                                        <td>{{ $repair->id }}</td>
                                        <td>{{ $repair->repair_number }}</td>
                                        <td>{{ $repair->phone_one }}</td>
                                        <td>{{ $repair->customer }}</td>
                                        <td>{{ $repair->repair_date }}</td>
                                        <td>
                                            <a href="{{ route('repair-pdf', $repair->id) }}" target="_blank">
                                                <button class="btn btn-primary shadow-btn">PDF</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--TODO:: paginate--}}
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>


@endsection
