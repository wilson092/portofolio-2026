<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjekResource\Pages;
use App\Models\Projek;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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

                Forms\Components\FileUpload::make('laporan_pdf')
                    ->label('Upload Laporan PDF')
                    ->disk('public')
                    ->directory('docs')
                    ->acceptedFileTypes([
                        'application/pdf',
                    ])
                    ->downloadable()
                    ->openable()
                    ->previewable(true)
                    ->maxSize(10240)
                    ->nullable()
                    ->getUploadedFileNameForStorageUsing(
                        fn ($file) =>
                        time() . '-' . $file->getClientOriginalName()
                    ),
                Forms\Components\Textarea::make('analisis_masalah')
                    ->rows(5)

                    ->columnSpanFull(),

                Forms\Components\Textarea::make('kebutuhan_sistem')
                    ->rows(5)

                    ->columnSpanFull(),

                Forms\Components\TextInput::make('arsitektur')
                    ->placeholder('Laravel + Filament + MariaDB'),

                Forms\Components\Select::make('tech_stack')
                    ->multiple()
                    ->options([
                        'Laravel' => 'Laravel',
                        'Filament' => 'Filament',
                        'Livewire' => 'Livewire',
                        'Blade' => 'Blade',
                        'PHP' => 'PHP',
                        'MariaDB' => 'MariaDB',
                        'MySQL' => 'MySQL',
                        'Docker' => 'Docker',
                        'JavaScript' => 'JavaScript',
                        'OpenWeatherMap API' => 'OpenWeatherMap API',
                        'Bootstrap' => 'Bootstrap',
                        'Tailwind CSS' => 'Tailwind CSS',
                        'Git' => 'Git',
                        'REST API' => 'REST API',
                    ])
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->columnSpanFull(),

               Forms\Components\FileUpload::make('diagram')
                    ->label('ERD / Flowchart')
                    ->image()
                    ->disk('public')
                    ->directory('docs')
                    ->visibility('public')
                    ->preserveFilenames()
                    ->openable()
                    ->downloadable()
                    ->nullable(),
            ])
            ->columns(2);
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
                    ->url(
                        fn ($record) => $record->link
                    )
                    ->openUrlInNewTab()
                    ->limit(30)
                    ->color('primary'),

                Tables\Columns\TextColumn::make('laporan_pdf')
                    ->label('Laporan')
                    ->formatStateUsing(
                        fn ($state) =>
                        $state
                            ? 'Buka PDF'
                            : '-'
                    )
                    ->url(
                        fn ($record) =>
                        $record->laporan_pdf
                            ? asset(
                                'storage/' .
                                $record->laporan_pdf
                            )
                            : null
                    )
                    ->openUrlInNewTab()
                    ->color('success'),

                Tables\Columns\BadgeColumn::make(
                    'status_progress'
                )
                    ->colors([
                        'success' => 'Selesai',
                        'danger' => 'Belum Selesai',
                    ]),

                Tables\Columns\TextColumn::make(
                    'created_at'
                )
                    ->dateTime(),

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
        return [];
    }

    public static function getPages(): array
    {
        return [

            'index' =>
                Pages\ListProjeks::route('/'),

            'create' =>
                Pages\CreateProjek::route('/create'),

            'edit' =>
                Pages\EditProjek::route('/{record}/edit'),

        ];
    }
}