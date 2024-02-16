@extends('layouts.main')

@section('title')
    {{ __('Update item') }}
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('admin.items.update', $item->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $item->name }}"
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
                    <label for="price" class="form-label">Price</label>
                    <input value="{{ $item->price }}"
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
                            <option value="{{ $type->id }}"
                                {{ $type->id == $itemTypeId
                                    ? 'selected'
                                    : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                        <span class="text-danger text-left">{{ $errors->first('type_id') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update item</button>
                <a href="{{ route('admin.items.index') }}" class="btn btn-default">Cancel</a>
            </form>
        </div>

    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $("#image").change(function () {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function (event) {
                        $(".for-img-edit label img")
                            .attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endpush
