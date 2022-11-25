@extends('layouts.master')

@section('title', 'Add RCR')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Add RCR
                            <a href="{{ route('rcr.index') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-clipboard-list me-2"></i>RCR List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('rcr.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label required">Title<span
                                        style="color: red">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" aria-describedby=""
                                    placeholder="Name" required>
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="link" id="link" class="form-control" rows="2"></textarea>
                                @error('link')
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
