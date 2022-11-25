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
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Sl no.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Link</th>
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
