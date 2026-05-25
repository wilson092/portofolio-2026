<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Projek;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectProgress extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $total = Projek::count();

        $done =
            Projek::where(
                'status_progress',
                'Selesai'
            )->count();

        $percent =
            $total
                ? round(
                    ($done / $total) * 100
                )
                : 0;

        return [

            Stat::make(
                'Progress Portfolio',
                "{$percent}%"
            )

                ->description(
                    "{$done}/{$total} projek selesai"
                )

                ->color(
                    $percent >= 70
                        ? 'success'
                        : 'warning'
                ),

        ];
    }
}