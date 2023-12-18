
@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="card">
      <div class="card-body">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h4 class="card-title text-capitalize">form create</h4>
          <a href="{{ route('repository.index') }}" class="text-capitalize">back</a>
        </div>
        <div class="card-body">
          <form action="{{route('repository.store')}}" method="POST">
            @csrf

            <div class="form-group">
              <label for="title">title</label>
              <input type="text" name="title" id="" class="form-control @error('title') 
                is-invalid
              @enderror">
              @error('title')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="author" class="text-capitalize">author</label>
              <input type="text" name="author" id="" class="form-control @error('author') 
              is-invalid
            @enderror">
            @error('author')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="" class="text-capitalize">years</label>
              <input type="text" name="year" id="" class="form-control @error('year') 
              is-invalid
            @enderror">
            @error('year')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="" class="text-capitalize">deskripsi</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control @error('description') 
              is-invalid
            @enderror"></textarea>
            </div>

            <button type="submit" class="btn btn-primary text-capitalize">submit</button>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection