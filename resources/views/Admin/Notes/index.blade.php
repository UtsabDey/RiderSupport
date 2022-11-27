@extends('layouts.master')

@section('title', 'View Notes')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-11">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View Notes
                            <a href="{{ route('notes.create') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fa-solid fa-circle-plus me-2 fa-lg"></i>Add Notes</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">Sl no.</th>
                                    <th scope="col" width="4%">Reason</th>
                                    <th scope="col" width="12%">Notes</th>
                                    <th scope="col" width="2%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notes as $key => $note)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $note->reason }}</td>
                                        <td>{!! Str::limit($note->notes, 280, ' ...') !!}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('notes.edit', $note->id) }}"
                                                    class="btn btn-info btn-sm me-2"><i
                                                        class="fas fa-user-edit me-1"></i>Edit</a>
                                                <form action="{{ route('notes.destroy', $note->id) }}" method="post">
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
