<?php

namespace App\Filament\Resources\HistorialMedicoResource\Pages;

use App\Filament\Resources\HistorialMedicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistorialMedicos extends ListRecords
{
    protected static string $resource = HistorialMedicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
