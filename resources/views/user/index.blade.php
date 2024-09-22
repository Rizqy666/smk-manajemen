@extends('layouts.master')

@section('title', 'Halaman Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    <div id="app">
        <dashboard-component></dashboard-component> 
    </div>
@endsection
