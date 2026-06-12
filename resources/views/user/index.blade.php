@extends('layouts.app')
@section('title', 'User Management')
@section('content')
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? '' }} </h3>
        <div class="card-body">
            <div class="mb-3" align="right">
                <a href="{{ route('user.create') }}" class="btn btn-primary">Create New User</a>
            </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td> {{ $index += 1 }}</td>
                            <td> {{ $user->name ?? '' }}</td>
                            <td> {{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                    <span class="badge bg-info">{{ $role->name ?? '-' }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-outline-success icon">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                    class="d-inline form-delete">
                                    @csrf
                                    @method('DELETE')

                                    <Button type="button" class="btn btn-outline-danger icon btn-delete">
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
    <script>
        document.addEventListener('click', function(e) {

            const button = e.target.closest('.btn-delete');

            if (button) {
                e.preventDefault();
                const form = button.closest('.form-delete');

                Swal.fire({
                    title: 'Are you sure want to delete this user??',
                    text: "Deleted user data cannot be recovered!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, im sure!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            }
        });
    </script>

@endsection
