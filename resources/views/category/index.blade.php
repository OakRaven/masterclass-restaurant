@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Manage Categories</div>

        <div class="card-body">
          <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('category.create') }}" class="btn btn-info" style="color: white;">Add Category</a>
          </div>

          <ul class="list-group">
            @foreach ($categories as $item)
            <li class="list-group-item">{{ $item->name }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection