@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">

    <div class="card shadow" style="width: 500px;">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Edit Company</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Name </label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $company->name) }}" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $company->email) }}">
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control" value="{{ old('website', $company->website) }}">
                    @error('website') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Logo</label><br>
                    @if ($company->logo && file_exists(public_path('storage/' . $company->logo)))
                        <img src="{{ asset('storage/' . $company->logo) }}" width="100" height="100" class="rounded border mb-2" alt="Logo"><br>
                    @endif
                    <input type="file" name="logo" class="form-control">
                    @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
