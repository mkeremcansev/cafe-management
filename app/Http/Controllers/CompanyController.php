<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;

class CompanyController extends Controller
{

    public function __construct(public Company $company)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('pages.company.edit')->withCompany($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->validated());

        return back();
    }
}
