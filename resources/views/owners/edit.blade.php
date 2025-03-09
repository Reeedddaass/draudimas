@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-black text-white">
                <h3 class="mb-0">Edit a Car Owner Details</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('owners.update', $owner) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" value="{{ $owner->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Surname:</label>
                        <input type="text" name="surname" class="form-control" value="{{ $owner->surname }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone:</label>
                        <input type="text" name="phone" class="form-control" value="{{ $owner->phone }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $owner->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address:</label>
                        <input type="text" name="address" class="form-control" value="{{ $owner->address }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">Edit Owner</button>
                        <a href="{{ route('owners.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
