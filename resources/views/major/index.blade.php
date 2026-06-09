@extends('layouts.app')
@section('title', 'Major Management')
@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? '' }} </h3>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('major.create') }}" class="btn btn-primary">Create New Major</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($majors as $index => $major)
                        <tr>
                            <td> {{ $index += 1 }}</td>
                            <td> {{ $major->name ?? '' }}</td>
                            <td>
                                @if ($major->is_active == 1)
                                    <span class="badge text-white bg-primary">Active</span>
                                @else
                                    <span class="badge text-white bg-danger">In Active</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('major.edit', $major->id) }}" class="btn btn-outline-primary icon">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('major.destroy', $major->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <Button class="btn btn-outline-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </Button>
                                </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
