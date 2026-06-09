@extends('layouts.app')
@section('title', 'Edit Student')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('student.update', $edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select name="major_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option {{ $major->id == $edit->major_id ? 'selected' : '' }} value="{{ $major->id }}">
                                {{ $major->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Name </label><br>
                    <input type="text" class="form-control" placeholder="Enter name" name="name"
                        value="{{ $edit->name }}">
                </div>
                <div class="mb-3">
                    <label for="">Phone </label><br>
                    <input type="number" class="form-control" placeholder="Enter phone number" name="phone"
                        value="{{ $edit->phone }}">
                </div>

                <button class="btn btn-outline-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>

        </div>

    </div>

@endsection
