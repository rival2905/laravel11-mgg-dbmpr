@extends('layouts.app')

@section('title')
    User 
    @if ($pointer=='crete')
    Create
    @else
    Edit
    @endif
@parent
@stop

@push('links')
@endpush

@section('content')
@if ($pointer=='create')
<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
@else
<form action="{{ route('user.update',@$user->id) }}" method="POST" enctype="multipart/form-data">
@method('PUT')
@endif

    @csrf
    <div class="mb-3">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name',@$user->name) }}" id="inputName" placeholder="Input name here" >
        @error('name')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" value="{{ old('email',@$user->email) }}" id="exampleFormControlInput1" placeholder="name@example.com" >
        @error('email')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>

        <div class="row">
            <div class="col">
                <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Input password here" >

            </div>
            <div class="col">
                <input type="password" name="password_confirmation" class="form-control" placeholder="re type password" >

            </div>
        </div>
        @error('password')
        <div class="invalid-feedback" style="display: block">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

@stop

@push('scripts')
@endpush
