@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
 
    <div class="card shadow" style="width: 500px;">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add Company</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Website</label>
                    <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                    @error('website') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label>Upload Logo</label>
                    <input type="file" name="logo" class="form-control">
                    @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('companies.index') }}" class="btn btn-secondary me-2">Cancel</a>
                    <button type="submit" class="btn btn-danger">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
