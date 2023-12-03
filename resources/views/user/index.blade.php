@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Pengguna</h1>
                <a href="{{ route('user.create') }}" class="btn btn-success">Tambah Pengguna</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    <a href="{{ route('user.show', $user['id']) }}" class="btn btn-primary">Lihat</a>
                                    <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('user.delete', $user['id']) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <a href="{{ route('user.create') }}" class="btn btn-success">Tambah Pengguna</a> --}}
            </div>
        </div>
    </div>
@endsection