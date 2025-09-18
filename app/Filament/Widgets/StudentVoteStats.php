<?php

namespace App\Filament\Widgets;

use App\Models\Student;
use App\Models\Candidate;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StudentVoteStats extends BaseWidget
{
    protected function getCards(): array
    {
        // =========================
        // Hitung OSIS
        // =========================
        $totalSiswa = Student::count();
        $sudahPilihOsis = Student::where('pilih_osis', '!=', -1)->count();
        $belumPilihOsis = $totalSiswa - $sudahPilihOsis;

        $osisCandidates = Candidate::where('type', 'Ketua OSIS')->get();
        $osisPersentase = [];
        foreach ($osisCandidates as $c) {
            $count = Student::where('pilih_osis', $c->id)->count();
            $persen = $sudahPilihOsis > 0 ? round(($count / $sudahPilihOsis) * 100, 2) : 0;
            $osisPersentase[] = "{$c->nama}: {$persen}%";
        }

        // =========================
        // Hitung MPK
        // =========================
        $totalPerwakilan = Student::where('role', 'perwakilan_kelas')->count();
        $sudahPilihMpk = Student::where('role', 'perwakilan_kelas')
            ->where('pilih_mpk', '!=', -1)
            ->count();
        $belumPilihMpk = $totalPerwakilan - $sudahPilihMpk;

        $mpkCandidates = Candidate::where('type', 'Ketua MPK')->get();
        $mpkPersentase = [];
        foreach ($mpkCandidates as $c) {
            $count = Student::where('role', 'perwakilan_kelas')
                ->where('pilih_mpk', $c->id)
                ->count();
            $persen = $sudahPilihMpk > 0 ? round(($count / $sudahPilihMpk) * 100, 2) : 0;
            $mpkPersentase[] = "{$c->nama}: {$persen}%";
        }

        return [
            Card::make('Total Siswa', $totalSiswa),

            Card::make('OSIS', "{$sudahPilihOsis} sudah memilih / {$belumPilihOsis} belum")
                ->description(implode(' | ', $osisPersentase))
                ->descriptionIcon('heroicon-o-user-group'),

            Card::make('Perwakilan Kelas', $totalPerwakilan),

            Card::make('MPK', "{$sudahPilihMpk} sudah memilih / {$belumPilihMpk} belum")
                ->description(implode(' | ', $mpkPersentase))
                ->descriptionIcon('heroicon-o-academic-cap'),
        ];
    }
}
