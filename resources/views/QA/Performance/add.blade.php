@extends('layouts.master')

@section('title', 'Add Performance')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-11">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Add Performance
                            <a href="{{ route('performance.index') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-clipboard-list me-2"></i>Performance List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('performance.store') }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="mb-3">
                                            <label for="" class="form-label required">Agent Name<span
                                                    style="color: red">*</span></label>
                                            <select class="form-control form-select" name="A_id" id="A_id" required>
                                                <option value="">Select Agent Name</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('A_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Daily Report<span
                                                    style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="daily_report" name="daily_report"
                                                placeholder="Mark out of 100" required>
                                            @error('daily_report')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
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
