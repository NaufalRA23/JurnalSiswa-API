<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentResource;
use App\Models\murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murids = murid::all();
        $data = StudentResource::collection($murids);

        return response()->json([
            'data' => $data
        ]);
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
        murid::create($request->all());

        return response()->json([
            'message' => "data berhasil ditambahkan"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $murid = murid::query()->find($id);
        $data = new StudentResource($murid);

        return response()->json([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $murids = murid::query()->whereRelation('Murid', 'name', 'LIKE', '%'. $request->search .'%')->get();
        $data = StudentResource::collection($murids);

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $murid = murid::query()->find($id);
        $murid->update($request->all());

        return response()->json([
            'murid' => $murid,
            'message' => "data $murid->id berhasil diedit"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
    {
        $murid = murid::query()->find($id);
        $murid->delete();

        return response()->json([
            'message' => "data $murid->id berhasil dihapus"
        ]);
    }
}
