@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow" style="width: 500px;">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Add Employee</h4>
    
        </div>
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" required>
                    @error('first_name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" required>
                    @error('last_name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Company</label>
                    @isset($company)
                        <input type="hidden" name="company_id" value="{{ $company->id }}">
                        <p class="form-control-plaintext">{{ $company->name }}</p>
                    @else
                        <select name="company_id" class="form-control" required>
                            <option value="">Select Company</option>
                            @foreach($companies as $companyItem)
                                <option value="{{ $companyItem->id }}" {{ old('company_id') == $companyItem->id ? 'selected' : '' }}>
                                    {{ $companyItem->name }}
                                </option>
                            @endforeach
                        </select>
                    @endisset
                    @error('company_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                    @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    @isset($company)
                        <a href="{{ route('companies.employees', $company->id) }}" class="btn btn-secondary me-2">Cancel</a>
                    @else
                        <a href="{{ route('employees.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    @endisset
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
