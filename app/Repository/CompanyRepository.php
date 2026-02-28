<?php

namespace App\Repository;

use App\Repository\Contracts\CompanyRepositoryInterface;
use App\Models\Company;

class CompanyRepository implements CompanyRepositoryInterface
{
    public function getAllCompanies()
    {
        return Company::paginate(5);
    }

    public function getCompanyById(int $id)
    {
        return Company::findOrFail($id);
    }

    public function createCompany(array $data)
    {
        return Company::create($data);
    }

    public function updateCompany(array $data, int $id)
    {
        $company = Company::findOrFail($id);

        $company->update($data);

        return $company;
    }

    public function deleteCompany(int $id)
    {
        $company = Company::findOrFail($id);

        return $company->delete();
    }
}