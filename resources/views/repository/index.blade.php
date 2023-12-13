@extends('layouts.app')
@section("content")

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>nomor</th>
                <th>title</th>
                <th>author</th>
                <th>year</th>
                <th>description</th>
                <th>option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($repositories as $index => $repository )
                <tr>
                    <td>{{ $index}}</td>
                    <td>{{ $repository->title }}</td>
                    <td>{{ $repository->author}}</td>
                    <td>{{ $repository->year}}</td>
                    <td>{{ $repository->description}}</td>
                    <td>
                        <a href="#" class="nav-link text-success">edit</a>
                        <a href="#" class="nav-link text-danger">delete</a>
                    </td>
                </tr>

            @endforeach
        </tbody>   
    </table>
</div>
@endsection