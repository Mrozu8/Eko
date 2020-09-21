@extends('layouts.main')
@section('content')

<div class="container-fluid">
    <div class="head">
        <h2>Sprzedaż</h2>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <form class="" method="post" action="{{ route('seal-store') }}" data-validate>
                @csrf
                <div class="form-row">
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Nr faktury</label>
                        <input type="text" name="invoice" class="form-control outline" id="inputEmail4" value="{{ $invoice }}" readonly>
                    </div>
                    <div class="form-group col-xl-2">
                        <p>Dla firmy</p>
                        <input type="checkbox" id="switch" />
                        <label class="switch-js" for="switch"></label>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-xl-2">
                        <label for="inputEmail4">Imię Nazwisko / Nazwa firmy</label>
                        <input type="text" name="buyer_name" class="form-control outline" id="buyer_name" required>
                        <div class="validate-info hide-block" id="buyer_name_valid">
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
                    <div class="form-group col-xl-2 hide-block" id="nip-show">
                        <label for="hide">NIP</label>
                        <input id="hide" name="nip" type="text" placeholder="xx xx xx xx xx" class="outline form-control" >
                    </div>
                </div>

                <div data-sales-form>
                    <div class="list-item" data-list>
                        <div class="form-row" data-id="1">
                           <div class="form-group col-xl-1">
                               <label for="inputEmail4">Kod</label>
                               <input id="code" name="code[]" type="text" placeholder="xx-xx-xx" class="outline form-control" data-code required>
                           </div>
                            <div class="form-group col-xl-3">
                                <label for="inputEmail4">Nazwa Produktu</label>
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

                <div class="form-group col-xl-3 offset-4">
                    <label for="inputAddress">Łącznie brutto</label>
                    <input data-total-price type="text" class="form-control outline" name="total_cost" id="inputAddress" placeholder="xxxx" readonly>
                </div>

                <div class="form-group col-xl-12">
                    <label for="inputAddress">Notatka</label>
                    <textarea class="form-control outline" id="notatki" name="note"></textarea>
                </div>

                <div class="form-group space-top--p-mid" >
                    <button type="submit" class="btn btn-primary shadow-btn" id="ajaxSubmit">Zatwierdź</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('js/sale.js') }}"></script>

<script>
    $(document).ready(function (){
        $('#ajaxSubmit').click(function (e){

            let formData = new FormData(document.querySelector('[data-validate]'));
            let error = 0;
            let errorArray = 0;

            if (formData.getAll('buyer_name')[0] === null || formData.getAll('buyer_name')[0] === "") {
                let validate = document.querySelector('#buyer_name');
                let info = document.querySelector('#buyer_name_valid');
                validate.classList.remove('outline');
                validate.classList.add('outline-validate');
                info.classList.remove('hide-block');
                info.classList.add('show-block');
                error = 1;
            }
            else {
                let validate = document.querySelector('#buyer_name');
                let info = document.querySelector('#buyer_name_valid');
                validate.classList.add('outline');
                validate.classList.remove('outline-validate');
                info.classList.add('hide-block');
                info.classList.remove('show-block');
            }

            if (formData.getAll('address')[0] === null || formData.getAll('address')[0] === "") {
                let validate = document.querySelector('#address');
                let info = document.querySelector('#address_valid');
                validate.classList.remove('outline');
                validate.classList.add('outline-validate');
                info.classList.remove('hide-block');
                info.classList.add('show-block');
                error = 1;
            }
            else {
                let validate = document.querySelector('#address');
                let info = document.querySelector('#address_valid');
                validate.classList.add('outline');
                validate.classList.remove('outline-validate');
                info.classList.add('hide-block');
                info.classList.remove('show-block');
            }


            formData.getAll('code[]').forEach(validArray);
            formData.getAll('name[]').forEach(validArray);
            formData.getAll('quantity[]').forEach(validArray);
            formData.getAll('price[]').forEach(validArray);


            function validArray(val) {
                let info = document.querySelector('#array_valid');

                if (val === "" || val === null) {
                    info.classList.remove('hide-block');
                    info.classList.add('show-block');
                    errorArray = 1;
                }

                if (errorArray === 0) {
                    info.classList.add('hide-block');
                    info.classList.remove('show-block');
                }
            }

            formData.getAll('quantity[]').forEach(quantityValid);

            function quantityValid(val) {
                let info = document.querySelector('#array_valid');

                if (parseInt(val) <= 0) {
                    info.classList.remove('hide-block');
                    info.classList.add('show-block');
                    errorArray = 1;
                }
            }

            if (error === 1 || errorArray === 1) {
                event.preventDefault();
                return false;
            }

            // ==================== warehouse validate =========

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#warehouse_valid_qt').hide();
            $('#warehouse_item_list').empty();

            let code = [];
            let qty = [];

            $('[data-code]').each(function (index, val) {
                code[index] = val.value;
            });

            $('[data-qty]').each(function (index, val) {
                qty[index] = val.value;
            });

            $.ajax({
                url: "{{ url('/sale/new-sale/item-exists') }}",
                method: 'post',
                async: false,
                data: {
                    code: code,
                    quantity: qty
                },
                success: function(result){
                    if (result.success.length !== 0) {
                        e.preventDefault();

                        $('#warehouse_valid_qt').show();
                        for (let i=0; i<result.success.length; i++) {
                            let li = document.createElement( "li" );
                            li.textContent = result.success[i];
                            $('#warehouse_item_list').append(li);
                        }
                    }
                    else {
                        $('#ajaxSubmit').submit();
                    }
                }});
        });
    });


</script>


@endsection

