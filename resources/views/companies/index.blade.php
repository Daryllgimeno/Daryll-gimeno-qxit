@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-start align-items-center mb-4 gap-2">
        <a href="{{ route('companies.create') }}" class="btn btn-success shadow-sm">
            <i class="bi bi-plus-circle"></i> Create New Company
        </a>

        <a href="{{ route('employees.index') }}" class="btn btn-info shadow-sm">
            <i class="bi bi-people"></i> All Employees
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-light">
            Company List
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website ?? '-' }}</td>
                            <td>
                                @if($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" width="50" height="50">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $company->address }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this company?')">Delete</button>
                                    </form>

                                    <a href="{{ route('companies.employees', $company->id) }}" class="btn btn-sm btn-info">
                                        Manage Employees
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No companies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
