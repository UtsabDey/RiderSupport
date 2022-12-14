@extends('layouts.master')

@section('title', 'View Tools')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View Tools
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sl no.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tools as $key => $tool)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $tool->name }}</td>
                                        <td>
                                            <a href="{{ $tool->link }}" target="_blank" rel="noopener noreferrer">Go to
                                                {{ $tool->name }}</a>
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
