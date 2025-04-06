@extends('layouts.app')

@section('content')

    <div class="container mt-4">
        <h2 class="mb-3">{{ __('Registered Cars') }}</h2>
        <table class="table table-striped table-hover table-bordered">
            <thead>
            <tr class="table-dark">
                <th>{{ __('Registration Number') }}</th>
                <th>{{ __('Car Brand') }}</th>
                <th>{{ __('Car Model') }}</th>
                <th>{{ __('Owner') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->reg_number }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>
                        @if($car->owner)
                                <span class="fw-semibold">{{ $car->owner->name }} {{ $car->owner->surname }}</span>
                        @else
                            <span class="text-muted">{{ __('No Owner') }}</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('owners.index') }}" class="btn btn-primary">{{ __('Go Back') }}</a>
    </div>

    <div class="container text-center mt-5 mb-3 text-muted small">
        [[FooterText]]
    </div>

@endsection
