@extends('layouts.app')
@section('title', 'Edit User')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $edit->id) }}" method="POST">
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
                <div class="mb-3">
                    <label for="">Role * </label><br>
                    <select name="role_ids[]" class="form-control" id="" required multiple>
                        <option value="">Select One</option>
                        @foreach ($roles as $role)
                            <option @selected(in_array($role->id, $edit->roles->pluck('id')->all())) value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-secondary">
                        * Can choose more than one role
                    </small>
                </div>
                <button class="btn btn-outline-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>

        </div>

    </div>

@endsection
