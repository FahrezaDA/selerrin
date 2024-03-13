<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProduk = Produk::all();
        $dataUser= User::all();
        return view("dashboard.produk.produk", compact('dataProduk','dataUser'));
    }
    public function testView()
    {
        $dataProduk = Produk::all();
        return view("test-reseller", compact('dataProduk'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Format foto yang diperbolehkan dan maksimum ukuran foto
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
        ]);

        // Simpan foto produk ke dalam direktori public/storage/foto-produk
        if ($request->hasFile('foto_produk')) {
            // Dapatkan nama file yang diunggah
            $foto = $request->file('foto_produk');

            // Buat nama file dengan menggabungkan nama_produk dengan ekstensi file
            $namaFile = $validatedData['nama_produk'] . '.' . $foto->getClientOriginalExtension();

            // Simpan foto produk ke dalam direktori public/storage/foto-produk dengan nama yang disesuaikan
            $fotoPath = $foto->storeAs('foto-produk',$namaFile, 'public');
        } else {
            return redirect()->back()->withInput()->withErrors(['foto_produk' => 'File foto produk tidak ditemukan.']);
        }

        // Buat entri produk baru di database
        $produk = new Produk();
        $produk->nama_produk = $validatedData['nama_produk'];
        $produk->foto_produk = $fotoPath;
        $produk->harga_produk = $validatedData['harga_produk'];
        $produk->stok_produk = $validatedData['stok_produk'];
        $produk->save();

        return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
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
    public function edit(string $id_produk)
    {
        $data = Produk::findOrFail($id_produk);
        return view('dashboard.produk.produk', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_produk)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'nama_produk' => 'required|string|max:255',
            'foto_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Foto produk menjadi opsional untuk diubah
            'harga_produk' => 'required|numeric',
            'stok_produk' => 'required|integer',
        ]);

        // Dapatkan data produk berdasarkan ID
        $produk = Produk::findOrFail($id_produk);

        // Perbarui data produk
        $produk->nama_produk = $validatedData['nama_produk'];
        $produk->harga_produk = $validatedData['harga_produk'];
        $produk->stok_produk = $validatedData['stok_produk'];

        // Jika ada file foto_produk yang diunggah, proses untuk menyimpan foto baru
        if ($request->hasFile('foto_produk')) {
            // Validasi dan simpan foto baru
            $foto = $request->file('foto_produk');
            $namaFile = $validatedData['nama_produk'] . '.' . $foto->getClientOriginalExtension();
            $fotoPath = $foto->storeAs('foto-produk', $namaFile, 'public');

            // Hapus foto lama jika ada
            if (Storage::disk('public')->exists($produk->foto_produk)) {
                Storage::disk('public')->delete($produk->foto_produk);
            }

            // Update path foto baru
            $produk->foto_produk = $fotoPath;
        }

        // Simpan perubahan data produk
        $produk->save();

        return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_produk)
    {
        $produk = Produk::find($id_produk);
        $produk->delete();
        return redirect()->route('produk');
}

public function KirimReseller(Request $request){
    // Proses validasi dan pembuatan transaksi


    foreach ($request->id_produk as $index => $id_produk) {
        // Simpan transaksi
        $transaksi = new Transaksi;
        $transaksi->id_user = $request->id_user[$index];
        $transaksi->id_produk = $id_produk;
        $transaksi->tanggal_waktu_transaksi = now();
        $transaksi->jumlah_produk = $request->jumlah_produk[$index];
        $transaksi->save();


        // Kurangi stok produk
        $produk = Produk::findOrFail($id_produk);
        $produk->stok_produk -= $request->jumlah_produk[$index];
        $produk->save();
    }

    return redirect()->route('produk')->with('success', 'Produk berhasil ditambahkan.');
}


}
