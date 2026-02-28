@extends('layouts.app')

@section('title', 'Employee List')

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
                <a href="{{ route('employees.create') }}" class="btn btn-primary">
                    {{ __('Add Employee') }}
                </a>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Employee Lists') }}</div>

                <div class="card-body">
                    @if($employees->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-person text-muted" style="font-size: 3rem;"></i>
                            <p class="text-muted mt-3">No employees found. <a href="{{ route('employees.create') }}">Add your first employee</a></p>
                        </div>
                    @else
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                <tr>
                                    <td class="ps-4 text-muted" style="width: 60px;">
                                        {{ ($employees->currentPage() - 1) * $employees->perPage() + $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $employee->name }}
                                    </td>
                                    <td>
                                        <a href="mailto:{{ $employee->email }}" class="text-decoration-none text-black">
                                            <i class="bi bi-envelope me-1"></i>{{ $employee->email }}
                                        </a>
                                    </td>

                                    <td>
                                        <span class="fw-semibold">{{ $employee->company->name }}</span>
                                    </td>
                              
                                    <td class="d-flex justify-content-center" style="width: 130px;">
                                        <a href="{{ route('employees.show', $employee) }}"
                                        class="btn btn-info btn-action me-1" title="View">
                                            View
                                        </a>
                                        <a href="{{ route('employees.edit', $employee) }}"
                                        class="btn btn-warning btn-action me-1" title="Edit">
                                            Edit
                                        </a>
                                        <form action="{{ route('employees.destroy', $employee) }}" method="POST" class="d-inline"
                                            onsubmit="return confirm('Delete {{ $employee->name }}? This action cannot be undone.')">
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

                    <div class="mt-3 d-flex justify-content-end">
                        {{ $employees->links() }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection