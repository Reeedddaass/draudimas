@extends('layouts.app')

@section('content')

    <div class="container py-4">
        <h1 class="mb-3 fw-bold text-primary">[[Greetings]]</h1>
    </div>

    <div class="container mt-4">
        <div class="table-responsive">
            <h2 class="mb-3">{{ __('Owners List') }}</h2>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr class="table-dark">
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Surname') }}</th>
                    <th>{{ __('Phone') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('Car') }}</th>
                    @auth
                        @if(auth()->user()->role === 'editor')
                            <th> </th>
                        @endif
                    @endauth
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
                                            @auth
                                                @if(auth()->user()->role === 'editor')

                                                    @can('update', $car)
                                                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-warning btn-sm mx-2">{{ __('Edit') }}</a>
                                                    @endcan

                                                    <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Remove') }}</button>
                                                    </form>
                                                @endif
                                            @endauth
                                        </div>
                                    @endforeach
                                @else
                                    <span class="text-muted">{{ __('No car assigned') }}</span>
                                @endif
                            </td>
                            @auth
                                @if(auth()->user()->role === 'editor')
                                    <td class="d-flex">
                                        <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-primary btn-sm mx-1">{{ __('Edit User') }}</a>

                                        <form action="{{ route('owners.destroy', $owner->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mx-1">{{ __('Delete User') }}</button>
                                        </form>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ route('cars.create', ['owner_id' => $owner->id]) }}" class="btn btn-success btn-sm mx-1">
                                            {{ __('Assign Car') }}
                                        </a>
                                    </td>
                                @endif
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @auth
                @if(auth()->user()->role === 'editor')
                    <a href="{{route('owners.create')}}" class="btn btn-success">{{ __('Add New Owner') }}</a>
                @endif
            @endauth

            <a href="{{ route('cars.index') }}" class="btn btn-primary">{{ __('Cars List') }}</a>
        </div>
    </div>

    <div class="container text-center mt-5 mb-3 text-muted small">
        [[FooterText]]
    </div>

@endsection
