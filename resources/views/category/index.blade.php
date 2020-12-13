@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Manage Categories</div>

        <div class="card-body">
          <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('category.create') }}" class="btn btn-success">Add Category</a>
          </div>

          <table class="table table-striped">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if (count($categories) > 0)

              @foreach ($categories as $key=>$item)
              <tr>
                <td scope="row">
                  {{ $key + 1 }}
                </td>
                <td>
                  {{ $item->name }}
                </td>
                <td class="text-center">
                  <a href="{{ route('category.edit', $item) }}" class="btn btn-info btn-sm">Edit</a>

                  <form action="{{ route('category.destroy', $item) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                      onclick="return confirm('Delete the {{ $item->name }} category?  Are you sture?')">
                      Delete
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach

              @else
              <tr>
                <td colspan="3" class="text-center">
                  No Categories
                </td>
              </tr>
              @endif


            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection