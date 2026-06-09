@extends('layouts.app')
@section('title', 'Edit Major')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('major.update', $edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Name </label>
                    <input type="name" class="form-control" placeholder="Enter name" name="name"
                        value="{{ $edit->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="">Status </label><br>
                    <input type="radio" name="is_active" value="1"
                        {{ $edit->is_active == 1 ? 'checked' : '' }}>Active

                    <input type="radio" name="is_active" value="0" {{ $edit->is_active == 0 ? 'checked' : '' }}>In
                    Active
                </div>

                <button class="btn btn-outline-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>

        </div>

    </div>

@endsection
