@extends('layouts.master')

@section('title', 'View Users')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View Users
                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-user-plus me-2"></i>Add User</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">ID</th>
                                    <th scope="col" width="3%">Username</th>
                                    <th scope="col" width="5%">Email</th>
                                    <th scope="col" width="2%" class="text-center">Position</th>
                                    <th scope="col" width="2%" class="text-center">Join Date</th>
                                    <th scope="col" width="5%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center"><span
                                                class="badge bg-danger">{{ ($user->role_as == 0 ? 'Admin' : ($user->role_as == 1 ? 'Agent' : 'Q/A')) }}</span>
                                        </td>
                                        <td class="text-center">{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('users.edit', $user->id) }}"
                                                    class="btn btn-info btn-sm me-2"><i
                                                        class="fas fa-user-edit me-1"></i>Edit</a>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this item?')"><i
                                                            class="fas fa-trash me-1"></i>Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
