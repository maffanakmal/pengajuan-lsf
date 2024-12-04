<?php

namespace App\Http\Controllers;

use App\Models\Komisi;
use App\Models\Subkomisi;
use Illuminate\Http\Request;

class SubkomisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataSubkomisi = Subkomisi::filter(request(['search']))->paginate(10);
        $komisiList = Komisi::all();

        return view('subkomisi.index', [
            'title' => 'Subkomisi',
            'komisiList' => $komisiList,
        ], compact('dataSubkomisi'));
    }


    /**
     * Store a newly created resource in storage or update an existing one.
     */
    public function storeOrUpdate(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'nama_subkomisi' => 'required|unique:subkomisi|string|max:255',
            'komisi_id' => 'required|exists:komisi,komisi_id', // Ensure komisi_id is valid
        ]);

        // Check if it's an update or create
        if ($request->has('subkomisi_id') && $request->subkomisi_id) {
            // Update existing subkomisi
            $subkomisi = Subkomisi::findOrFail($request->subkomisi_id);
            $subkomisi->update($validated);
        } else {
            // Create new subkomisi
            Subkomisi::create($validated);
        }

        return redirect()->route('subkomisi.index')->with('success', 'Data berhasil disimpan!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subkomisi = Subkomisi::findOrFail($id);
        $subkomisi->delete();

        return redirect()->route('subkomisi.index')->with('success', 'Data berhasil dihapus!');
    }
}
