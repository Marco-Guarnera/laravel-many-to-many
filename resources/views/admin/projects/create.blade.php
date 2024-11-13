<!-- Create -->
@extends('admin.projects.form')

@section('form-action')
    {{ route('admin.projects.store') }}
@endsection

@section('form-method')
    @method('post')
@endsection

@section('form-submit', 'Create')
