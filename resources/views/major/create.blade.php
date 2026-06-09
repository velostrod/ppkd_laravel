@extends('layouts.app')
@section('title', 'Create New Major')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('major.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Name </label>
                    <input type="name" class="form-control" placeholder="Enter name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="">Status </label><br>
                    <input type="radio" name="is_active" value="1" checked>Active
                    <input type="radio" name="is_active" value="0">In Active
                </div>

                <button class="btn btn-outline-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class=" text-secondary bordered">Back</a>
            </form>

        </div>

    </div>

@endsection
