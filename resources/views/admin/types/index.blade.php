@extends('layouts.main')

@section('title')
    {{ __('Types') }}
@endsection

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="lead">
            Manage your types here.
            <a href="{{ route('admin.types.create') }}" class="btn btn-primary btn-sm float-right">Add new type</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>

        <table class="table table-striped">
            <thead style="text-align: center">
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col" width="1%" colspan="3">Actions</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
            @forelse($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td>{{ $type->name }}</td>
                    <td><a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-warning btn-sm">Show</a></td>
                    <td><a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-info btn-sm">Edit</a></td>
                    <td>
                        {!! Form::open([
                            'method' => 'DELETE'
                            ,'route' => [
                                'admin.types.destroy',
                             $type->id],
                             'style'=>'display:inline'
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
            {!! $types->links() !!}
        </div>

    </div>
@endsection
