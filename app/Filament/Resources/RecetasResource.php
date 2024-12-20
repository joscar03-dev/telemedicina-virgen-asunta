<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecetasResource\Pages;
use App\Filament\Resources\RecetasResource\RelationManagers;
use App\Models\Consulta;
use App\Models\Recetas;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecetasResource extends Resource
{
    protected static ?string $model = Recetas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('consulta_id')
                    ->label('Medico')
                    ->options(function () {
                        return Consulta::with('recetas')
                            ->get();
                    })
                    ->searchable()
                    ->required(),
                Textarea::make('detalles')
                    ->label('Detalles')
                    ->rows(3),
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
            'index' => Pages\ListRecetas::route('/'),
            'create' => Pages\CreateRecetas::route('/create'),
            'edit' => Pages\EditRecetas::route('/{record}/edit'),
        ];
    }
}
