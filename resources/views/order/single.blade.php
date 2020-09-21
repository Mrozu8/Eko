@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="head">
            <h3>Zamówienie nr {{ $order->order_number }}</h3>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Szczegółowe informacje</h6>
                    </div>
                    <div class="card-body">
                        <div class="row vertical-between">
                            <div class="col-md-3">
                                <p>Dodano przez:
                                    <span class="strong-text">
                                        {{ $order->worker }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>Data:
                                    <span class="strong-text">
                                        {{ $order->created_at->format("d-m-Y / H:i") }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Rodzaj zamówienia:
                                    <span class="strong-text">
                                        {{ $order->order_type }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        @if($order->order_type != 'Magazyn')
                            <div class="row">
                                <div class="col">
                                    <p>Dane klienta:</p>
                                    <ul>
                                        <li>Klient:
                                            <span class="strong-text">
                                             {{ $order->customer_name }}
                                        </span>
                                        </li>
                                        @if($order->nip != null)
                                            <li>Nip:
                                                <span class="strong-text">
                                                {{ $order->nip }}
                                            </span>
                                            </li>
                                        @endif
                                        <li>Adres:
                                            <span class="strong-text">
                                            {{ $order->address }}
                                        </span>
                                        </li>
                                        <li>Telefon:
                                            <span class="strong-text">
                                            {{ $order->phone }}
                                        </span>
                                        </li>
                                        <li>Proponowana cena:
                                            <span class="strong-text">
                                            {{ $order->price }} zł
                                        </span>
                                        </li>
                                        <li>Zaliczka:
                                            <span class="strong-text">
                                            {{ $order->advance }} zł
                                        </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <p>Notatka:</p>
                                    <p>{{ $order->customer_note }}</p>
                                </div>
                            </div>
                            @else
                            <div class="row">
                                <div class="col">
                                    <p class="strong-text">Zamówienie części na własne potrzeby</p>
                                </div>
                            </div>
                        @endif

                        <hr>

                        <div class="row space-top--p-mid">
                            <div class="col">
                                <h5 class="strong-text">Zamówione części:</h5>

                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Kod</th>
                                        <th scope="col">Nazwa</th>
                                        <th scope="col">Producent</th>
                                        <th scope="col">Ilość</th>
                                        <th scope="col">Nr zlecenia</th>
                                        <th scope="col">Notatka</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($order->item as $item)
                                            <tr>
                                                <th scope="row">{{ $item->code }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->supplier }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->order_item_number }}</td>
                                                <td>{{ $item->item_note }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if($order->order_note != null)
                            <hr>
                            <div class="row space-top--p-mid">
                                <div class="col">
                                    <h5 class="strong-text">Notatka do zamówienia: </h5>
                                    <p>{{ $order->order_note }}</p>
                                </div>
                            </div>
                        @endif

                        <hr class="line-form">
                        <form action="{{ route('change-status', $order->id) }}" method="post" class="space-top--p-mid">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="status" class="strong-text">Zmień status: </label>
                                    <select id="status" name="status" class="form-control outline">
                                        <option value="oczekujące" @if($order->status == 'oczekujące') selected @endif>oczekujące</option>
                                        <option value="zlecone" @if($order->status == 'zlecone') selected @endif>zlecone</option>
                                        <option value="wykonane" @if($order->status == 'wykonane') selected @endif>wykonane</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2 vertical-bottom space-left--m-mid">
                                    <button class="btn btn-primary shadow-btn" type="submit">Edytuj</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>


@endsection
