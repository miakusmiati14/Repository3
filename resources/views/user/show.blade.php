@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Detail Pengguna</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $user['id'] }}</td>
                        </tr>
                        <tr>
                            <th>Nama</th>
                            <td>{{ $user['name'] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $user['email'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection