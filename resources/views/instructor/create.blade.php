@extends('layouts.app')
@section('title', 'Create New Instructor')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Major </label>
                    <select name="major_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Name *</label><br>
                    <input type="text" class="form-control" placeholder="Enter your name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="">Phone </label><br>
                    <input type="number" class="form-control" placeholder="Enter phone number" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="">Email *</label><br>
                    <input type="email" class="form-control" placeholder="Enter your email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="">password </label><br>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" required>
                </div>
                <button class="btn btn-outline-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class=" text-secondary bordered">Back</a>
            </form>

        </div>

    </div>

@endsection
