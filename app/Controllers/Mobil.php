<?php

namespace App\Controllers;

///use App\Models\MobilModel;

class Mobil extends BaseController
{ 
    public function index()
    {
        $url = 'http://10.10.24.64:8080/mobil/data';
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET',$url);
            $data['mobil'] = json_decode($response->getBody(), true);

            return view('mobil',$data);
        } catch (\Exception $e) {
            return view ('mobil', ['error' => $e->getMessage()]);
        }
    }

    public function tambahMobil()
    {
        return view('input-mobil');
    }

    public function sendData()
    {
        $data = [
            'nama_mobil'            => $this->request->getPost('nama_mobil'),
            'tipe_mobil'            => $this->request->getPost('tipe_mobil'),
            'tahun_mobil'           => $this->request->getPost('tahun_mobil'),
            'plat_nomor'            => $this->request->getPost('plat_nomor'),
            'warna_mobil'           => $this->request->getPost('warna_mobil'),
            'harga_sewa_per_hari'   => $this->request->getPost('harga_sewa_per_hari'),
            'status_mobil'          => $this->request->getPost('status_mobil'),
        ];

        $url = 'http://10.10.24.64:8080/mobil/store';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        /* print_r($response); */

         if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status == 200) {
                return redirect()->to('/mobil')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/mobil')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }  

        curl_close($ch);
    }

    public function edit($id)
    {
        $url = 'http://10.10.24.64:8080/mobil/show' . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->request('GET', $url);
            $data['mobil'] = json_decode($response->getBody(), true);

            if (!$data['mobil']) {
                return redirect()->to('/mobil')->with('error', 'Mobil tidak ditemukan.');
            }

            return view('edit-mobil', $data);
        } catch (\Exception $e) {
            return view('edit-mobil', ['error' => $e->getMessage()]);
        }
    }

    public function editMobil()
    {
        $data = [
            'nama_mobil'            => $this->request->getPost('nama_mobil'),
            'tipe_mobil'            => $this->request->getPost('tipe_mobil'),
            'tahun_mobil'           => $this->request->getPost('tahun_mobil'),
            'plat_nomor'            => $this->request->getPost('plat_nomor'),
            'warna_mobil'           => $this->request->getPost('warna_mobil'),
            'harga_sewa_per_hari'   => $this->request->getPost('harga_sewa_per_hari'),
            'status_mobil'          => $this->request->getPost('status_mobil'),
        ];

        $url = 'http://10.10.24.64:8080/mobil/update/' . $this->request->getPost('id');
        $client = \Config\Services::curlrequest();

       /*  $response = $client->setBody(json_encode($data))
                               ->setHeader('Content-Type', 'application/json')
                               ->request('PUT', $url);
        $url = 'http://10.10.24.64:8080/mobil/update/' . $this->request->getPost('id'); */
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        //print_r($response);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if ($http_status == 200) {
                return redirect()->to('/mobil')->with('success', 'Data berhasil disimpan!');
            } else {
                return redirect()->to('/mobil')->with('error', 'Gagal menyimpan data! Kode Status:' . $http_status);
            }
        }

        curl_close($ch);
    }

    public function delete($id)
{
    // URL API tujuan untuk menghapus data berdasarkan ID
    $url = 'http://10.10.24.64:8080/mobil/delete/' . $id;
    $client = \Config\Services::curlrequest();

    try {
        // Kirim request DELETE untuk menghapus barang
        $response = $client->request('DELETE', $url, [
            'http_errors' => false // Untuk menangani error status code sebagai response normal
        ]);

        // Dapatkan kode status dari response
        $statusCode = $response->getStatusCode();

        // Cek status penghapusan
        if ($statusCode == 200) {
            // Sukses, arahkan kembali ke halaman mobil dengan pesan sukses
            return redirect()->to('/mobil')->with('success', 'Mobil berhasil dihapus!');
        } else {
            // Gagal, tampilkan pesan error dengan kode status
            return redirect()->to('/mobil')->with('error', 'Gagal menghapus mobil! Kode Status: ' . $statusCode);
        }
    } catch (\Exception $e) {
        // Tangani error dan kembalikan pesan exception
        log_message('error', 'Error saat menghapus mobil: ' . $e->getMessage()); // Log error
        return redirect()->to('/mobil')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

}