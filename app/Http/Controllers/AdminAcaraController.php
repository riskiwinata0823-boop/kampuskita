<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use Illuminate\Http\Request;

class AdminAcaraController extends Controller
{
    public function index()
    {
        $acaras = Acara::latest()->get();

        return view('admin.acara.index', compact('acaras'));
    }

    public function create()
    {
        return view('admin.acara.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_acara' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'lokasi' => ['required', 'string', 'max:255'],
            'tanggal_mulai' => ['required', 'date', 'after:now'],
            'tanggal_selesai' => [
                'nullable',
                'date',
                'after:tanggal_mulai',
            ],
            'harga_tiket' => ['required', 'numeric', 'min:0'],
            'kuota' => ['required', 'integer', 'min:1'],
        ]);

        Acara::create($data);

        return redirect()
            ->route('admin.acara.index')
            ->with('success', 'Acara berhasil ditambahkan.');
    }
}