<?php

namespace App\Http\Controllers;

use App\Models\Rayon;
use App\Models\Rombel;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('rombel', 'rayon')->get();
        return view('dashboard.siswa.admin.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        return view('dashboard.siswa.admin.create', compact('rayons', 'rombels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Student::create([
            'nis'=> $request->nis,
            'name'=> $request->name,
            'rombel_id'=> $request->rombel_id,
            'rayon_id'=> $request->rayon_id,
        ]);

        return redirect()->route('siswa.home')->with('added', 'Berhasil menambahkan data siswa!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $rayons = Rayon::all();
        $rombels = Rombel::all();
        return view('dashboard.siswa.admin.edit', compact('student', 'rombels', 'rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'name' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Student::where('id', $id)->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('siswa.home')->with('edited', 'Berhasil mengubah data siswa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();

        return redirect()->route('siswa.home')->with('deleted', 'Berhasil menghapus data siswa!');
    }

    public function indexPembimbingSiswa()
    {
        $user = Auth::user();
        $user_rayon = $user->rayon;
        $students = $user_rayon->student()->where('rayon_id', $user_rayon->id)->get();
        return view('dashboard.siswa.ps.index', compact('students'));
    }
}
