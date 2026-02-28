<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class EmployeeImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation
{
    public function __construct(protected int $companyId) {}

    public function model(array $row)
    {
        return new Employee([
            'name'       => $row['name'],
            'email'      => $row['email'],
            'company_id' => $this->companyId,
        ]);
    }

    public function chunkSize(): int
    {
        return 10;
    }

    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
        ];
    }
}
