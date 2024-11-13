<!-- Edit -->
@extends('admin.projects.form')

@section('form-action')
    {{ route('admin.projects.update', $project) }}
@endsection

@section('form-method')
    @method('put')
@endsection

@section('form-submit', 'Update')
