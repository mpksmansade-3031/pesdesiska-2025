<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Candidate;
use Filament\Widgets\ChartWidget;

class OsisVoteChart extends ChartWidget
{
    protected static ?string $heading = 'Hasil Pemilihan Ketua OSIS';

    protected function getData(): array
    {
        $candidates = Candidate::where('type', 'Ketua OSIS')->get();

        $labels = [];
        $data = [];

        foreach ($candidates as $candidate) {
            $labels[] = $candidate->nama;
            $data[] = Student::where('pilih_osis', $candidate->id)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Suara',
                    'data' => $data,
                    'backgroundColor' => ['#3b82f6', '#10b981', '#f59e0b', '#ef4444'],
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // bisa diganti 'pie' atau 'doughnut'
    }
}
