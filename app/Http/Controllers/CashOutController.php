<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use Illuminate\Http\Request;

class CashOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.rekapitulasi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(CashOut $cashOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CashOut $cashOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CashOut $cashOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CashOut $cashOut)
    {
        //
    }
}
