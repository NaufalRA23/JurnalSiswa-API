<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelass = kelas::all();

        return response()->json([
            'kelas' => $kelass
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
        kelas::create($request->all());

        return response()->json([
            'message' => "data berhasil ditambahkan"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas = kelas::query()->find($id);

        return response()->json([
            'kelas' => $kelas
        ]);
    }

    public function search(Request $request)
    {
        $kelass = kelas::query()->where('nama_kelas', 'LIKE','%' . $request->search . '%')->get();
        return response()->json([
            'kelas' => $kelass
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
        $kelas = kelas::query()->find($id);
        $kelas->update($request->all());

        return response()->json([
            'kelas' => $kelas,
            'message' => "data $kelas->id berhasil diedit"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = kelas::query()->find($id);
        $kelas->delete();

        return response()->json([
            'message' => "data $kelas->id berhasil dihapus"
        ]);
    }

}
