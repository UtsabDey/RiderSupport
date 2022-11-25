@extends('layouts.master')

@section('title', 'View RCR')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            View RCR
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">Sl no.</th>
                                    <th scope="col" width="4%">Title</th>
                                    <th scope="col" width="12%">Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rcrs as $key => $rcr)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $rcr->title }}</td>
                                        <td>
                                            <a href="{{ $rcr->link }}" target="_blank" rel="noopener noreferrer">Go to
                                                {{ $rcr->title }}</a>
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
