@extends('layouts.app')

@section('title', 'Companies')

@section('content')
<div class="container">
    <h2 class="mb-4">Companies</h2>

    <a href="{{ route('companies.create') }}" class="btn btn-success mb-3">Create new company</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                @if($company->logo)
                                    <img src="{{ asset('storage/'.$company->logo) }}" width="50" class="rounded-circle">
                                @endif
                            </td>
                            <td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
                            <td>
                                <a href="{{ route('companies.edit', $company) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $companies->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
