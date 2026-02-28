<?php

namespace App\Repository;   


use App\Repository\Contracts\EmployeeRepositoryInterface;
use App\Models\Employee;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    public function getAllEmployees()
    {
        return Employee::with('company')->paginate(5);
    }

    public function getEmployeeById(int $id)
    {
        return Employee::with('company')->findOrFail($id);
    }

    public function createEmployee(array $data)
    {
        return Employee::create($data);
    }

    public function updateEmployee(array $data, int $id)
    {
        $employee = Employee::findOrFail($id);

        $employee->update($data);

        return $employee;
    }

    public function deleteEmployee(int $id)
    {
        $employee = Employee::findOrFail($id);

        return $employee->delete();
    }
}