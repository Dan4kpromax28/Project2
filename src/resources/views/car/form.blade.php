@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if ($errors->any())
    <div class="alert alert-danger">Please fix the validation errors!</div>
@endif
<form
    method="post"
    action="{{ $car->exists ? '/cars/patch/' . $car->id : '/cars/put' }}"
    enctype="multipart/form-data"
    >
     @csrf
    <div class="mb-3">
        <label for="car-name" class="form-label">Name</label>
            <input
                type="text"
                id="car-name"
                name="name"
                value="{{ old('name', $car->name) }}"
                class="form-control @error('name') is-invalid @enderror"
            >
            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="car-author" class="form-label">Author</label>
            <select
                id="car-author"
                name="author_id"
                class="form-select @error('author_id') is-invalid @enderror"
            >
            <option value="">Choose the author!</option>
                @foreach($authors as $author)
                    <option
                        value="{{ $author->id }}"
                        @if ($author->id == old('author_id', $car->author->id ?? false)) selected @endif>{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <p class="invalid-feedback">{{ $errors->first('author_id') }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="car-driver" class="form-label">Driver</label>
            <select
                id="car-driver"
                name="driver_id"
                class="form-select @error('driver_id') is-invalid @enderror"
            >
            <option value="">Choose the driver!</option>
                @foreach($drivers as $driver)
                    <option
                        value="{{ $driver->id }}"
                        @if ($driver->id == old('driver_id', $car->driver->id ?? false)) selected @endif>{{ $driver->name }}</option>
                @endforeach
            </select>
            @error('driver_id')
                <p class="invalid-feedback">{{ $errors->first('driver_id') }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="car-description" class="form-label">Description</label>

            <textarea
                id="car-description"
                name="description"
                class="form-control @error('description') is-invalid @enderror"
            >{{ old('description', $car->description) }}</textarea>
            @error('description')
                <p class="invalid-feedback">{{ $errors->first('description') }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="car-year" class="form-label">Release year</label>
                <input
                    type="number" max="{{ date('Y') + 1 }}" step="1"
                    id="car-year"
                    name="year"
                    value="{{ old('year', $car->year) }}"
                    class="form-control @error('year') is-invalid @enderror"
                >
            @error('year')
                <p class="invalid-feedback">{{ $errors->first('year') }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="car-price" class="form-label">Fee</label>
            <input
                type="number" min="0.00" step="0.01" lang="en"
                id="car-price"
                name="price"
                value="{{ old('price', $car->price) }}"
                class="form-control @error('price') is-invalid @enderror"
            >
            @error('price')
                <p class="invalid-feedback">{{ $errors->first('price') }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="car-image" class="form-label">Image</label>
             @if ($car->image)
                <img
                    src="{{ asset('images/' . $car->image) }}"
                    class="img-fluid img-thumbnail d-block mb-2"
                    alt="{{ $car->name }}"
                >
            @endif
            <input
                type="file" accept="image/png, image/webp, image/jpeg"
                id="car-image"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
            >
            @error('image')
                <p class="invalid-feedback">{{ $errors->first('image') }}</p>
            @enderror
        </div>
 
        <div class="mb-3">
            <div class="form-check">
                <input
                    type="checkbox"
                    id="car-display"
                    name="display"
                    value="1"
                    class="form-check-input @error('display') is-invalid @enderror"
                    @if (old('display', $car->display)) checked @endif>
                <label class="form-check-label" for="car-display">
                    Publish
                </label>

                @error('display')
                    <p class="invalid-feedback">{{ $errors->first('display') }}</p>
                @enderror
            </div>
        </div>

        

        <button type="submit" class="btn btn-primary">
            {{ $car->exists ? 'Update' : 'Create' }}
        </button>
</form>
@endsection
