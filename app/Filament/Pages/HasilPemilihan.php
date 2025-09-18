<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\StudentVoteStats;
use App\Filament\Widgets\CandidateOsisChart;
use App\Filament\Widgets\CandidateMpkChart;

class HasilPemilihan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $title = 'Hasil Pemilihan';
    protected static ?string $navigationLabel = 'Hasil Pemilihan';

    protected static string $view = 'filament.pages.hasil-pemilihan';

    public function getHeaderWidgets(): array
    {
        return [
            StudentVoteStats::class,
            CandidateOsisChart::class,
            CandidateMpkChart::class,
        ];
    }
}
