@extends('layouts.main')

@section('title')
    {{ __('Show item') }}
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Name: {{ $item->name }}
            </div>
            <div>
                Base price: {{ $item->base_price }}
            </div>
            <div>
                Type: {{ $item?->type?->name }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('admin.items.index') }}" class="btn text-white btn-default">Back</a>
    </div>
@endsection
