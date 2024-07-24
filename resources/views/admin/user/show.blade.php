@extends('layouts.app')

@section('title')
    User Create
@parent
@stop

@push('links')
@endpush

@section('content')
{{ $user->name }}
{{ $user->email }}
@stop

@push('scripts')
@endpush