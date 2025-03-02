@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <div class="table-responsive">
            <div class="d-flex justify-content-between align-items-center mb-3"><h2>Car owners List</h2></div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="table-dark">
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($owners as $owner)
                        <tr>
                            <td>{{$owner->name}}</td>
                            <td>{{$owner->surname}}</td>
                            <td>{{$owner->phone}}</td>
                            <td>{{$owner->email}}</td>
                            <td>{{$owner->address}}</td>
                            <td class="d-flex">
                                <a href="{{route('owners.edit', $owner->id)}}" class="btn btn-primary btn-sm mx-1">Edit</a>
                                <form action="{{route('owners.destroy', $owner->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm mx-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{route('owners.create')}}" class="btn btn-success">Add New</a>
        </div>
    </div>

@endsection

