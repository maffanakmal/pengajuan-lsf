<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataJabatan = Jabatan::filter(request(['search']))->paginate(10);

        return view('jabatan.index', [
            'title' => 'Jabatan',
        ], compact('dataJabatan'));
    }

    /**
     * Store a newly created resource in storage or update an existing one.
     */
    public function storeOrUpdate(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi_jabatan' => 'required|string|max:255',
        ]);

        // Check if it's an update or create
        if ($request->has('jabatan_id') && $request->jabatan_id) {
            // Update existing jabatan
            $jabatan = Jabatan::findOrFail($request->jabatan_id);
            $jabatan->update($validated);
        } else {
            // Create new jabatan
            Jabatan::create($validated);
        }

        return redirect()->route('jabatan.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jabatan = Jabatan::findOrFail($id);
        $jabatan->delete();

        return redirect()->route('jabatan.index')->with('success', 'Data berhasil dihapus!');
    }
}
