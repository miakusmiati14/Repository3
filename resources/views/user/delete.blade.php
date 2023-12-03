@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Konfirmasi Hapus Pengguna</h1>
                <p>Anda yakin ingin menghapus pengguna ini?</p>
                <form action="{{ route('user.delete', $user['id']) }}" method="POST">
                    {{-- <form method="POST" action="{{ route('user.delete', ['id' => $userId]) }}"> --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya</button>
                    <a href="{{ route('user.index') }}" class="btn btn-secondary">Tidak</a>
                </form>
            </div>
        </div>
    </div>
@endsection