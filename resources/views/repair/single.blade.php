@extends('layouts.main')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="head">
                <h3>Naprawa nr {{ $repair->repair_number }}</h3>
            </div>
            <a href="{{ route('repair-pdf', $repair->id) }}" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generuj PDF</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">

                    <div class="card-body">
                        <div class="row vertical-between">
                            <div class="col-md-3">
                                <p>Dodano przez:
                                    <span class="strong-text">
                                        {{ $repair->worker }}
                                    </span>
                                </p>
                            </div>
                            <div class="col-md-2">
                                <p>Data:
                                    <span class="strong-text">
                                        {{ $repair->created_at->format("d-m-Y / H:i") }}
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p>Dane klienta:</p>
                                <ul>
                                    <li>Klient:
                                        <span class="strong-text">
                                         {{ $repair->customer }}
                                    </span>
                                    </li>
                                    @if($repair->nip != null)
                                        <li>Nip:
                                            <span class="strong-text">
                                            {{ $repair->nip }}
                                        </span>
                                        </li>
                                    @endif
                                    <li>Adres:
                                        <span class="strong-text">
                                        {{ $repair->address }}
                                    </span>
                                    </li>
                                    <li>Telefon (1):
                                        <span class="strong-text">
                                        {{ $repair->phone_one }}
                                    </span>
                                    </li>
                                    <li>Telefon (2):
                                        <span class="strong-text">
                                        {{ $repair->phone_two }}
                                    </span>
                                    </li>

                                </ul>
                            </div>
                            <div class="col">
                                <p>Notatka:</p>
                                <p>{{ $repair->customer_note }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col">
                                <p>Informacje o naprawie:</p>
                                <ul>
                                    @if($repair->model != null)
                                        <li>Model:
                                            <span class="strong-text">
                                            {{ $repair->model }}
                                        </span>
                                        </li>
                                    @endif
                                    @if($repair->code_first != null)
                                        <li>Kod (1):
                                            <span class="strong-text">
                                            {{ $repair->code_first }}
                                        </span>
                                        </li>
                                    @endif
                                    @if($repair->code_second != null)
                                        <li>Kod (2):
                                            <span class="strong-text">
                                            {{ $repair->code_second }}
                                        </span>
                                        </li>
                                    @endif
                                    @if($repair->serial_number != null)
                                        <li>Numer seryjny:
                                            <span class="strong-text">
                                            {{ $repair->serial_number }}
                                        </span>
                                        </li>
                                    @endif
                                    <li>Producent:
                                        <span class="strong-text">
                                        {{ $repair->supplier }}
                                    </span>
                                    </li>
                                    <li>Gwarancja:
                                        <span class="strong-text">
                                        {{ $repair->warranty }}
                                    </span>
                                    </li>
                                    <li>Data sprzedaży:
                                        <span class="strong-text">
                                        {{ $repair->sale_date }}
                                    </span>
                                    </li>
                                    <li>Data zlecenia:
                                        <span class="strong-text">
                                        {{ $repair->repair_date }}
                                    </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col">
                               <div class="row">
                                   <div class="col-md-12">
                                       <p>Opis usterki:</p>
                                       <p>{{ $repair->damage_note }}</p>
                                   </div>
                                   <div class="col-md-12 space-top--p-mid">
                                       <p>Informacje dodatkowe:</p>
                                       <p>{{ $repair->other_note }}</p>
                                   </div>
                               </div>
                            </div>
                        </div>


                        <hr class="line-form">
                        <div class="row justify-content-between">
                            @if($repair->status == 1)
                                @if($repair->repair_order == null || sizeof($repair->repair_order) == 0)
                                    <div class="col-md-3">
                                        <form action="{{ route('repair-add-worker', $repair->id) }}" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <label for="">Przydziel technika do zlecenia: </label>
                                                <select class="outline form-control" name="worker">
                                                    @foreach($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }} {{$user->surname}}</option>
                                                    @endforeach
                                                </select>
                                                @if(session()->has('error'))
                                                    <div class="row space-top--p-mid">
                                                        <div class="col-xl-10">
                                                            <div class="alert alert-danger">
                                                                {{ session()->get('error') }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <button class="btn btn-success space-top--m-small shadow-btn" type="submit">Dodaj</button>
                                            </div>
                                        </form>
                                    </div>
                                    @else
                                    <div class="col-md-3">
                                        <p>To zlecenie wykonuje
                                            <span class="strong-text">{{ $repair->repair_order[0]->repair_worker->name }} {{ $repair->repair_order[0]->repair_worker->surname }}</span>
                                        </p>

                                    </div>
                                    @endif
                            @endif

                            @if($repair->status == 1)
                                    <div class="col-md-6">
                                        <div class="form-row">
                                            <div class="form-group col-xl-2">
                                                <p>Zmień status</p>
                                                <input type="checkbox" id="switch" />
                                                <label class="switch-js" for="switch"></label>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                        <hr class="line-form">
                        <div class="row hide-block" id="show-items">
                            <div class="col-md-12">
                                <form action="{{ route('repair-end', $repair->id) }}" method="post">
                                    @csrf
                                    <div data-repair-form>
                                        <div class="list-item" data-list>
                                            <div class="form-row" data-id="1">
                                                <div class="form-group col-xl-1">
                                                    <label for="inputEmail4">Kod</label>
                                                    <input id="code" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control" data-code required>
                                                </div>
                                                <div class="form-group col-xl-3">
                                                    <label for="inputEmail4">Nazwa części</label>
                                                    <input id="inputEmail4" name="name[]" type="text" placeholder="xxx xxx" class="outline form-control" required>
                                                </div>
                                                <div class="form-group col-xl-1" data-quantity>
                                                    <label for="inputEmail4">Ilość</label>
                                                    <input id="quantity" name="quantity[]" type="number" placeholder="xx" min="0"  class="outline form-control qt" data-qty  required>
                                                </div>
                                                <div class="form-group col-xl-2" data-price>
                                                    <label for="inputEmail4">Cena</label>
                                                    <input id="inputEmail4" name="unit_price[]" type="number" step="0.01" min="0" placeholder="Za sztukę" class="outline form-control unit-price"  required>
                                                </div>
                                                <div class="form-group col-xl-2" data-brutto>
                                                    <label for="inputEmail4">Brutto</label>
                                                    <input id="brutto" name="price_net" type="text" placeholder="Za sztukę" class="outline form-control input-md tax" readonly>
                                                </div>
                                                <div class="form-group col-xl-2" data-sum-item>
                                                    <label for="inputEmail4">Razem</label>
                                                    <input id="all" name="" type="text" placeholder="Łącznie brutto" class="outline form-control input-md tax-all" readonly>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="validate-info hide-block" id="array_valid">
                                            <p>Proszę wypełnić wszystkie pola</p>
                                        </div>
                                        <div class="validate-info hide-block" id="warehouse_valid_qt">
                                            <p>Przedmioty o kodzie:</p>
                                            <ul id="warehouse_item_list">

                                            </ul>
                                            <p>nie znajdują się w magazynie lub podana ilość jest nieprawidłowa.</p>
                                        </div>

                                        <div class="form-group space-top--p-mid" >
                                            <button type="button" class="btn btn-primary icon-btn" id="add-item">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-xl-3" >
                                            <label for="inputEmail4">Robocizna</label>
                                            <input type="number" step="0.01" min="0" name="cost" class="form-control outline" id="" required  data-cost>
                                            <div class="validate-info hide-block" id="buyer_name_valid">
                                                <p>To pole jest wymagane</p>
                                            </div>
                                        </div>
                                        <div class="form-group col-xl-3" >
                                            <label for="inputEmail4">Koszt dojazdu</label>
                                            <input type="number" step="0.01" min="0" name="delivery_cost" class="form-control outline" id="address" required  data-delivery-cost>
                                            <div class="validate-info hide-block" id="address_valid">
                                                <p>To pole jest wymagane</p>
                                            </div>
                                        </div>
                                        <div class="form-group col-xl-2 offset-3">
                                            <label for="inputAddress">Łącznie brutto</label>
                                            <input data-total-price type="text" class="form-control outline" name="total_cost" id="inputAddress" placeholder="xxxx" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group" >
                                        <label class="" for="radios-0"> Czy naprawa się powiodła:</label>

                                        <label class="" for="radios-1">
                                            <input type="radio" class="space-left--m-mid" name="success" id="radios-0" value="1" checked="checked">
                                            Tak
                                        </label>
                                        <label class="" for="radios-1">
                                            <input type="radio" class="space-left--m-small" name="success" id="radios-1" value="0">
                                            Nie
                                        </label>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-xl-11">
                                            <label for="inputAddress">Notatka: </label>
                                            <textarea class="form-control outline" id="damage_note" name="note_end"></textarea>
                                            <div class="validate-info hide-block" id="damage_note_valid">
                                                <p>To pole jest wymagane</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group space-top--p-mid" >
                                        <button type="submit" class="btn btn-primary shadow-btn" id="ajaxSubmit">Zakończ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                            <div class="col-md-12 space-top--p-mid">
                                <h4 class="strong-text">Naprawa zakończona  @if($repair->success == 1) powodzeniem @else niepowodzeniem @endif</h4>

                                <div class="row vertical-between space-top--m-small">
                                    <div class="col-md-3">
                                        <p>Wykonane przez:
                                            <span class="strong-text">
                                            {{ $repair->repair_order[0]->repair_worker->name }} {{ $repair->repair_order[0]->repair_worker->surname }}
                                    </span>
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <p>Data zakończenia w systemie:
                                            <span class="strong-text">
                                        {{ $repair->updated_at->format("d-m-Y / H:i") }}
                                    </span>
                                        </p>
                                    </div>
                                </div>

                                <h5 class="strong-text">Wykorzystane części:</h5>
                                <br>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">Kod</th>
                                        <th scope="col">Nazwa</th>
                                        <th scope="col">Ilość</th>
                                        <th scope="col">Cena</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($repair->items_repair as $item)
                                        <tr>
                                            <th scope="row">{{ $item->code }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->unit_price }} zł</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="row space-top--p-mid">
                                    <div class="col">
                                        <p>Koszty naprawy:</p>
                                        <ul>
                                            <li>Robocizna:
                                                <span class="strong-text">
                                                    {{ $repair->cost }}
                                                </span>
                                            </li>
                                            <li>Koszt dojazdu:
                                                <span class="strong-text">
                                                {{ $repair->delivery_cost }}
                                            </span>
                                            </li>
                                            <li>Łączny koszt Brutto:
                                                <span class="strong-text">
                                                    {{ $repair->total_cost }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <p>Notatka:</p>
                                        <p>{{ $repair->note_end }}</p>
                                    </div>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.querySelector('#switch').addEventListener('change', function (e) {
            if (this.checked == false) {
                document.querySelector('#show-items').classList.remove('show-block');
                document.querySelector('#show-items').classList.add('hide-block');
            }
            else {
                document.querySelector('#show-items').classList.remove('hide-block');
                document.querySelector('#show-items').classList.add('show-block');
            }
        });
    </script>


@endsection
