<?php

namespace App\Http\Controllers;

use App\Models\ProjecFeature;
use Illuminate\Http\Request;

class ProjecFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method can be used to return a view for creating a new project feature
        // For example, you might return a view with a form to create a new feature
        return view('portfolio.crate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjecFeature $projecFeature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjecFeature $projecFeature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProjecFeature $projecFeature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjecFeature $projecFeature)
    {
        //
    }
}
