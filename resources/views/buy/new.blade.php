@extends('layouts.main')
@section('content')


    <div class="container-fluid">
        <div class="head">
            <h2>Zakup</h2>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form class="" method="post" action="{{ route('buy-store') }}" data-validate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Nr faktury</label>
                            <input type="text" name="invoice" class="form-control outline" id="invoice"  >
                            <div class="validate-info hide-block" id="invoice_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xl-2">
                            <label for="nip">NIP</label>
                            <input id="nip" name="nip" type="text" placeholder="xx xx xx xx xx" class="outline form-control"  required>
                            <div class="validate-info hide-block" id="nip_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Imię Nazwisko / Nazwa firmy</label>
                            <input type="text" name="dealer_name" class="form-control outline" id="dealer_name" required>
                            <div class="validate-info hide-block" id="dealer_name_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Adres</label>
                            <input type="text" name="address" class="form-control outline" id="address" required>
                            <div class="validate-info hide-block" id="address_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                    </div>

                    <div class="" data-buy-form>
                        <div class="list-item" data-buy-list>
                            <div class="row-group" data-id="1">
                                <div class="form-row space-top--p-big" >
                                    <div class="form-group col-xl-1">
                                        <label for="inputEmail4">Kod</label>
                                        <input id="Kod" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control" required>
                                    </div>
                                    <div class="form-group col-xl-3">
                                        <label for="inputEmail4">Nazwa Produktu</label>
                                        <input id="inputEmail4" name="name[]" type="text" placeholder="xxx xxx" class="outline form-control" required>
                                    </div>
                                    <div class="form-group col-xl-2">
                                        <label for="inputEmail4">Producent</label>
                                        <select id="inputEmail4" name="supplier[]" class="outline form-control" required>
                                            <option value="Bosh">Bosh</option>
                                            <option value="Amica">Amica</option>
                                            <option value="ITD">ITD</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-xl-1" data-buy-quantity>
                                        <label for="inputEmail4">Łączna ilość</label>
                                        <input id="inputEmail4" name="quantity[]" type="number" min="0" placeholder="xx" class="outline form-control quantity"  required>
                                    </div>
                                    <div class="form-group col-xl-2">
                                        <label for="inputEmail4">Przemyśl</label>
                                        <input id="inputEmail4" name="warehouse[1][]" type="number" min="0" placeholder="Magazyn" class="outline form-control" >
                                    </div>
                                    <div class="form-group col-xl-2">
                                        <label for="inputEmail4">Jarosław</label>
                                        <input id="inputEmail4" name="warehouse[2][]" type="number" min="0" placeholder="Magazyn" class="outline form-control" >
                                    </div>

                                    <h2>{!! session()->get('error') !!}</h2>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-xl-2" data-buy-price>
                                        <label for="inputEmail4"></label>
                                        <input id="inputEmail4" name="unit_price[]" type="number" min="0" step="0.01" placeholder="Cena za sztukę" class="outline form-control unit-price"  required>
                                    </div>
                                    <div class="form-group col-xl-2 offset-5" data-brutto>
                                        <label for="inputEmail4"></label>
                                        <input id="brutto" name="price_net" type="text" placeholder="Brutto" class="outline form-control input-md tax" readonly>
                                    </div>
                                    <div class="form-group col-xl-2" data-sum-item>
                                        <label for="inputEmail4"></label>
                                        <input id="all" name="" type="text" placeholder="Razem" class="outline form-control input-md tax-all" readonly>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="validate-info hide-block" id="array_valid">
                            <p>Proszę wypełnić wszystkie pola</p>
                        </div>
                        <div class="validate-info hide-block" id="array_valid_warehouse">
                            <p>Podana ilość produktu nie jest prawidłowo przypisana do magazyznów, łączna ilość produktu musi być równa z ilością przypisaną do magazynów.</p>
                        </div>

                        <div class="form-group space-top--p-mid" >
                            <button type="button" class="btn btn-primary icon-btn" id="add-buy-item">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>


                    <div class="form-group col-xl-3 offset-4">
                        <label for="inputAddress">Łącznie brutto</label>
                        <input type="text" name="total_price" class="form-control outline" id="inputAddress" placeholder="xxxx" readonly data-total-price>
                    </div>

                    <div class="form-group col-xl-12">
                        <label for="inputAddress">Notatka</label>
                        <textarea class="form-control outline" id="notatki" name="note"></textarea>
                    </div>

                    <div class="form-group space-top--p-mid">
                        <button type="submit" class="btn btn-primary shadow-btn">Zatwierdź</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/buy.js') }}"></script>


@endsection
