<?php

namespace App\Http\Controllers;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index() {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    public function create() {
        return view('pegawai.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_pegawai' => 'required',
            'nik'          => 'required|numeric|unique:pegawais,nik',
            'alamat'       => 'required',
            'umur'         => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ],[
            'nama_pegawai.required' => 'Nama Pegawai harus diisi.',
            'nik.required'  => 'Nik harus diisi',
            'nik.numeric'  => 'Nik harus berupa angka',
            'nik.unique'  => 'Nik sudah terdaftar',
            'alamat.required' => 'Alamat harus diisi',
            'umur.required' => 'Umur harus berupa angka.',
            'umur.numeric' => 'Umur harus berupa angka.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir haurs berupa tanggal',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin laki-laki atau perempuan',
        ]);

        // Pegawai::create([
        //     'nama_pegawai' => $request->nama_pegawai,
        //     'nik' => $request->nik,
        //     'alamat' => $request->alamat,
        //     'umur' => $request->umur,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        // ]);

        Pegawai::create($request->all());

        return redirect()->route('pegawai.index');
    }

    public function edit(String $id) 
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama_pegawai' => 'required',
            'nik' => 'required|numeric|unique:pegawais,nik,' . $pegawai->id,
            'alamat' => 'required',
            'umur' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ],[
            'nama_pegawai.required' => 'Nama Pegawai harus diisi.',
            'nik.required'  => 'Nik harus diisi',
            'nik.numeric'  => 'Nik harus berupa angka',
            'nik.unique'  => 'Nik sudah terdaftar',
            'alamat.required' => 'Alamat harus diisi',
            'umur.required' => 'Umur harus berupa angka.',
            'umur.numeric' => 'Umur harus berupa angka.',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir haurs berupa tanggal',
            'tempat_lahir.required' => 'Tempat lahir harus diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'jenis_kelamin.in' => 'Jenis kelamin harus laki-laki atau perempuan',
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index');
    }
}
