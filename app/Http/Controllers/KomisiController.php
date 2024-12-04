<?php

namespace App\Http\Controllers;

use App\Models\Komisi;
use Illuminate\Http\Request;

class KomisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataKomisi = Komisi::filter(request(['search']))->paginate(10);

        return view('komisi.index', [
            'title' => 'Komisi',
        ], compact('dataKomisi'));
    }


    /**
     * Store a newly created resource in storage or update an existing one.
     */
    public function storeOrUpdate(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama_komisi' => 'required|string|max:255',
        ]);

        // Check if it's an update or create
        if ($request->has('komisi_id') && $request->komisi_id) {
            // Update existing Komisi
            $komisi = Komisi::findOrFail($request->komisi_id);
            $komisi->update($validated);
        } else {
            // Create new Komisi
            Komisi::create($validated);
        }

        return redirect()->route('komisi.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $komisi = Komisi::findOrFail($id);
        $komisi->delete();

        return redirect()->route('komisi.index')->with('success', 'Data berhasil dihapus!');
    }
}
