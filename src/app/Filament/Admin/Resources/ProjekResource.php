<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjekResource\Pages;
use App\Filament\Admin\Resources\ProjekResource\RelationManagers;
use App\Models\Projek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjekResource extends Resource
{
    protected static ?string $model = Projek::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';
    protected static ?string $navigationGroup = 'Portofolio';
    protected static ?int $navigationSort = 2;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->required(),
                Forms\Components\Select::make('status_progress')
                    ->options([
                        'Selesai' => 'Selesai',
                        'Belum Selesai' => 'Belum Selesai',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->label('GitHub')
                    ->url()
                    ->required(),
                            ]);
            
    }

  public static function table(Table $table): Table
{
    return $table
        ->columns([

            Tables\Columns\TextColumn::make('judul')
                ->searchable()
                ->sortable(),

            Tables\Columns\TextColumn::make('deskripsi')
                ->limit(50)
                ->wrap(),

            Tables\Columns\TextColumn::make('link')
                ->label('GitHub')
                ->url(fn ($record) => $record->link)
                ->openUrlInNewTab()
                ->color('primary')
                ->limit(30),

            Tables\Columns\BadgeColumn::make('status_progress')
                ->colors([
                    'success' => 'Selesai',
                    'danger' => 'Belum Selesai',
                ]),

            Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),

        ])

        ->filters([
            //
        ])

        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])

        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjeks::route('/'),
            'create' => Pages\CreateProjek::route('/create'),
            'edit' => Pages\EditProjek::route('/{record}/edit'),
        ];
    }
}
