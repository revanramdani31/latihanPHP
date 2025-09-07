<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;

    public function __construct()
    {
        $this->mahasiswaModel = new MahasiswaModel();
    }

    public function index()
    {

        $model = new MahasiswaModel();
        $keyword = $this->request->getGet('keyword');

        if ($keyword) {
            $data['mahasiswa'] = $model->searchMahasiswa($keyword);
        } else {
            $data['mahasiswa'] = $model->getMahasiswa();
        }

        return view('mahasiswa/display_mahasiswa', $data);
    }

    // Tampilkan form tambah
    public function tambah()
    {
        return view('mahasiswa/tambah');
    }

    public function simpan()
    {
        // Aturan validasi
        $rules = [
            'nim' => [
                'rules' => 'required|numeric|min_length[8]|max_length[12]|is_unique[mahasiswa.nim]',
                'errors' => [
                    'required' => 'NIM wajib diisi.',
                    'numeric' => 'NIM hanya boleh angka.',
                    'min_length' => 'NIM minimal 8 digit.',
                    'max_length' => 'NIM maksimal 12 digit.',
                    'is_unique' => 'NIM sudah terdaftar.'
                ]
            ],
            'nama' => [
                'rules' => 'required|min_length[3]|max_length[50]',
                'errors' => [
                    'required' => 'Nama wajib diisi.',
                    'min_length' => 'Nama minimal 3 huruf.',
                    'max_length' => 'Nama maksimal 50 huruf.'
                ]
            ],
            'umur' => [
                'rules' => 'required|numeric|greater_than_equal_to[10]|less_than_equal_to[100]',
                'errors' => [
                    'required' => 'Umur wajib diisi.',
                    'numeric' => 'Umur hanya boleh angka.',
                    'greater_than_equal_to' => 'Umur minimal 10 tahun.',
                    'less_than_equal_to' => 'Umur maksimal 100 tahun.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Jika validasi lolos → simpan data
        $this->mahasiswaModel->save([
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Tampilkan detail
    public function detail($id)
    {
        $data['m'] = $this->mahasiswaModel->find($id);
        return view('mahasiswa/detail', $data);
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $data['m'] = $this->mahasiswaModel->find($id);
        return view('mahasiswa/edit', $data);
    }

    // Update data
    public function update($id)
{
    // Aturan validasi
    $rules = [
        'nim' => [
            'rules' => 'required|numeric|min_length[8]|max_length[12]|is_unique[mahasiswa.nim,id,'.$id.']',
            'errors' => [
                'required' => 'NIM wajib diisi.',
                'numeric' => 'NIM hanya boleh angka.',
                'min_length' => 'NIM minimal 8 digit.',
                'max_length' => 'NIM maksimal 12 digit.',
                'is_unique' => 'NIM sudah terdaftar.'
            ]
        ],
        'nama' => [
            'rules' => 'required|min_length[3]|max_length[50]',
            'errors' => [
                'required' => 'Nama wajib diisi.',
                'min_length' => 'Nama minimal 3 huruf.',
                'max_length' => 'Nama maksimal 50 huruf.'
            ]
        ],
        'umur' => [
            'rules' => 'required|numeric|greater_than_equal_to[10]|less_than_equal_to[100]',
            'errors' => [
                'required' => 'Umur wajib diisi.',
                'numeric' => 'Umur hanya boleh angka.',
                'greater_than_equal_to' => 'Umur minimal 10 tahun.',
                'less_than_equal_to' => 'Umur maksimal 100 tahun.'
            ]
        ]
    ];

    // Validasi input
    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

    // Jika validasi lolos → update data
    $this->mahasiswaModel->update($id, [
        'nim' => $this->request->getPost('nim'),
        'nama' => $this->request->getPost('nama'),
        'umur' => $this->request->getPost('umur'),
    ]);

    return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diupdate.');
}


    // Hapus data
    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);
        return redirect()->to(uri: '/mahasiswa');
    }

    public function searchMahasiswa($keyword)
    {
        return $this->table($this->table)
            ->like('nim', $keyword)
            ->orLike('nama', $keyword)
            ->orLike('umur', $keyword)
            ->get()
            ->getResultArray();
    }
    // Controller Mahasiswa.php


}
