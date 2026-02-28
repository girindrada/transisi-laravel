<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Repository\Contracts\CompanyRepositoryInterface;
use App\Repository\Contracts\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    private $employeeRepository;
    private $companyRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository, CompanyRepositoryInterface $companyRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->companyRepository = $companyRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = $this->employeeRepository->getAllEmployees();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $companies = $this->companyRepository->getAllCompanies();

       return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeRepository->createEmployee($request->validated());

        return redirect()->route('employees.index')->with('success', 'Employee berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        $companies = $this->companyRepository->getAllCompanies();

        return view('employee.show', compact('employee', 'companies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = $this->companyRepository->getAllCompanies();

        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        $this->employeeRepository->updateEmployee($request->validated(), $employee->id);

        return redirect()->route('employees.index')->with('success', 'Employee berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $this->employeeRepository->deleteEmployee($employee->id);

        return redirect()->route('employees.index')->with('success', 'Employee berhasil dihapus.');
    }
}
