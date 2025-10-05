<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyFormRequest;
use Illuminate\Support\Facades\Storage;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies=Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(CompanyFormRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('logos', 'public');
        $data['logo'] = $path;
    }

    Company::create($data);

    return redirect()->route('companies.index')
        ->with('success', 'Company created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
   return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(CompanyFormRequest $request, string $id)
{
    $company = Company::findOrFail($id);
    $data = $request->validated();

   
    if ($request->has('remove_logo')) {
        if ($company->logo && Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }
        $data['logo'] = null; 
    }

   
    if ($request->hasFile('logo')) {
        if ($company->logo && Storage::disk('public')->exists($company->logo)) {
            Storage::disk('public')->delete($company->logo);
        }
        $path = $request->file('logo')->store('logos', 'public');
        $data['logo'] = $path;
    }

    $company->update($data);

    return redirect()->route('companies.index')
        ->with('success', 'Company updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $company = Company::findOrFail($id);
    //delete also the logo in the storage
    if ($company->logo && Storage::disk('public')->exists($company->logo)) {
        Storage::disk('public')->delete($company->logo);
    }

    $company->delete();

    return redirect()->route('companies.index')
        ->with('success', 'Company deleted successfully');
}

}
