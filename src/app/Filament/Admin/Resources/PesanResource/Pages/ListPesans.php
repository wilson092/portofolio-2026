<?php

namespace App\Filament\Admin\Resources\PesanResource\Pages;

use App\Filament\Admin\Resources\PesanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPesans extends ListRecords
{
    protected static string $resource = PesanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
