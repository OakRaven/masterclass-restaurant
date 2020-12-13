@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if (isset($food))
                    Update Food
                    @else
                    Create Food
                    @endif
                </div>
                <div class="card-body">
                    <form action="{{ isset($food) ? route('food.update', $food) : route('food.store') }}" method="POST">
                        @csrf
                        @if (isset($food))
                        @method('PUT')
                        @endif

                        {{-- name --}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', isset($food) ? $food->name : '') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- description --}}
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="5" cols="40"
                                class="form-control @error('description') is-invalid @enderror">{{ old('description', isset($food) ? $food->description : '') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- price --}}
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price"
                                class="form-control @error('price') is-invalid @enderror"
                                value="{{ old('price', isset($food) ? $food->price : '') }}">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- category --}}
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror">
                                <option value="">Please select</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category', isset($food) ? $food->category_id : '') == $category->id ? ' selected' : ''}}>
                                    {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">
                                @if (isset($food))
                                Update Food
                                @else
                                Create Food
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
