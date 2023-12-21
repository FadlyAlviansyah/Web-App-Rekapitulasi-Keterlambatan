<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombel::all();
        return view('dashboard.rombel.index', compact('rombels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rombel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rombel' => 'required',
        ]);

        Rombel::create([
            'rombel'=> $request->rombel,
        ]);

        return redirect()->route('rombel.home')->with('success', 'Berhasil menambahkan data rombel!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rombel = Rombel::find($id);
        return view('dashboard.rombel.edit', compact('rombel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rombel' => 'required',
        ]);

        Rombel::where('id', $id)->update([
            'rombel' => $request->rombel,
        ]);

        return redirect()->route('rombel.home')->with('successEdit', 'Berhasil mengubah data rombel!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rombel::where('id', $id)->delete();

        return redirect()->route('rombel.home')->with('deleted', 'Berhasil menghapus data rombel!');
    }
}
