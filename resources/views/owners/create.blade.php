@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-black text-white">
                <h3 class="mb-0">{{ __('Create a Car Owner') }}</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route("owners.store") }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">{{ __('Name') }}:</label>
                        <input type="text" name="name" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Surname') }}:</label>
                        <input type="text" name="surname" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Phone') }}:</label>
                        <input type="text" name="phone" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Email') }}:</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Address') }}:</label>
                        <input type="text" name="address" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">{{ __('Add Owner') }}</button>
                        <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
