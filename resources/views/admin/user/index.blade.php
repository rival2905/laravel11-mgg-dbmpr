@extends('layouts.app')

@section('title')
    Users  
@parent
@stop

@push('links')
@endpush

@section('content')
<a href="{{ route('user.create') }}" class="btn btn-primary">
    Create
</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $no => $user)
        <tr>
            <th scope="row">{{ ++$no }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                    <a href="{{ route('user.show',$user->id) }}" class="btn btn-success btn-sm">
                        Show
                    </a>
                    <a href="{{ route('user.edit',$user->id) }}" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <a href="{{ route('user.destroy',$user->id) }}" class="btn btn-danger btn-sm">
                        Delete
                    </a>
                </div>    
            </td>    
        </tr>
        @endforeach
      
    </tbody>
</table>
@stop

@push('scripts')
@endpush
