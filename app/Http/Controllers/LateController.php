<?php

namespace App\Http\Controllers;

use App\Exports\LatesExport;
use App\Models\Late;
use App\Models\Rayon;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Maatwebsite\Excel\Facades\Excel;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Late::with('student')->get();
        $students = Student::with('late')->get();
        return view('dashboard.keterlambatan.index', compact('lates', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        return view('dashboard.keterlambatan.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('bukti')->store('bukti');

        $validatedData = $request->validate([
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'image|file|required',
        ]);

        // if($request->file('bukti')){
        $validatedData['bukti'] = $request->file('bukti')->store('bukti');
        // }

        Late::create($validatedData);

        // Late::create([
        //     'student_id'=> $request->student_id,
        //     'date_time_late'=> $request->date_time_late,
        //     'information'=> $request->information,
        //     'bukti'=> $request->bukti,
        // ]);

        return redirect()->route('keterlambatan.home')->with('added', 'Berhasil menambahkan data keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('late', 'rombel', 'rayon')->find($id);
        return view('dashboard.keterlambatan.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $late = Late::find($id);
        $students = Student::all();
        return view('dashboard.keterlambatan.edit', compact('late', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'student_id' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'image|file',
        ];

        $validatedData = $request->validate($rules);

        if($request->file('bukti')){
            if($request->buktiOld) {
                Storage::delete($request->buktiOld);
            }
            $validatedData['bukti'] = $request->file('bukti')->store('bukti');
        }

        Late::where('id', $id)->update($validatedData);

        return redirect()->route('keterlambatan.home')->with('edited', 'Berhasil mengubah data keterlambatan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Late::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data keterlambatan!');
    }

    public function downloadPDF($id)
    {
        $student = Student::with('rayon.user', 'rombel')->find($id)->toArray();
        view()->share('$student', $student);
        $pdf = PDF::loadView('dashboard.keterlambatan.rekapitulasi.download-surat-pernyataan', compact('student'));
        return $pdf->download('surat-pernyataan.pdf');
    }

    public function exportExcel()
    {
        $file_name = 'rekapitulasi_keterlambatan'.'.xlsx';
        return Excel::download(new LatesExport, $file_name, ExcelExcel::XLSX);
    }

    public function indexPembimbingSiswa()
    {
        $user = Auth::user();
        $user_rayon = $user->rayon;
        $students = $user_rayon->student()->where('rayon_id', $user_rayon->id)->get();
        $lates = Late::whereHas('student.rayon', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        return view('dashboard.keterlambatan.ps.index', compact('lates', 'students'));
    }

    public function search(Request $request)
    {
        // $keyword = $request->search;
        // $request->session()->put('date', $keyword);
        // $orders = Order::whereDate('created_at', '=', $keyword)->paginate(10);
        // return view("order.kasir.index", compact('orders'));
    }
}
