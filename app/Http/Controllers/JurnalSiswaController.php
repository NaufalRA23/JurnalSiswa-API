<?php

namespace App\Http\Controllers;

use App\Http\Resources\Jurnal;
use App\Models\jurnal_siswa;
use Illuminate\Http\Request;

class JurnalSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurnal_siswas = jurnal_siswa::all();
        $data = Jurnal::collection($jurnal_siswas);

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
        $input = $request->all();
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store();
            $input['foto'] = $path;
        }

        jurnal_siswa::create($input);

        return response()->json([
            'message' => "data berhasil ditambahkan"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jurnal_siswa = jurnal_siswa::query()->find($id);
        $data = new Jurnal($jurnal_siswa);

        return response()->json([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $jurnal_siswas = jurnal_siswa::query()->whereRelation('murid', 'name', 'LIKE', '%'. $request->search .'%')->get();
        $data = Jurnal::collection($jurnal_siswas);

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
        $jurnal_siswa = jurnal_siswa::query()->findOrFail($id);

        $input = $request->all();
        $jurnal_siswa->update($request->all());

        if ($request->hasFile('foto')) {
            if ($jurnal_siswa->foto && file_exists(public_path('storage/' . $jurnal_siswa->foto))) {
                unlink(public_path('storage/' . $jurnal_siswa->foto));
            }

            $path = $request->file('foto')->store();
            $input['foto'] = $path;
        }

        $jurnal_siswa->update($input);

        return response()->json([
            'jurnal_siswa' => $jurnal_siswa,
            'message' => "data berhasil diedit"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurnal_siswa = jurnal_siswa::query()->find($id);
        $jurnal_siswa->delete();

        return response()->json([
            'message' => "data $jurnal_siswa->id berhasil dihapus"
        ]);
    }
}
