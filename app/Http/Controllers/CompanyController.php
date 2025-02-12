<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Mail\NewCompanyNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('companies.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('public/logos');
            $logoPath = str_replace('public/', '', $path);
        }

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath ?? null,
            'website' => $request->website,
        ]);

        $company->save();

        Mail::to($company->email)->send(new NewCompanyNotification($company));

        return redirect()->route('companies.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.index', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  Company $company)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
            'website' => 'nullable|url',
        ]);

        if ($request->hasFile('logo')) {
            Storage::delete('public/' . $company->logo);
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath ?? $company->logo,
            'website' => $request->website,
        ]);

        return redirect()->route('companies.index')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        Storage::delete('public/' . $company->logo);
        $company->delete();
        return redirect()->route('companies.index');
    }
}
