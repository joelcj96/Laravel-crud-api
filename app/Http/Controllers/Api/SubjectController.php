<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getData = Subject::get();
        return response()->json($getData);
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'class_id' => 'required|unique:subjects|max:25',
            'subject_name' => 'required|max:30'
        ]);

        Subject::create($data);
        return response()->json('Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $show = Subject::find($id);
        return response()->json($show);
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateData = $request->validate([
            'class_id' => 'required|unique:subjetcs|max:25',
            'subject_name' => 'required|max:30'
        ]);

        $newData = Subject::find($id);
        $newData->update($updateData);

        return response()->json('Data created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $drop = Subject::find($id);
        $drop->delete();
    }
}
