<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentClassroom;
use App\Models\kelas_siswa;
use Illuminate\Http\Request;

class KelasSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas_siswas = kelas_siswa::all();
        $data = StudentClassroom::collection($kelas_siswas);

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
        kelas_siswa::create($request->all());

        return response()->json([
            'message' => "data berhasil ditambahkan"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelas_siswa = kelas_siswa::query()->find($id);
        $data = new StudentClassroom($kelas_siswa);

        return response()->json([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $kelas_siswas = kelas_siswa::query()->whereRelation('Siswa', 'name', 'LIKE', '%'. $request->search .'%')->get();
        $data = StudentClassroom::collection($kelas_siswas);

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
        $kelas_siswa = kelas_siswa::query()->find($id);
        $kelas_siswa->update($request->all());

        return response()->json([
            'kelas_siswa' => $kelas_siswa,
            'message' => "data $kelas_siswa->id berhasil diedit"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas_siswa = kelas_siswa::query()->find($id);
        $kelas_siswa->delete();

        return response()->json([
            'message' => "data $kelas_siswa->id berhasil dihapus"
        ]);
    }
}
