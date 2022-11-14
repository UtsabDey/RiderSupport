@extends('layouts.master')

@section('title', 'View Users')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-11">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Edit Users
                            <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-clipboard-list me-2"></i>User List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="mb-3">
                                            <label for="" class="form-label required">Name<span
                                                    style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}"  placeholder="Name" required>
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Role<span
                                                    style="color: red">*</span></label>
                                            <select name="role" class="form-control form-select" id="" required>
                                                <option value="0" {{ ($user->role == 0) ? 'selected' : ''}} >Admin</option>
                                                <option value="1" {{ ($user->role == 1) ? 'selected' : ''}}>Agent</option>
                                                <option value="2" {{ ($user->role == 1) ? 'selected' : ''}}>Q/A</option>
                                            </select>
                                            @error('role')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address<span
                                                    style="color: red">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $user->email }}" placeholder="Email Address" required>
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $user->phone }}" placeholder="Phone Number"
                                                pattern="[0]{1}[1]{1}[0-9]{9}">
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="2">{{ $user->address }}</textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
