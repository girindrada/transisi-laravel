@extends('layouts.app')

@section('title', 'Company List')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <div class="col-md-12">
            <div class="d-flex justify-content-end align-items-center mb-3">
                <a href="{{ route('companies.create') }}" class="btn btn-primary">
                    {{ __('Add Company') }}
                </a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Company Lists') }}</div>

                <div class="card-body">
                    @if($companies->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-buildings text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No companies found. <a href="{{ route('companies.create') }}">Add your first company</a></p>
                        </div>
                    @else
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Company Logo</th>
                                    <th>Company Name</th>
                                    <th>Company Email</th>
                                    <th>Company Website</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companies as $company)
                                <tr>
                                    <td class="ps-4 text-muted" style="width: 60px;">
                                        {{ ($companies->currentPage() - 1) * $companies->perPage() + $loop->iteration }}
                                    </td>
                                    <td>
                                        <img src="{{ Storage::url($company->logo) }}" alt="{{ $company->name }}" class="company-logo img-fluid rounded" style="max-width: 100px; max-height: 100px;">
                                    </td>
                                    <td>
                                        <span class="fw-semibold">{{ $company->name }}</span>
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $company->email }}" class="text-decoration-none text-black">
                                            <i class="bi bi-envelope me-1"></i>{{ $company->email }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ $company->website }}" target="_blank" class="text-decoration-none text-primary">
                                            {{ $company->website }}
                                        </a>
                                    </td>
                                    <td class="d-flex justify-content-center" style="width: 130px;">
                                        <a href="{{ route('companies.show', $company) }}"
                                        class="btn btn-info btn-action me-1" title="View">
                                            View
                                        </a>
                                        <a href="{{ route('companies.edit', $company) }}"
                                        class="btn btn-warning btn-action me-1" title="Edit">
                                            Edit
                                        </a>
                                        <form action="{{ route('companies.destroy', $company) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Delete {{ $company->name }}? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-action" title="Delete">
                                               Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
