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
                            <a href="{{ route('tools.create') }}" class="btn btn-primary btn-sm float-end"><i class="fa-solid fa-circle-plus me-2 fa-lg"></i>Add Tools</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="1%">Sl no.</th>
                                    <th scope="col" width="4%">Name</th>
                                    <th scope="col" width="12%">Link</th>
                                    <th scope="col" width="4%" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
