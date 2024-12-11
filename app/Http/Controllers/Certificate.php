<?php

namespace App\Http\Controllers;

use App\Models\Certificate as ModelsCertificate;
use Illuminate\Http\Request;

class Certificate extends Controller
{
    /**
     * Menampilkan daftar semua sertifikat.
     */
    public function index()
    {
        $certificates = ModelsCertificate::all();
        return view('admin.certificates.index', compact('certificates'));
    }

    /**
     * Menampilkan form untuk menambah sertifikat baru.
     */
    public function create()
    {
        return view('admin.certificates.create');
    }

    /**
     * Menyimpan sertifikat baru ke dalam database.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issued_at' => 'required|string|max:255',
            'description' => 'required',
            'file' => 'nullable|mimes:pdf|max:10000'
        ]);

        if ($request->hasFile('file')) {
            // Menyimpan file yang diunggah ke storage/public/file
            $data['file'] = $request->file('file')->store('file', 'public');
        }

        // Membuat data sertifikat baru di database
        ModelsCertificate::create($data);

        // Redirect ke halaman daftar sertifikat dengan pesan sukses
        return redirect()->route('certificates.index')
            ->with('success', 'Sertifikat berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail sertifikat berdasarkan ID.
     */
    public function show(ModelsCertificate $certificate)
    {
        return view('admin.certificates.show', compact('certificate'));
    }

    /**
     * Menampilkan form untuk mengedit sertifikat.
     */
    public function edit(ModelsCertificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    /**
     * Mengupdate sertifikat yang sudah ada di database.
     */
    public function update(Request $request, ModelsCertificate $certificate)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issued_at' => 'required|string|max:255',
            'description' => 'required',
            'file' => 'nullable|mimes:pdf|max:10000'
        ]);

        if ($request->hasFile('file')) {
            // Jika ada file baru, simpan file tersebut
            $data['file'] = $request->file('file')->store('file', 'public');
        }

        // Update data sertifikat yang sudah ada
        $certificate->update($data);

        // Redirect ke halaman daftar sertifikat dengan pesan sukses
        return redirect()->route('admin.certificates.index')
            ->with('success', 'Sertifikat berhasil diupdate.');
    }

    /**
     * Menghapus sertifikat dari database.
     */
    public function destroy(ModelsCertificate $certificate)
    {
        // Menghapus sertifikat dari database
        $certificate->delete();

        // Redirect ke halaman daftar sertifikat dengan pesan sukses
        return redirect()->route('admin.certificates.index')
            ->with('success', 'Sertifikat berhasil dihapus.');
    }
}
