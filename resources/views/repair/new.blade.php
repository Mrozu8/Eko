 @extends('layouts.calendar')
 @section('content')

    <div class="container-fluid">
        <div class="head">
            <h2>Zlecenie</h2>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <form class="" method="post" action="{{ route('repair-create') }}" data-validate>
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-xl-3">
                            <label for="inputEmail4">Nr zamówienia</label>
                            <input type="text" name="repair_number" class="form-control outline" id="repair_number" value="{{ $repair_number }}" readonly>
                            <div class="validate-info hide-block" id="repair_number_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Nip: </label>
                            <input type="text" name="nip" class="form-control outline" id="inputEmail4" placeholder="xxx xxx xxx">
                        </div>
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Imię Nazwisko / Firma</label>
                            <input type="text" name="customer" class="form-control outline" id="customer" placeholder="xxx xxx">
                            <div class="validate-info hide-block" id="customer_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Adres</label>
                            <input type="text" name="address" class="form-control outline" id="address" placeholder="xx-xxx">
                            <div class="validate-info hide-block" id="address_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                        <div class="form-group col-xl-2">
                            <label for="hide">Telefon</label>
                            <input id="phone_one" name="phone_one" type="text" placeholder="xxx-xxx-xxx" class="outline form-control" >
                            <div class="validate-info hide-block" id="phone_one_valid">
                                <p>To pole jest wymagane</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xl-2">
                            <label for="inputEmail4">Telefon (2): </label>
                            <input type="text" name="phone_two" class="form-control outline" id="inputEmail4" placeholder="xxx-xxx-xxx">
                        </div>
                        <div class="form-group col-xl-6">
                            <label for="inputEmail4">Informacje dodatkowe: </label>
                            <input type="text" name="customer_note" class="form-control outline" id="inputEmail4">
                        </div>
                    </div>

                    <hr class="line-form">

                    <div class="list-item space-top--p-big">
                        <div class="form-row">
                            <div class="form-group">
                                <label class="radio-inline" for="radios-0"> Gwarancja:</label>
                                <input type="radio" class="space-left--m-mid" name="warranty" id="radios-0" value="TAK" checked="checked">
                                    Tak
                                <label class="radio-inline" for="radios-1">
                                    <input type="radio" class="space-left--m-small" name="warranty" id="radios-1" value="NIE">
                                    Nie
                                </label>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-xl-2">
                                <label for="inputEmail4">Model: </label>
                                <input id="Kod" name="model" type="text" placeholder="Typ / Model" class="outline form-control">
                            </div>
                            <div class="form-group col-xl-2">
                                <label for="inputEmail4">Kod 1:</label>
                                <input id="inputEmail4" name="code_first" type="text" placeholder="xx-xx" class="outline form-control">
                            </div>
                            <div class="form-group col-xl-2" data-quantity>
                                <label for="inputEmail4">Kod 2:</label>
                                <input id="inputEmail4" name="code_second" type="text" placeholder="xx-xx"  class="outline form-control" >
                            </div>
                            <div class="form-group col-xl-2" data-price>
                                <label for="inputEmail4">Nr seryjny: </label>
                                <input id="inputEmail4" name="serial_number" type="text" placeholder="xx/xxx" class="outline form-control" >
                            </div>
                            <div class="form-group col-xl-2">
                                <label for="inputEmail4">Producent: </label>
                                <select id="inputEmail4" name="supplier" class="outline form-control">
                                    <option value="Bosh">Bosh</option>
                                    <option value="Amica">Amica</option>
                                    <option value="ITD">ITD</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-xl-2">
                                <label for="inputEmail4">Data sprzedaży: </label>
                                <input id="inputEmail4" name="sale_date" type="date" class="outline form-control">
                            </div>
                            <div class="form-group col-xl-2">
                                <label for="inputEmail4">Data umówienia wizyty: </label>
                                <input id="repair_date" name="repair_date" type="date" class="outline form-control">
                                <div class="validate-info hide-block" id="repair_date_valid">
                                    <p>To pole jest wymagane</p>
                                </div>
                            </div>
                            <div class="form-group col-xl-6">
                                <label for="inputEmail4">Informacje dodatkowe:</label>
                                <input id="inputEmail4" name="other_note" type="text" placeholder="xx xx xx" class="outline form-control">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-xl-10">
                                <label for="inputAddress">Opis usterki: </label>
                                <textarea class="form-control outline" id="damage_note" name="damage_note"></textarea>
                                <div class="validate-info hide-block" id="damage_note_valid">
                                    <p>To pole jest wymagane</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="validate-info hide-block" id="date_valid">
                        <p id="valid_message"></p>
                    </div>


                    <div class="form-group space-top--p-mid">
                        <button type="submit" class="btn btn-primary shadow-btn" id="ajaxSubmit">Zatwierdź</button>
                    </div>
                </form>
            </div>
        </div>
        <hr class="line-form">
        <div class="row">


            <div class="col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="head">
                            <h2>Kalendarz</h2>
                        </div>

                        <div class="calendar">
                            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

                            <div id='calendar'></div>

                            {{--<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>--}}
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
                            <script>
                                $(document).ready(function() {
                                    // page is now ready, initialize the calendar...
                                    $('#calendar').fullCalendar({
                                        // put your options and callbacks here
                                        events : [
                                                @foreach($slots as $slot)
                                            {
                                                title : 'Możliwych napraw: {{ $slot->quantity }}',
                                                start : '{{ $slot->date }}',
                                                textColor: 'white',
                                                color: '#4e73df',
                                            },
                                                @endforeach

                                                @foreach($repairs as $task)
                                            {
                                                title : 'Rejon: {{ $task->address }}',
                                                start : '{{ $task->repair_date }}',
                                                url : '{{ route('repair-single', $task->id) }}',
                                                @if(sizeof($task->repair_order) == 0)
                                                color: '#d84da0',
                                                @else
                                                color: '#46c74c',
                                                @endif
                                            },
                                            @endforeach
                                        ],
                                    })
                                });
                            </script>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{--<script src="{{ asset('js/repair.js') }}"></script>--}}

    <script>
        $(document).ready(function (){
            $('#ajaxSubmit').click(function (e){

                    let formData = new FormData(document.querySelector('[data-validate]'));
                    let error = 0;

                    if (formData.getAll('repair_number')[0] === null || formData.getAll('repair_number')[0] === "") {
                        let validate = document.querySelector('#repair_number');
                        let info = document.querySelector('#repair_number_valid');
                        validate.classList.remove('outline');
                        validate.classList.add('outline-validate');
                        info.classList.remove('hide-block');
                        info.classList.add('show-block');
                        error = 1;
                    }
                    else {
                        let validate = document.querySelector('#repair_number');
                        let info = document.querySelector('#repair_number_valid');
                        validate.classList.add('outline');
                        validate.classList.remove('outline-validate');
                        info.classList.add('hide-block');
                        info.classList.remove('show-block');
                    }

                    if (formData.getAll('customer')[0] === null || formData.getAll('customer')[0] === "") {
                        let validate = document.querySelector('#customer');
                        let info = document.querySelector('#customer_valid');
                        validate.classList.remove('outline');
                        validate.classList.add('outline-validate');
                        info.classList.remove('hide-block');
                        info.classList.add('show-block');
                        error = 1;
                    }
                    else {
                        let validate = document.querySelector('#customer');
                        let info = document.querySelector('#customer_valid');
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

                    if (formData.getAll('phone_one')[0] === null || formData.getAll('phone_one')[0] === "") {
                        let validate = document.querySelector('#phone_one');
                        let info = document.querySelector('#phone_one_valid');
                        validate.classList.remove('outline');
                        validate.classList.add('outline-validate');
                        info.classList.remove('hide-block');
                        info.classList.add('show-block');
                        error = 1;
                    }
                    else {
                        let validate = document.querySelector('#phone_one');
                        let info = document.querySelector('#phone_one_valid');
                        validate.classList.add('outline');
                        validate.classList.remove('outline-validate');
                        info.classList.add('hide-block');
                        info.classList.remove('show-block');
                    }


                    if (formData.getAll('damage_note')[0] === null || formData.getAll('damage_note')[0] === "") {
                        let validate = document.querySelector('#damage_note');
                        let info = document.querySelector('#damage_note_valid');
                        validate.classList.remove('outline');
                        validate.classList.add('outline-validate');
                        info.classList.remove('hide-block');
                        info.classList.add('show-block');
                        error = 1;
                    }
                    else {
                        let validate = document.querySelector('#damage_note');
                        let info = document.querySelector('#damage_note_valid');
                        validate.classList.add('outline');
                        validate.classList.remove('outline-validate');
                        info.classList.add('hide-block');
                        info.classList.remove('show-block');
                    }

                    if (formData.getAll('repair_date')[0] === null || formData.getAll('repair_date')[0] === "") {
                        let validate = document.querySelector('#repair_date');
                        let info = document.querySelector('#repair_date_valid');
                        validate.classList.remove('outline');
                        validate.classList.add('outline-validate');
                        info.classList.remove('hide-block');
                        info.classList.add('show-block');
                        error = 1;
                    }
                    else {
                        let validate = document.querySelector('#repair_date');
                        let info = document.querySelector('#repair_date_valid');
                        validate.classList.add('outline');
                        validate.classList.remove('outline-validate');
                        info.classList.add('hide-block');
                        info.classList.remove('show-block');
                    }


                    if (error === 1) {
                        event.preventDefault();
                        return false;
                    }

                // ==================== warehouse validate =========

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#date_valid').hide();
                $('#valid_message').empty();

                let repair_date = $('#repair_date').val();

                $.ajax({
                    url: "{{ url('/repair/new/date-check') }}",
                    method: 'post',
                    async: false,
                    data: {
                        date: repair_date,
                    },
                    success: function(result){
                        if (result.success !== 1) {
                            e.preventDefault();
                            $('#date_valid').show();
                            $('#valid_message').html(result.success);
                        }
                        else {
                            $('#ajaxSubmit').submit();
                        }
                    }});
            });
        });


    </script>

@endsection


