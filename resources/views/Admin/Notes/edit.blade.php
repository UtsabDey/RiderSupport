@extends('layouts.master')

@section('title', 'Edit Notes')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-10">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Edit Notes
                            <a href="{{ route('notes.index') }}" class="btn btn-primary btn-sm float-end"><i
                                    class="fas fa-clipboard-list me-2"></i>Notes List</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('notes.update', $note->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label required">Reason<span
                                        style="color: red">*</span></label>
                                <input type="text" class="form-control" id="reason" name="reason" value="{{ $note->reason }}"
                                    placeholder="Reason" required>
                                @error('reason')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" id="notes" class="form-control" rows="5">{{ $note->notes }}</textarea>
                                @error('notes')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
