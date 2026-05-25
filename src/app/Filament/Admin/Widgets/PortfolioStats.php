<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Kontak;
use App\Models\Pesan;
use App\Models\Projek;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PortfolioStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [

            Stat::make(
                'Total Kontak',
                Kontak::count()
            )
                ->description('Profil tersedia')
                ->color('primary'),

            Stat::make(
                'Total Projek',
                Projek::count()
            )
                ->description('Semua projek')
                ->color('success'),

            Stat::make(
                'Total Pesan',
                Pesan::count()
            )
                ->description('Pesan masuk')
                ->color('warning'),

            Stat::make(
                'Selesai',
                Projek::where(
                    'status_progress',
                    'Selesai'
                )->count()
            )
                ->color('success'),

            Stat::make(
                'Belum Selesai',
                Projek::where(
                    'status_progress',
                    'Belum Selesai'
                )->count()
            )
                ->color('danger'),

        ];
    }
}