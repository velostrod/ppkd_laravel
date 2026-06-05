@extends('layouts.app')
@section('title', 'Create New User')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('role.update', $edit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="name" class="form-control" placeholder="Enter name" name="name"
                        value="{{ $edit->name }}">
                </div>
                <div class="mb-3">
                    <label for="">Email *</label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email"
                        value="{{ $edit->email }}">
                </div>
                <div class="mb-3">
                    <label for="">Password *</label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>

        </div>

    </div>

@endsection
