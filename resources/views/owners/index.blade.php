@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="table-responsive">
            <h2 class="mb-3">Owners List</h2>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr class="table-dark">
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Car</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td>{{ $owner->name }}</td>
                            <td>{{ $owner->surname }}</td>
                            <td>{{ $owner->phone }}</td>
                            <td>{{ $owner->email }}</td>
                            <td>{{ $owner->address }}</td>
                            <td>
                                @if($owner->cars->isNotEmpty())
                                    @foreach($owner->cars as $car)
                                        <div class="d-flex align-items-center">
                                            {{ $car->brand }} {{ $car->model }} ({{ $car->reg_number }})

                                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm mx-2">Edit</a>

                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                            </form>
                                        </div>
                                    @endforeach
                                @else
                                    <span class="text-muted">No car assigned</span>
                                @endif
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary btn-sm mx-1">Edit User</a>

                                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mx-1">Delete User</button>
                                </form>
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('cars.create', ['owner_id' => $owner->id]) }}" class="btn btn-success btn-sm mx-1">
                                    Assign Car
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{route('owners.create')}}" class="btn btn-success">Add New Owner</a>
            <a href="{{ route('cars.index') }}" class="btn btn-primary">Cars List</a>

        </div>
    </div>

@endsection
