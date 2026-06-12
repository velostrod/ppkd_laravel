@extends('layouts.app')
@section('title', 'Create New User')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="name" class="form-control" placeholder="Enter name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="">Email *</label>
                    <input type="email" class="form-control" placeholder="Enter Email" name="email">
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
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-secondary">
                        * Can choose more than one role
                    </small>
                </div>

                {{-- <div class="row mb-3">
                    <div class="col-12"><br>
                        <label class="form-label d-block">Assign to Roles</label>
                        @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="role_id" id="role-{{ $role->id }}"
                                    value="{{ $role->id }}">
                                <label for="role-{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div> --}}

                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>

        </div>

    </div>

@endsection
