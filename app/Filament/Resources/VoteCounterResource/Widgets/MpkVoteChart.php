<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Candidate;
use Filament\Widgets\ChartWidget;

class MpkVoteChart extends ChartWidget
{
    protected static ?string $heading = 'Hasil Pemilihan Ketua MPK';

    protected function getData(): array
    {
        $candidates = Candidate::where('type', 'Ketua MPK')->get();

        $labels = [];
        $data = [];

        foreach ($candidates as $candidate) {
            $labels[] = $candidate->nama;
            $data[] = Student::where('pilih_mpk', $candidate->id)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Suara',
                    'data' => $data,
                    'backgroundColor' => ['#6366f1', '#14b8a6', '#eab308', '#dc2626'],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // bisa diganti 'pie'
    }
}
