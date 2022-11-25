@extends('layouts.master')

@section('title', 'View SOP')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View SOP
                            <a href="{{ route('sop.create') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fa-solid fa-circle-plus me-2 fa-lg"></i>Add SOP</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">Sl no.</th>
                                    <th scope="col" width="4%">Title</th>
                                    <th scope="col" width="12%">Link</th>
                                    <th scope="col" width="4%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sops as $key => $sop)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $sop->title }}</td>
                                        <td>
                                            <a href="{{ $sop->link }}" target="_blank" rel="noopener noreferrer">Go to
                                                {{ $sop->title }}</a>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('sop.edit', $sop->id) }}"
                                                    class="btn btn-info btn-sm me-2"><i
                                                        class="fas fa-user-edit me-1"></i>Edit</a>
                                                <form action="{{ route('sop.destroy', $sop->id) }}" method="post">
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
