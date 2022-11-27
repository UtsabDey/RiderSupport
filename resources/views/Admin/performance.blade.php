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
