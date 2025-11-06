@extends('layouts.app')
@section('content_title', 'Dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            Selamat datang di POS aplikasi, <strong class="text-capitalize">{{ auth()->user()->name }}</strong>
        </div>
    </div>
@endsection
