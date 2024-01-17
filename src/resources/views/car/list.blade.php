@extends('layout')
@section('content')
<h1>{{ $title }}</h1>
@if (count($items) > 0)
    <table class="table table-sm table-hover table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Team</th>
                <th>Driver</th>
                <th>Car Number</th>
                <th>Year</th>
                <th>Price</th>
                <th>Published</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->author->name }}</td>
                <td>{{ $car->driver->name }}</td>
                <td>{{ $car->driver->id }}</td>
                <td>{{ $car->year }}</td>
                <td>&euro; {{ number_format($car->price, 2, '.') }}</td>
                <td>{!! $car->display ? '&#x2714;' : '&#x274C;' !!}</td>
                <td>
                    <a
                        href="/cars/update/{{ $car->id }}"
                        class="btn btn-outline-primary btn-sm"
                        >Edit</a> /
                        <form
                            method="post"
                            action="/cars/delete/{{ $car->id }}"
                            class="d-inline deletion-form"
                        >
                            @csrf
                            <button
                                type="submit"
                                class="btn btn-outline-danger btn-sm"
                            >Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No entries found in database </p>
    @endif
<a href="/cars/create" class="btn btn-primary">Add new car</a>
@endsection