@extends('layouts.calendar')
@section('content')


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Kalendarz</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-body">

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

                        <hr class="line-form">

                        <div class="row space-top--p-mid">
                            <div class="col-xl-6">
                                <h5>Ustal ilość możliwych napraw na dany dzień</h5>
                                <form class="" method="post" action="{{ route('add-slot') }}">
                                    @csrf
                                        <div class="form-row space-top--p-mid">
                                            <div class="form-group col-xl-5">
                                                <label for="inputEmail4">Data: </label>
                                                <input id="inputEmail4" name="date" type="date" value="{{ old('date') }}" class="outline form-control @error('date') is-invalid @enderror">
                                                @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-5">
                                                <label for="inputEmail4">Ilość:</label>
                                                <input id="inputEmail4" name="slot" type="number" min="0" placeholder="xx" value="{{ old('slot') }}"  class="outline form-control @error('slot') is-invalid @enderror" >
                                                @error('slot')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                    @if(session()->has('error-add'))
                                        <div class="row">
                                            <div class="col-xl-10">
                                                <div class="alert alert-danger">
                                                    {{ session()->get('error-add') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group space-top--p-mid">
                                        <button type="submit" class="btn btn-primary shadow-btn">Zatwierdź</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xl-6">
                                <h5>Edytuj ilość możliwych napraw na dany dzień</h5>
                                <form class="" method="post" action="{{ route('edit-slot') }}">
                                    @csrf

                                    <div class="form-row space-top--p-mid">
                                        <div class="form-group col-xl-5">
                                            <label for="inputEmail4">Data: </label>
                                            <input id="inputEmail4" name="date_edit" type="date" value="{{ old('date_edit') }}" class="outline form-control @error('date_edit') is-invalid @enderror">
                                            @error('date_edit')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-xl-5">
                                            <label for="inputEmail4">Ilość:</label>
                                            <input id="inputEmail4" name="slot_edit" type="number" min="0" placeholder="xx" value="{{ old('slot_edit') }}"  class="outline form-control @error('slot_edit') is-invalid @enderror" >
                                            @error('slot_edit')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    @if(session()->has('error-edit'))
                                        <div class="row">
                                            <div class="col-xl-10">
                                                <div class="alert alert-danger">
                                                    {{ session()->get('error-edit') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group space-top--p-mid">
                                        <button type="submit" class="btn btn-primary shadow-btn">Zatwierdź</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>

    </div>


@endsection





