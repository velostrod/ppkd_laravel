@extends('layouts.app')
@section('title', 'Create New Key')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('key.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Locker Code</label>
                    <input type="number" class="form-control @error('name') is_active @enderror" value="{{ old('name') }}"
                        placeholder="Enter locker code" name="name" required>
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
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
