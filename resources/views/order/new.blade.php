@extends('layouts.main')
@section('content')

<div class="container-fluid">
    <div class="head">
        <h2>Nowe zamówienie</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="" method="post" action="{{ route('order-store') }}" data-validate>
                @csrf
                <div class="form-row">
                    <div class="form-group col-xl-3">
                        <label for="inputEmail4">Nr zamówienia:</label>
                        <input type="text" name="order_number" class="form-control outline" id="order_number" value="{{ $order_number }}" readonly>
                        <div class="validate-info hide-block" id="order_number_valid">
                            <p>To pole jest wymagane</p>
                        </div>
                    </div>
                    <div class="form-group col-xl-2">
                        <p>Dla klienta</p>
                        <input type="checkbox" id="switch-order" name="switch_order" />
                        <label class="switch-js" for="switch-order"></label>
                    </div>
                </div>

                <div class="form-row hide-block" id="order-show">
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Nip:</label>
                        <input id="inputEmail4" name="nip" type="text" placeholder="opcjonalnie" class="outline form-control">
                    </div>
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Imię Nazwisko / Firma:</label>
                        <input id="customer_name" name="customer_name" type="text" placeholder="xxx xxx"  class="outline form-control" >
                        <div class="validate-info hide-block" id="customer_name_valid">
                            <p>To pole jest wymagane</p>
                        </div>
                    </div>
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Adres:</label>
                        <input id="address" name="address" type="text" placeholder="xx-xxx" class="outline form-control" >
                        <div class="validate-info hide-block" id="address_valid">
                            <p>To pole jest wymagane</p>
                        </div>
                    </div>
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Telefon:</label>
                        <input id="phone" name="phone" type="text" placeholder="xxx-xxx-xxx" class="outline form-control">
                        <div class="validate-info hide-block" id="phone_valid">
                            <p>To pole jest wymagane</p>
                        </div>
                    </div>
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Cena proponowana:</label>
                        <input id="price" name="price" type="text" placeholder="xx zł" class="outline form-control">
                        <div class="validate-info hide-block" id="price_valid">
                            <p>To pole jest wymagane</p>
                        </div>
                    </div>
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Zaliczka: </label>
                        <input id="advance" name="advance" type="text" placeholder="xx zł" class="outline form-control" >
                        <div class="validate-info hide-block" id="advance_valid">
                            <p>To pole jest wymagane</p>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="inputAddress">Notatka</label>
                        <textarea class="form-control outline" id="notatki" name="customer_note" placeholder="Dodatkowy opis"></textarea>
                    </div>
                </div>

                <hr class="line-form">

                <div class="form-group space-top--p-big">
                        <label class="radio-inline" for="radios-0">
                            <input type="radio" name="order_type" id="radios-0" value="Magazyn" checked="checked">
                             - Magazyn
                        </label>

                        <label class="radio-inline space-left--m-mid" for="radios-1">
                            <input type="radio" name="order_type" id="radios-1" value="Ubezpieczenie">
                            - Ubezpieczenie
                        </label>

                        <label class="radio-inline space-left--m-mid" for="radios-2">
                            <input type="radio" name="order_type" id="radios-2" value="Gwarancja">
                             - Gwarancja
                        </label>

                        <label class="radio-inline space-left--m-mid" for="radios-3">
                            <input type="radio" name="order_type" id="radios-3" value="Naprawa odpłatna">
                             - Naprawa odpłatna
                        </label>
                </div>

                <div class="" data-order-form>
                    <div class="list-item" data-order-list>
                        <div class="form-row space-top--p-mid" data-id="1">
                            <div class="form-group col-xl-1">
                                <label for="inputEmail4">Kod:</label>
                                <input id="Kod" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control">
                            </div>
                            <div class="form-group col-xl-3">
                                <label for="inputEmail4">Nazwa Produktu:</label>
                                <input id="inputEmail4" name="name[]" type="text" placeholder="xxx xxx" class="outline form-control">
                            </div>
                            <div class="form-group col-xl-2">
                                <label for="supplier">Producent:</label>
                                <select id="supplier" name="supplier[]" class="outline form-control">
                                    <option value="Bosh">Bosh</option>
                                    <option value="Amica">Amica</option>
                                    <option value="ITD">ITD</option>
                                </select>
                            </div>
                            <div class="form-group col-xl-1" data-quantity>
                                <label for="inputEmail4">Ilość:</label>
                                <input id="inputEmail4" name="quantity[]" type="number" min="0" placeholder="xx"  class="outline form-control qt" >
                            </div>
                            <div class="form-group col-xl-2" data-price>
                                <label for="inputEmail4">Numer zlecenia:</label>
                                <input id="inputEmail4" name="order_item_number[]" type="text" placeholder="opcjonalnie" class="outline form-control" >
                            </div>
                            <div class="form-group col-xl-2">
                                <label for="inputEmail4">Notatka:</label>
                                <input id="inputEmail4" name="item_note[]" type="text" placeholder="opcjonalnie" class="outline form-control">
                            </div>

                        </div>
                    </div>

                    <div class="validate-info hide-block" id="array_valid">
                        <p>Proszę wypełnić wszystkie pola</p>
                    </div>

                    <div class="form-group space-top--p-mid" >
                        <button type="button" class="btn btn-primary icon-btn" id="add-order-item">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group col-xl-12 space-top--p-big">
                    <label for="inputAddress">Notatka</label>
                    <textarea class="form-control outline" id="notatki" name="order_note"></textarea>
                </div>


                <div class="form-group space-top--p-mid">
                    <button type="submit" class="btn btn-primary shadow-btn">Zatwierdź</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/order.js') }}"></script>

@endsection
