@extends('layouts.master')

@section('title')
    Dashboard SLS - Users Management
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h2 class="text-center">User Management</h2></div>

                    <div class="card-body">

                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">#</th>
                                <th class="text-center" scope="col">First Name</th>
                                <th class="text-center" scope="col">Last Name</th>
                                <th class="text-center" scope="col">Email</th>
                                <th class="text-center" scope="col">Roles</th>
                                @can('edit-users')
                                <th class="text-center" scope="col">Edit</th>
                                @endcan
                                @can('delete-users')
                                <th class="text-center" scope="col">Delete</th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->firstname }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                    @can('edit-users')
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                                    </td>
                                    @endcan
                                    @can('delete-users')
                                    <td>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
