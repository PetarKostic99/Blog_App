@extends('layouts.admin')

@section('main')
    <div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Ime</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Datum registracije</th>
                    <th scope="col">Uloga</th>

                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row"></th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->role }}</td>



                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
