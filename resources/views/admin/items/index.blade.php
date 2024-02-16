@extends('layouts.main')

@section('title')
    {{ __('Items') }}
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">
            Manage your items here.
            <a href="{{ route('admin.items.create') }}" class="btn btn-primary btn-sm float-right">Add new item</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead style="text-align: center">
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col" width="10%">Price</th>
                <th scope="col" width="10%">Type</th>
                <th scope="col" width="1%" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
            @forelse($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item?->type?->name }}</td>
                    <td>
                        <a href="{{ route('admin.items.show', $item->id) }}" class="btn btn-warning btn-sm">Show</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.items.edit', $item->id) }}" class="btn btn-info btn-sm">Edit</a>
                    </td>
                    <td>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'route' => [
                            'admin.items.destroy', $item->id
                            ],'style'=>'display:inline'
                        ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <p>No data</p>
            @endforelse
            </tbody>
        </table>

        <div class="d-flex">
            {!! $items->links() !!}
        </div>

    </div>
@endsection
