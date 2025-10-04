@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="mb-3">
        <h2>Companies</h2>
        <a href="{{ route('companies.create') }}" class="btn btn-success mt-2">Create New Company</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            Company List
        </div>
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $company)
                        <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                @if ($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" width="80" height="80" alt="Logo">
                                @else
                                    No logo
                                @endif
                            </td>
                            <td>{{ $company->website }}</td>
                          <td class="text-center">
    <div class="d-flex justify-content-center gap-2">
        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Delete this company?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form>
    </div>
</td>
                     
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No companies found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $companies->links() }}
    </div>
</div>
@endsection
