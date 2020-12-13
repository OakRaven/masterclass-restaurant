@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('partials.flash')

            <div class="card">
                <div class="card-header">Manage Food</div>

                <div class="card-body">
                    <div class="d-flex justify-content-end mb-2">
                        <a href="{{ route('food.create') }}" class="btn btn-success">Add Food</a>
                    </div>

                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col" class="text-center">Category</th>
                                <th scope="col" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($food) > 0)

                            @foreach ($food as $key=>$item)
                            <tr>
                                <td scope="row">
                                    {{ $key + 1 }}
                                </td>
                                <td>
                                    {{ $item->name }}
                                </td>
                                <td class="text-center">
                                    {{ $item->category->name }}
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('food.edit', $item) }}" class="btn btn-outline-info btn-sm">
                                        Edit
                                    </a>

                                    <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal"
                                        data-target="#confirmModal{{ $item->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="confirmModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        Delete <strong>{{ $item->name }}</strong> Food Item?
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    You are about to delete the {{ $item->name }} food item. Are you
                                                    sure?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>

                                                    <form action="{{ route('food.destroy', $item) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            Yes
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="3" class="text-center">
                                    No Food
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
