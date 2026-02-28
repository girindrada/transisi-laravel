<?php

namespace App\Repository\Contracts;

interface EmployeeRepositoryInterface
{
    public function getAllEmployees();

    public function getEmployeeById(int $id);

    public function createEmployee(array $data);

    public function updateEmployee(array $data, int $id);

    public function deleteEmployee(int $id);
}