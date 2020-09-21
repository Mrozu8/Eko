@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Archiwum kupionych częśći</h1>
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
                                    <th>Faktura</th>
                                    <th>Łączna wartość</th>
                                    <th>Data</th>
                                    <th>PDF</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($buys as $buy)
                                    <tr>
                                        <td>{{ $buy->id }}</td>
                                        <td>{{ $buy->invoice }}</td>
                                        <td>{{ $buy->cost }}</td>
                                        <td>{{ $buy->created_at->format('d-m-Y / H:i') }}</td>
                                        <td>
                                            <a href="{{ route('buy-pdf', $buy->id) }}" target="_blank">
                                                <button class="btn btn-primary shadow-btn">Podgląd</button>
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
