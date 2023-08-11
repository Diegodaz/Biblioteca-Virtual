@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>Lista de usuarios</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>{{session('info')}}</strong>
</div>
@endif
 @livewire('admin.users-index')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop


