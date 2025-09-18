<?php

namespace App\Filament\Widgets;

use App\Models\Candidate;
use App\Models\Student;
use Filament\Widgets\ChartWidget;

class CandidateOsisChart extends ChartWidget
{
    protected static ?string $heading = 'Hasil Pemilihan Ketua OSIS';

    protected function getData(): array
    {
        $candidates = Candidate::where('type', 'Ketua OSIS')->get();
        $labels = [];
        $votes = [];

        foreach ($candidates as $c) {
            $labels[] = $c->nama;
            $votes[] = Student::where('pilih_osis', $c->id)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Suara OSIS',
                    'data' => $votes,
                    'backgroundColor' => '#3b82f6',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // Bisa bar / doughnut / pie sesuai selera
    }
}
