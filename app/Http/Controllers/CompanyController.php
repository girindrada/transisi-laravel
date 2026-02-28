<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportEmployeeRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Imports\EmployeeImport;
use App\Models\Company;
use App\Repository\Contracts\CompanyRepositoryInterface;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel; 

class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyRepository->getAllCompanies();

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {   
        $validated = $request->validated();
        $filename = now()->format('YmdHis') . '.' . $request->file('logo')->extension();
        $validated['logo'] = $request->file('logo')->storeAs('company', $filename, 'public');
        // dd($validated);

        $this->companyRepository->createCompany($validated);

        return redirect()->route('companies.index')->with('success', 'Company berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $validated = $request->validated();
        
        if ($request->hasFile('logo')) {
            $filename = now()->format('YmdHis') . '.' . $request->file('logo')->extension();
            $validated['logo'] = $request->file('logo')->storeAs('company', $filename, 'public');
        }

        $this->companyRepository->updateCompany($validated, $company->id);

        return redirect()->route('companies.index')->with('success', 'Company berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        try {
            $this->companyRepository->deleteCompany($company->id);

            return redirect()->route('companies.index')->with('success', 'Company berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Export company details and employees to PDF.
     * Didnt use snappy because it has some issues in Mac, so I use dompdf instead
     */
    public function exportPdf(Company $company)
    {
        $employees = $company->employees;

        $pdf = Pdf::loadView('company.export-pdf', compact('company', 'employees'))
            ->setPaper('a4', 'portrait');

        return $pdf->download("employees-{$company->name}.pdf");
    }

    public function importEmployees(ImportEmployeeRequest $request, Company $company)
    {
        Excel::import(new EmployeeImport($company->id), $request->file('file'));

        return redirect()->route('companies.show', $company)->with('success', 'Employees berhasil diimport.');
    }

    public function select2(Request $request)
    {
        $search = $request->search;
        $companies = Company::when($search, fn($query) => $query->where('name', 'like', "%{$search}%"))->paginate(10);

        return response()->json($companies);
    }
}
