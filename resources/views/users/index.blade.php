@extends('layouts.app')
@section('content_title', 'Data Users')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Users</h4>
        </div>
        <div class="card-body">
            <x-alert :errors="$errors" />
            <div class="d-flex justify-content-end mb-2">
                <x-user.form-user />
            </div>
            <table class="table table-sm" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Nama</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <x-user.form-user :id="$user->id" />
                                    <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger mx-1"
                                        data-confirm-delete="true">
                                        <i class="fas fa-trash"></i></a>
                                    <x-user.reset-password :id="$user->id" />
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
