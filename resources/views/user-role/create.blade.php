@extends('layouts.app')
@section('title', 'Create New Role')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('user-role.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="">User *</label>
                    <select name="user_id" class="form-control" id="">
                        <option value="">Select One</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Role * </label><br>
                    <select name="role_ids" class="form-control" id="" required multiple>
                        <option value="">Select One</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-outline-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class=" text-secondary bordered">Back</a>
            </form>

        </div>

    </div>

@endsection
