@extends('layouts.main')

@section('title')
    {{ __('Update type') }}
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('admin.types.update', $type->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $type->name }}"
                           type="text"
                           class="form-control"
                           name="name"
                           id="name"
                           placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update type</button>
                <a href="{{ route('admin.types.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>

    </div>
@endsection
