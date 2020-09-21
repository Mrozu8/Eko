@extends('layouts.main')
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Magazyn</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <form action="{{ route('warehouse-list') }}" method="get">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-xl-3">
                            <label for="inputEmail4">Nazwa / producent / kod: </label>
                            <input id="Kod" name="search" type="text" placeholder="xxxxxx" class="outline form-control" value="@php if(isset($_GET['search'])) echo $_GET['search']; @endphp">
                        </div>
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Producent: </label>
                            <select id="inputEmail4" name="supplier" class="outline form-control">
                                <option value="Bosh" @if((isset($_GET['supplier']) && $_GET['supplier'] == 'Bosh')) selected @endif>Bosh</option>
                                <option value="Amica" @if((isset($_GET['supplier']) && $_GET['supplier'] == 'Amica')) selected @endif>Amica</option>
                                <option value="ITD">ITD</option>
                            </select>
                        </div>
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Magazyn: </label>
                            <select id="inputEmail4" name="warehouse" class="outline form-control">
                                <option value="2" @if((isset($_GET['warehouse']) && $_GET['warehouse'] == 2)) selected @endif>Jarosław</option>
                                <option value="1" @if((isset($_GET['warehouse']) && $_GET['warehouse'] == 1)) selected @endif>Przemyśl</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <button class="btn btn-primary shadow-btn">
                                Szukaj
                            </button>
                    </div>
                </form>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Szukaj części</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kod</th>
                                    <th>Kod Serwisu</th>
                                    <th>Nazwa</th>
                                    <th>Producent</th>
                                    <th>Dostępność</th>
                                    <th>Podgląd</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($items as $item)
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $item->code }}</td>
                                       <td>{{ $item->service_code }}</td>
                                       <td>{{ $item->name }}</td>
                                       <td>{{ $item->supplier }}</td>
                                       <td>
                                               {{ $item->quantity }}
                                       </td>
                                       <td>
                                           <a href="{{ route('warehouse-single', $item->code) }}"><button class="btn btn-primary shadow-btn">Podgląd</button></a>
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


    <script>

    </script>


@endsection
