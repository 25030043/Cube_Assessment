<?php

namespace App\Http\Controllers;

use App\Models\DevProjectData;
use Illuminate\Http\Request;
use App\Models\ProductVariant;

class DevProjectDataController extends Controller
{
	public function index()
    {
        $devprojectdata = DevProjectData::all();
        return view('devprojectdata.index', compact('devprojectdata'));
    }
	
    public function show(DevProjectData $devprojectdata)
    {
        return view('devprojectdata.show', compact('devprojectdata')); 
    }

    public function create()
    {
        return view('devprojectdata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:devprojectsdata,slug',
        ]);

        $devprojectdata = new DevProjectData();

        $devprojectdata->name = $request->input('name');
        $devprojectdata->slug = $request->input('slug');

        // Save the dev project data
        $devprojectdata->save();

        // Redirect to the appropriate page
        return redirect()->route('devprojectdata.show', $devprojectdata->id);
    }

    public function edit(DevProjectData $devprojectdata)
    {
        return view('devprojectdata.edit', compact('devprojectdata'));
    }

    public function update(Request $request, DevProjectData $devprojectdata)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:devprojectsdata,slug,' . $devprojectdata->id,
        ]);

        // Update the dev project data properties based on the request data
        $devprojectdata->name = $request->input('name');
        $devprojectdata->slug = $request->input('slug');

        // Save the dev project data
        $devprojectdata->save();

        // Redirect to the appropriate page
        return redirect()->route('devprojectdata.show', $devprojectdata->id);
    }

    public function destroy(DevProjectData $devprojectdata)
    {
        // Delete the dev project data from storage
        $devprojectdata->delete();

        // Redirect to the appropriate page
        return redirect()->route('devprojectdata.index');
    }

    public function showVariants(DevProjectData $devprojectdata)
    {
        $variants = $devprojectdata->variants;
        return view('devprojectdata.variants', compact('devprojectdata', 'variants'));
    }
}

