@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="card">
        <div class="card-body py-4 px-5">
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl">
                    <img src="{{ asset('template/dist/assets/images/faces/1.jpg') }}" alt="Face 1">
                </div>
                <div class="ms-3 name">
                    <h5 class="font-bold">Welcome, {{ auth()->user()->name ?? 'Guest' }} </h5>
                    <h6 class="text-muted mb-0">{{ auth()->user()->email ?? '' }}</h6>
                </div>
            </div>


        </div>
    </div>
@endsection
