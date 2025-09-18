<?php

namespace App\Filament\Widgets;

use App\Models\Candidate;
use App\Models\Student;
use Filament\Widgets\ChartWidget;

class CandidateMpkChart extends ChartWidget
{
    protected static ?string $heading = 'Hasil Pemilihan Ketua MPK';

    protected function getData(): array
    {
        $candidates = Candidate::where('type', 'Ketua MPK')->get();
        $labels = [];
        $votes = [];

        foreach ($candidates as $c) {
            $labels[] = $c->nama;
            $votes[] = Student::where('role', 'perwakilan_kelas')
                            ->where('pilih_mpk', $c->id)
                            ->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Suara MPK',
                    'data' => $votes,
                    'backgroundColor' => '#10b981',
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
