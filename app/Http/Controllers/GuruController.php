<?php

namespace App\Http\Controllers;

use App\Http\Resources\guru;
use App\Http\Resources\guruResource;
use App\Models\guru as ModelsGuru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = ModelsGuru::all();
        $data = guruResource::collection($gurus);

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
        ModelsGuru::create($request->all());

        return response()->json([
            'message' => "data berhasil ditambahkan"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = ModelsGuru::query()->find($id);
        $data = new guruResource($guru);

        return response()->json([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $gurus = ModelsGuru::query()->whereRelation('Guru', 'name', 'LIKE', '%'. $request->search .'%')->get();
        $data = guruResource::collection($gurus);

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
        $guru = ModelsGuru::query()->find($id);
        $guru->update($request->all());

        return response()->json([
            'guru' => $guru,
            'message' => "data $guru->id berhasil diedit"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = ModelsGuru::query()->find($id);
        $guru->delete();

        return response()->json([
            'message' => "data $guru->id berhasil dihapus"
        ]);
    }
}
