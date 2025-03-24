<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProdukCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $search = $request->query('search');

        $produks = Produk::when($search, function ($query) use ($search) {
            return $query->where('nama_produk', 'like', '%' . $search . '%');
        })
            ->paginate($perPage)
            ->appends(request()->query());

        return view('pages.produk.index', compact('produks'))
            ->with('i', (request()->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga_produk' => 'required',
            'deskripsi' => 'required|string',
            'status' => 'required|string'
        ], [
            '*.required' => 'Field tidak boleh kosong.',
            '*.integer' => 'Field harus berupa angka.',
            '*.string' => 'Field harus berupa string.',
        ]);

        // dd($validateData);

        try {
            Produk::create($validateData);

            return redirect()->route('produks.index')->with('success', 'Data berhasil disimpan.');
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
        Produk::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = explode(',', $request->ids);
        if (!empty($ids)) {
            Produk::whereIn('id', $ids)->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }
}
