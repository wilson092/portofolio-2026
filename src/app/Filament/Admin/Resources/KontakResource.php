<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KontakResource\Pages;
use App\Models\Kontak;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';

    protected static ?string $navigationGroup = 'Portofolio';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\TextInput::make('profesi')
                    ->label('Profesi / Job Title')

                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('no_telpon')
                    ->tel()
                    ->required(),

                Forms\Components\TextInput::make('github')
                    ->url()
                    ->required(),

                Forms\Components\Textarea::make('deskripsi')
                    ->rows(6)
                    ->columnSpanFull(),

                Forms\Components\Select::make('tech_stack')
                    ->label('Tech Stack')
                    ->multiple()
                    ->searchable()
                    ->preload()

                    ->options([

                        'Laravel' => 'Laravel',

                        'Filament V3' => 'Filament V3',

                        'Livewire' => 'Livewire',

                        'Blade' => 'Blade',

                        'PHP' => 'PHP',

                        'MariaDB' => 'MariaDB',

                        'Docker' => 'Docker',

                        'Git' => 'Git',

                        'GitHub' => 'GitHub',

                        'REST API' => 'REST API',

                        'HTML' => 'HTML',

                        'CSS' => 'CSS',

                        'JavaScript' => 'JavaScript',

                        'Figma' => 'Figma',

                    ])

                    ->required()

                    ->columnSpanFull(),

            ])

            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('profesi')
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->searchable(),

                Tables\Columns\TextColumn::make('no_telpon'),

                Tables\Columns\TextColumn::make('github')
                    ->url(fn ($record) => $record->github)
                    ->openUrlInNewTab()
                    ->limit(30),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(60),

                Tables\Columns\TagsColumn::make('tech_stack')
                    ->separator(','),

            ])

            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKontaks::route('/'),
            'create' => Pages\CreateKontak::route('/create'),
            'edit' => Pages\EditKontak::route('/{record}/edit'),
        ];
    }
}