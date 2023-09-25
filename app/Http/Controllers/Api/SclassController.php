<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sclass;

class SclassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sclass::get();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:28'
        ]);

        Sclass::create($validateData);

        return response()->json(['message' => 'Data inserted successfully'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showData = Sclass::find($id);

        if(!$showData){
            return response('Data not found');
        }

        return response()->json($showData);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'class_name' => 'required|unique:sclasses|max:28'
        ]);

        $class = Sclass::find($id);

        $class->update($validateData);

        return response()->json(['message' => 'Data inserted successfully'], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteData = Sclass::find($id);

        if(!$deleteData){
            return response()->json('Class name not found');
        }

        $deleteData->delete();
        return response()->json('Class deleted successfully');
    }
}
