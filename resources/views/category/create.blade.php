@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          @if (isset($category))
          Update Category
          @else
          Create Category
          @endif
        </div>
        <div class="card-body">
          @include('partials.errors')

          <form action="{{ isset($category) ? route('category.update', $category) : route('category.store') }}"
            method="POST">
            @csrf
            @if (isset($category))
            @method('PUT')
            @endif
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control"
                value="{{ old('name', isset($category) ? $category->name : '') }}">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-outline-primary">
                @if (isset($category))
                Update Category
                @else
                Create Category
                @endif
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection