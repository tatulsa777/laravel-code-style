@extends('layouts.main')

@section('title')
    {{ __('Show type') }}
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">

        </div>

        <div class="container mt-4">
            <div>
                Name: {{ $type->name }}
            </div>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('admin.types.index') }}" class="btn text-white btn-default">Back</a>
    </div>
@endsection
