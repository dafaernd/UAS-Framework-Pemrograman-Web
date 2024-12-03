<?php

namespace App\Http\Controllers;

use App\Exports\MahasiswaExport;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view("master-data.mahasiswa-master.index-mahasiswa", compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master-data.mahasiswa-master.create-mahasiswa");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $validasi_data = $request->validate([
            'npm' => 'required|string|max:15',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:50',
        ]);

        Mahasiswa::create($validasi_data);

        return redirect()->back()->with('success', 'Data Mahasiswa berhasil dibuat');
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
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('master-data.mahasiswa-master.edit-mahasiswa', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'npm' => 'required|string|max:15',
            'nama' => 'required|string|max:255',
            'prodi' => 'required|string|max:50',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
        ]);

        return redirect()->back()->with('success', 'Data Mahasiswa Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if($mahasiswa){
            $mahasiswa->delete();
            return redirect()->back()->with('success', 'Data mahasiswa berhasil dihapus.');
        }
        return redirect()->back()->with('error', 'Data mahasiswa tidak ditemukan');
    }

    public function exportExcel(){
        return Excel::download(new MahasiswaExport, 'data_mahasiswa.xlsx');
    }

}
