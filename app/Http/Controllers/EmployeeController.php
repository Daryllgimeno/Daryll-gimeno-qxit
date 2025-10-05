<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeeFormRequest;

class EmployeeController extends Controller
{
  public function index()
    {
        $employees = Employee::with('company')->paginate(10);  
        return view('employees.index', compact('employees')); 
    }



 public function create(Request $request)
{
    $companyId = $request->get('company_id');
    $companies = Company::all(); 
    return view('employees.create', compact('companies', 'companyId'));
}
//employee form request for validation 
    public function store(EmployeeFormRequest $request)
    {
        Employee::create($request->validated());
        return redirect()->route('employees.index')
            ->with('success', 'Employee created!');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeFormRequest $request, Employee $employee)
    {
        $employee->update($request->validated());
        return redirect()->route('employees.index')
            ->with('success', 'Employee updated!');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully!');
    }
 
   public function companyEmployees(Company $company)
    {
        $employees = $company->employees()->paginate(10);
        return view('Employees.index', compact('employees', 'company'));
    }

    public function createForCompany(Company $company)
{
    return view('Employees.create', compact('company'));
}

}
