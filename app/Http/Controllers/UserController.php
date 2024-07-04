<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'user' => $users
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

        $user = User::create($input);

        if ($user) {
            return response()->json([
                'message' => "data berhasil ditambahkan",
                'id' => $user->id,
            ]);
        }

        return response()->json([
            'message' => "gagal menambahkan data"
        ], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()->find($id);

        return response()->json([
            'user' => $user
        ]);
    }

    public function search(Request $request)
    {
        $users = User::query()->where('role', 'LIKE','%' . $request->search . '%')->Orwhere('name', 'LIKE','%' . $request->search . '%')->get();
        return response()->json([
            'user' => $users
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
        $user = User::query()->findOrFail($id);

        $input = $request->all();
        $user->update($request->all());

        if ($request->hasFile('foto')) {
            if ($user->foto && file_exists(public_path('storage/' . $user->foto))) {
                unlink(public_path('storage/' . $user->foto));
            }

            $path = $request->file('foto')->store();
            $input['foto'] = $path;
        }

        $user->update($input);

        return response()->json([
            'user' => $user,
            'message' => "data $user->id berhasil diedit"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::query()->find($id);
        $user->delete();

        return response()->json([
            'message' => "data $user->id berhasil dihapus"
        ]);
    }
}
