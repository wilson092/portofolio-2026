<?php

namespace App\Filament\Admin\Resources\PesanResource\Pages;

use App\Filament\Admin\Resources\PesanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPesan extends EditRecord
{
    protected static string $resource = PesanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
