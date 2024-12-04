<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HistorialMedicoResource\Pages;
use App\Filament\Resources\HistorialMedicoResource\RelationManagers;
use App\Models\HistorialMedico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistorialMedicoResource extends Resource
{
    protected static ?string $model = HistorialMedico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListHistorialMedicos::route('/'),
            'create' => Pages\CreateHistorialMedico::route('/create'),
            'edit' => Pages\EditHistorialMedico::route('/{record}/edit'),
        ];
    }
}
