<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $search = $request->query('search');

        $distributors = Distributor::when($search, function ($query) use ($search) {
            return $query->where('nama_toko', 'like', '%' . $search . '%');
        })
            ->paginate($perPage)
            ->appends(request()->query());

        return view('pages.distributor.index', compact('distributors'))
            ->with('i', (request()->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.distributor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_toko' => 'required|string|max:255',
            'telepon' => 'required|integer',
            'alamat' => 'required',
            'maps' => 'required',
            'persen_bagi_hasil' => 'required|integer',
            'status' => 'required|string'
        ], [
            '*.required' => 'Field tidak boleh kosong.',
            '*.integer' => 'Field harus berupa angka.',
            '*.string' => 'Field harus berupa string.',
        ]);

        // dd($validateData);

        try {
            Distributor::create($validateData);

            return redirect()->route('distributors.index')->with('success', 'Data berhasil disimpan.');
        } catch (\Throwable $th) {
            Log::error('Error saat menyimpan data: ' . $th->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Distributor::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = explode(',', $request->ids);
        if (!empty($ids)) {
            Distributor::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }
}
