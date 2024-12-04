<?php

namespace App\Http\Controllers;

use App\Models\Unitkerja;
use Illuminate\Http\Request;

class UnitkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUnitkerja = Unitkerja::filter(request(['search']))->paginate(10);

        return view('unit-kerja.index', [
            'title' => 'Unit Kerja',
        ], compact('dataUnitkerja'));
    }


    /**
     * Store a newly created resource in storage or update an existing one.
     */
    public function storeOrUpdate(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama_unit' => 'required|unique:unitkerja|string|max:255',
            'deskripsi_unit' => 'required|string|max:255',
            'lokasi_unit' => 'required|string|max:255',
        ]);

        // Check if it's an update or create
        if ($request->has('unitkerja_id') && $request->unitkerja_id) {
            // Update existing unitkerja
            $unitkerja = Unitkerja::findOrFail($request->unitkerja_id);
            $unitkerja->update($validated);
        } else {
            // Create new Komisi
            Unitkerja::create($validated);
        }

        return redirect()->route('unit-kerja.index')->with('success', 'Data berhasil disimpan!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unitkerja = Unitkerja::findOrFail($id);
        $unitkerja->delete();

        return redirect()->route('unit-kerja.index')->with('success', 'Data berhasil dihapus!');
    }
}
