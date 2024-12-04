<?php

namespace App\Http\Controllers;

use App\Models\Pangkat;
use Illuminate\Http\Request;

class PangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataPangkat = Pangkat::filter(request(['search']))->paginate(10);

        return view('pangkat.index', [
            'title' => 'Pangkat',
        ], compact('dataPangkat'));
    }


    /**
     * Store a newly created resource in storage or update an existing one.
     */
    public function storeOrUpdate(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama_pangkat' => 'required|string|max:255',
            'golongan' => 'required|string|max:255',
        ]);

        // Check if it's an update or create
        if ($request->has('pangkat_id') && $request->pangkat_id) {
            // Update existing pangkat
            $pangkat = Pangkat::findOrFail($request->pangkat_id);
            $pangkat->update($validated);
        } else {
            // Create new pangkat
            Pangkat::create($validated);
        }

        return redirect()->route('pangkat.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pangkat = Pangkat::findOrFail($id);
        $pangkat->delete();

        return redirect()->route('pangkat.index')->with('success', 'Data berhasil dihapus!');
    }
}
