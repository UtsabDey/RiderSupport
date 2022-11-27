@extends('layouts.master')

@section('title', 'Agent Performance')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View Performance
                            <a href="{{ route('performance.create') }}" class="btn btn-primary btn-sm float-end"><i
                                class="fas fa-user-plus me-2"></i>Add Performance</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">Sl no.</th>
                                    <th scope="col" width="1%">Agent ID</th>
                                    <th scope="col" width="3%">Agent name</th>
                                    <th scope="col" width="5%">Daily Report</th>
                                    <th scope="col" width="5%">Report Date</th>
                                    <th scope="col" width="5%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($performances as $key => $performance)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="text-center">{{ $performance->A_id }}</td>
                                        <td class="text-center">{{ $performance->user->name }}</td>
                                        <td class="text-center">{{ $performance->daily_report }}</td>
                                        <td class="text-center">{{ $performance->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('performance.edit', $performance->id) }}"
                                                    class="btn btn-info btn-sm me-2"><i
                                                        class="fas fa-user-edit me-1"></i>Edit</a>
                                                <form action="{{ route('performance.destroy', $performance->id) }}" method="post">
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
