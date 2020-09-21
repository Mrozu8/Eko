@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Podgląd produktu - {{ $items[0]->code }}</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Magazyn</h6>
                    </div>
                    <div class="card-body">
                            @foreach($items as $item)

                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 style="padding: 1em;">Dane towaru</h5>
                                    </div>
                                    <div class="col">
                                        <ul>
                                            <li>Nazwa:
                                                <span class="strong-text">
                                                    {{ $item->name }}
                                                </span>
                                            </li>
                                            <li>Kod serwisu:
                                                <span class="strong-text">
                                                    {{ $item->service_code }}
                                                </span>
                                            </li>
                                            <li>Producent:
                                                <span class="strong-text">
                                                    {{ $item->supplier }}
                                                </span>
                                            </li>
                                            <li>Ilość:
                                                <span class="strong-text">
                                                    {{ $item->quantity }}
                                                </span>
                                            </li>
                                            <li>Magazyn:
                                                <span class="strong-text">
                                                    {{ warehouse_changer($item->warehouse) }}
                                                </span>
                                            </li>
                                            <li>Cena jednostkowa netto:
                                                <span class="strong-text">
                                                    {{ $item->unit_price }} zł
                                                </span>
                                            </li>
                                            <li>Cena jednostkowa brutto:
                                                <span class="strong-text">
                                                    {{ $item->unit_price * 1.23 }} zł
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <p>Dane zamówienia:</p>
                                        <ul>
                                            <li>Nr faktury:
                                                <span class="strong-text">
                                                    {{ $item->warehouse_item->invoice }}
                                                </span>
                                            </li>
                                            <li>Zamówione przez:
                                                <span class="strong-text">
                                                    {{ $item->warehouse_item->worker }}
                                                </span>
                                            </li>
                                            <li>Data zamówienia:
                                                <span class="strong-text">
                                                    {{ $item->created_at->format("d-m-Y") }}
                                                </span>
                                            </li>
                                        </ul>
                                        <p>Notatka:</p>
                                        <p>{{ $item->warehouse_item->note }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <h5 style="padding: 1em;">Rezerwacje</h5>
                                        <div class="book">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Kto</th>
                                                    <th scope="col">Ilość</th>
                                                    <th scope="col">Kiedy</th>
                                                    <th scope="col">Zakończ</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($item->book_warehouse as $book)
                                                    <tr>
                                                        <th scope="row">{{ $book->book_user->name }} {{ $book->book_user->surname }}</th>
                                                        <td>{{ $book->quantity }}</td>
                                                        <td>{{ $book->created_at }}</td>
                                                        <td>
                                                            <form action="{{ route('warehouse-book-delete', $book->id) }}" method="post">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button class="btn btn-info shadow-btn" type="submit">Zakończ</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 style="padding: 1em;">Możliwości</h5>
                                    </div>
                                    <div class="col-xl-3">
                                        <form action="{{ route('warehouse-transfer', $item->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Przenieś do magazynu:</label>
                                                <select id="selectbasic" name="warehouse" class="form-control outline">
                                                    @if($item->warehouse == 1)
                                                        <option value="2">Jarosław</option>
                                                    @else
                                                        <option value="1">Przemyśl</option>
                                                    @endif
                                                </select>
                                            </div><div class="form-group">
                                                <label for="">Ilość:</label>
                                                <input type="text" name="quantity_transfer" placeholder="xx" class="form-control outline">
                                            </div>
                                            <button class="btn btn-primary shadow-btn" type="submit">Przenieś</button>
                                        </form>
                                    </div>
                                    <div class="col-xl-3 offset-1">
                                        <form action="{{ route('warehouse-book', $item->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Zarezerwuj część</label>
                                                <input type="text" name="quantity_book" placeholder="Podaj ilość" class="form-control outline">
                                            </div>
                                            <button class="btn btn-info shadow-btn" type="submit">Rezerwuj</button>
                                        </form>
                                    </div>
                                    <div class="col-xl-3 offset-1">
                                        <form action="{{ route('warehouse-delete', $item->id) }}" method="post">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <div class="form-group">
                                                <label for="">Usuń z magazynu</label>
                                                <input type="text" name="quantity_drop" placeholder="Podaj ilość" class="form-control outline">
                                            </div>
                                            <button class="btn btn-danger shadow-btn" type="submit">Usuń</button>
                                        </form>
                                    </div>
                                </div>
                            <hr class="line-form">

                        @endforeach
                    </div>
                </div>

            </div>



        </div>

    </div>


@endsection
