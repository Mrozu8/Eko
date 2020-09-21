@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Zamówienie</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">


                <p class="mb-4">Some text goes here :) </p>

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
                                    <th>Numer zam</th>
                                    <th>Data</th>
                                    <th>Użytkownik</th>
                                    <th>Przeznaczenie</th>
                                    <th>Status</th>
                                    <th>Edycja</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at->format('d-m-Y / H:i') }}</td>
                                        <td>{{ $order->worker }}</td>
                                        <td>{{ $order->order_type }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>
                                            <a href="{{ route('order-single', $order->id) }}">
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
