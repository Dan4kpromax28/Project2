@extends('layout')
@section('content')
    <h1>{{ $title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">Please fix the errors! </div>
     @endif
    <form method="post" action="{{ $driver->exists ? '/drivers/patch/' . $driver->id : '/drivers/put' }}">
        @csrf
        <div class="mb-3">
            <label for="driver-name" class="form-label">Driver name</label>
            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="driver-name"
                name="name"
                value="{{ old('name', $driver->name) }}">
            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection