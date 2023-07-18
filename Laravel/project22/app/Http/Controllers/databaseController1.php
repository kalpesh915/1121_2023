<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class databaseController1 extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response(["message"=>"index Called"], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return response(["message"=>"create Called"], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return response(["message"=>"store Called"], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return response(["message"=>"show Called"], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return response(["message"=>"edit Called"], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return response(["message"=>"update Called"], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return response(["message"=>"destroy Called"], 200);
    }
}
