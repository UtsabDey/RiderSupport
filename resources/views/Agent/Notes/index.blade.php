@extends('layouts.master')

@section('title', 'View Notes')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center mb-5">
            <div class="col-md-11">
                <div class="card shadow mt-4">
                    <div class="card-header">
                        <h4>
                            Notes List
                        </h4>
                    </div>
                    <div class="card-body">
                        @foreach ($notes as $note)
                        <div>
                            <h4>{{ $note->reason }}</h4>
                            <p style="text-align: justify">{{ $note->notes }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
