<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LatesExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        if(Auth::user()->role == 'admin') {
            return Student::with('rombel', 'rayon', 'late')->get();
        } else {
            $user = Auth::user();
            $user_rayon = $user->rayon;
            return Student::with('rombel', 'rayon', 'late')->where('rayon_id', $user_rayon->id)->get();
        };
    }

    public function headings(): array
    {
        return [
            "NIS", "Nama", "Rombel", "Rayon", "Total Keterlambatan"
        ];
    }

    public function map($item): array
    {
        return [
            // $item->nis,
            // $item->name,
            // $item->rombel->rombel,
            // $item->rayon->rayon,
            // $item->late->count(),
            $item['nis'],
            $item['name'],
            $item['rombel']['rombel'],
            $item['rayon']['rayon'],
            $item['late']->count(),
        ];
    }
}
