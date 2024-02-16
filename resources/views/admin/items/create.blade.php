@extends('layouts.main')

@section('title')
    {{ __('Add new item') }}
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">
            Add new item.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('admin.items.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}"
                           type="text"
                           class="form-control"
                           name="name"
                           id="name"
                           placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="base_price" class="form-label">Price</label>
                    <input value="{{ old('price') }}"
                           type="text"
                           class="form-control"
                           name="price"
                           id="price"
                           placeholder="Price" required>
                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control"
                            name="type_id"
                            id="type">
                        <option value="">Select type</option>
                        @foreach($types as $type)
                            <option value="{{ $type->id }}" >{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                        <span class="text-danger text-left">{{ $errors->first('type_id') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save item</button>
                <a href="{{ route('admin.items.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection
