<?php

namespace App\Filament\Resources\EmergenciaResource\Pages;

use App\Filament\Resources\EmergenciaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEmergencia extends EditRecord
{
    protected static string $resource = EmergenciaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
