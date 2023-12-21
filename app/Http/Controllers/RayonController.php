<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\User;
use Illuminate\Http\Request;

class RayonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayons = Rayon::with('user')->get();
        return view('dashboard.rayon.index', compact('rayons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ps = User::where('role', 'ps')->get();
        return view('dashboard.rayon.create', compact('ps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayon::create([
            'rayon'=> $request->rayon,
            'user_id'=> $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('added', 'Berhasil menambahkan data rayon!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rayon $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = Rayon::find($id);
        $ps = User::where('role', 'ps')->get();
        return view('dashboard.rayon.edit', compact('rayon', 'ps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayon::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('edited', 'Berhasil mengubah data rayon!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rayon::where('id', $id)->delete();

        return redirect()->route('rayon.home')->with('deleted', 'Berhasil menghapus data rayon!');
    }
}
