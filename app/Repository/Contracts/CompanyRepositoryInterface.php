<?php

namespace App\Repository\Contracts;

interface CompanyRepositoryInterface
{
    public function getAllCompanies();

    public function getCompanyById(int $id);

    public function createCompany(array $data);

    public function updateCompany(array $data, int $id);

    public function deleteCompany(int $id);
}