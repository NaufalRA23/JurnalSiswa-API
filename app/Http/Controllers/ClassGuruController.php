<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeacherClassroomResource;
use App\Models\class_guru;
use Illuminate\Http\Request;

class ClassGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class_gurus = class_guru::all();
        $data = TeacherClassroomResource::collection($class_gurus);

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
        class_guru::create($request->all());

        return response()->json([
            'message' => "data berhasil ditambahkan"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class_guru = class_guru::query()->find($id);
        $data = new TeacherClassroomResource($class_guru);

        return response()->json([
            'data' => $data
        ]);
    }

    public function search(Request $request)
    {
        $class_gurus = class_guru::query()->whereRelation('Guru', 'name', 'LIKE', '%'. $request->search .'%')->get();
        $data = TeacherClassroomResource::collection($class_gurus);

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
        $class_guru = class_guru::query()->find($id);
        $class_guru->update($request->all());

        return response()->json([
            'class_guru' => $class_guru,
            'message' => "data $class_guru->id berhasil diedit"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class_guru = class_guru::query()->find($id);
        $class_guru->delete();

        return response()->json([
            'message' => "data $class_guru->id berhasil dihapus"
        ]);
    }
}
