@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-black text-white">
                <h3 class="mb-0">{{ __('Edit a Car Owner Details') }}</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('cars.update', $car) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">{{ __('Registration Number') }}:</label>
                        <input type="text" class="form-control" name="reg_number" value="{{ $car->reg_number }}" required>

                        @error('reg_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Car Brand') }}:</label>
                        <input type="text" class="form-control" name="brand" value="{{ $car->brand }}" required>

                        @error('brand')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">{{ __('Car Model') }}:</label>
                        <input type="text" class="form-control" name="model" value="{{ $car->model }}" required>

                        @error('model')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">{{ __('Edit Car') }}</button>
                        <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
