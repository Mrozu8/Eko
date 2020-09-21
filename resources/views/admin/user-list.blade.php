@extends('layouts.main')
@section('content')


    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lista pracowników</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Pracownik</th>
                                        <th>Miejsce pracy</th>
                                        <th>Stanowisko</th>
                                        <th>Edycja</th>
                                        <th>Usuń</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }} {{ $user->surname }}</td>
                                            <td>{{ user_workplace_changer($user->workplace) }}</td>
                                            <td>{{ user_role_changer($user->role) }}</td>
                                            <td><a href="{{ route('user-edit', $user->id) }}"><button type="button" class="btn btn-primary shadow-btn">Edytuj</button></a></td>
                                            <td>
                                                <form action="{{ route('user-delete', $user->id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger icon-btn">Usuń</button>
                                                </form>
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
    </div>
    <!-- /.container-fluid -->


@endsection
