<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataUser = User::all();
        return view("dashboard/user/user", compact('dataUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $data=User::where('id_user',$id)->first();
        return view('', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_user)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'area' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20', // Sesuaikan dengan aturan validasi Anda
        ]);

        // Temukan data pengguna berdasarkan ID yang diberikan
        $data = User::findOrFail($id_user);

        // Perbarui data pengguna
        $data->name = $request->name;
        $data->email = $request->email;
        $data->area = $request->area;
        $data->no_hp = $request->no_hp;
        $data->kelas = $request->kelas;
        $data->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('user')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_user)
    {
        $user = User::find($id_user);
        $user->delete();
        return redirect()->route('user');
    }
}
