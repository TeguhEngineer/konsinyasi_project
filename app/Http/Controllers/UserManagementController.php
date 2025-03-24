<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->query('per_page', 10);
        $search = $request->query('search');

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
            ->paginate($perPage)
            ->appends(request()->query());

        return view('pages.users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|string'
        ], [
            '*.required' => 'Field tidak boleh kosong.',
            'email.unique' => 'Email sudah terdaftar.',
            'email.email' => 'Format email tidak valid.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // dd($validateData);

        try {
            $validateData['password'] = Hash::make($validateData['password']);
            User::create($validateData);

            return redirect()->route('users.index')->with('success', 'Data berhasil disimpan.');
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
        User::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        $ids = explode(',', $request->ids);
        if (!empty($ids)) {
            User::whereIn('id', $ids)->where('role', '!=', 'admin')->delete();
            return redirect()->back()->with('success', 'Data berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }
}
