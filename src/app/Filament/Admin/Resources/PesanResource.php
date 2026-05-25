<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PesanResource\Pages;
use App\Models\Pesan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PesanResource extends Resource
{
    protected static ?string $model = Pesan::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Portofolio';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nama')
                    ->disabled(),

                Forms\Components\TextInput::make('email')
                    ->disabled(),

                Forms\Components\Textarea::make('pesan')
                    ->rows(8)
                    ->disabled()
                    ->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('pesan')
                    ->limit(60)
                    ->wrap(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),

            ])

            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPesans::route('/'),
            'create' => Pages\CreatePesan::route('/create'),
            'edit' => Pages\EditPesan::route('/{record}/edit'),
        ];
    }
}