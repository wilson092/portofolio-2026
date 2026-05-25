<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Pesan;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class RecentMessages extends TableWidget
{
    protected static ?string $heading =
        'Pesan Terbaru';

    public function table(Table $table): Table
    {
        return $table

            ->query(
                Pesan::query()
                    ->latest()
                    ->limit(5)
            )

            ->columns([

                Tables\Columns\TextColumn::make('nama'),

                Tables\Columns\TextColumn::make('email')
                    ->limit(25),

                Tables\Columns\TextColumn::make('pesan')
                    ->limit(40),

                Tables\Columns\TextColumn::make(
                    'created_at'
                )->since(),

            ]);
    }
}