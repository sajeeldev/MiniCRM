@extends('layouts.app')

@section('title', 'Create Company')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Company</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Company Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Website</label>
                    <input type="url" name="website" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Logo (Min: 100x100)</label>
                    <input type="file" name="logo" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
