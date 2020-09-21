@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Archiwum sprzedarzy</h1>
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
                                    <th>Kupujący</th>
                                    <th>Łączna wartość</th>
                                    <th>Data</th>
                                    <th>PDF</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->id }}</td>
                                        <td>{{ $sale->invoice }}</td>
                                        <td>{{ $sale->buyer_name }}</td>
                                        <td>{{ $sale->cost }}</td>
                                        <td>{{ $sale->created_at->format('d-m-Y / H:i') }}</td>
                                        <td>
                                            <a href="{{ route('sale-pdf', $sale->id) }}" target="_blank">
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
