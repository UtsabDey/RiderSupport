@extends('layouts.master')

@section('title', 'Add Notes')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Add Notes
                            <a href="{{ route('notes.index') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-clipboard-list me-2"></i>Notes List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('notes.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label required">Reason<span
                                        style="color: red">*</span></label>
                                <input type="text" class="form-control" id="reason" name="reason" aria-describedby=""
                                    placeholder="Reason" required>
                                @error('reason')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" id="notes" class="form-control" rows="4"></textarea>
                                @error('notes')
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
