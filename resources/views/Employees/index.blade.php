@extends('layouts.app')

@section('content')
<div class="container mt-5">

<div class="d-flex justify-content-start align-items-center mb-4 gap-2">
    @isset($company)
        <a href="{{ route('companies.employees.create', $company->id) }}" class="btn btn-danger shadow-sm">
            <i class="bi bi-plus-circle"></i> Add Employee
        </a>
        <a href="{{ route('companies.index') }}" class="btn btn-warning shadow-sm">
            <i class="bi bi-building"></i> Back to Companies
        </a>
    @else
        <a href="{{ route('employees.create') }}" class="btn btn-danger shadow-sm">
            <i class="bi bi-plus-circle"></i> Add Employee
        </a>
        <a href="{{ route('companies.index') }}" class="btn btn-warning shadow-sm">
            <i class="bi bi-building"></i> Back to Companies
        </a>
    @endisset
</div>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-header bg-light">
            Employee List
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->company->name ?? '-' }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this employee?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $employees->links() }}
    </div>

</div>
@endsection
