@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-black text-white">
                <h3 class="mb-0">{{ __('Edit a Car Owner Details') }}</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('cars.update', $car) }}" enctype="multipart/form-data">
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

                    <div class="mb-3">
                        <label class="form-label">{{ __('Upload Car Photos') }}:</label>
                        <input type="file" class="form-control" name="photos[]" multiple accept="image/*">

                        @error('photos.*')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">{{ __('Edit Car') }}</button>
                        <a href="{{ route('owners.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
                    </div>
                </form>

                @if($car->photos->count())
                    <div class="card mt-4">
                        <div class="card-header bg-secondary text-white">
                            <h5 class="mb-0">{{ __('Car Photos') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($car->photos as $photo)
                                    <div class="col-md-3 mb-3 text-center">
                                        <div class="position-relative border rounded p-2">
                                            <img src="{{ asset('storage/' . $photo->photo_path) }}" class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">

                                            <form action="{{ route('cars.photos.destroy', $photo) }}" method="POST" class="position-absolute top-0 end-0 m-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete photo">×</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

@endsection
