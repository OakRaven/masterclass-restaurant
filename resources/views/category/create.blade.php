@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Category</div>
        <div class="card-body">
          @include('partials.errors')

          <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary">Create Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection