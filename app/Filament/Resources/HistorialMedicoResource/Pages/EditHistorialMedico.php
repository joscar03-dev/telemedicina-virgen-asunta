<?php

namespace App\Filament\Resources\HistorialMedicoResource\Pages;

use App\Filament\Resources\HistorialMedicoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistorialMedico extends EditRecord
{
    protected static string $resource = HistorialMedicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
