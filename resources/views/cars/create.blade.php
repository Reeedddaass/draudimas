
@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-black text-white">
                <h3 class="mb-0">{{ __('Register New Car') }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('cars.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="owner_id" value="{{ $owner_id }}">

                    <div class="mb-3">
                        <label for="brand" class="form-label">{{ __('Car Brand') }}</label>
                        <input type="text" class="form-control" name="brand" required>

                        @error('brand')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="model" class="form-label">{{ __('Car Model') }}</label>
                        <input type="text" class="form-control" name="model" required>

                        @error('model')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="reg_number" class="form-label">{{ __('Registration Number') }}</label>
                        <input type="text" class="form-control" name="reg_number" required>

                        @error('reg_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">{{ __('Assign Car') }}</button>
                        <a href="{{ route('owners.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

