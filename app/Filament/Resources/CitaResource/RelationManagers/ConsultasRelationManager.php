<?php

namespace App\Filament\Resources\CitaResource\RelationManagers;

use App\Filament\Resources\ConsultaRelationManagerResource\RelationManagers\RecetasRelationManager;
use App\Models\Recetas;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConsultasRelationManager extends RelationManager
{
    protected static string $relationship = 'consultas';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->maxLength(500),

                Textarea::make('diagnostico')
                    ->label('Diagnóstico')
                    ->required()
                    ->maxLength(500),

                Textarea::make('tratamiento')
                    ->label('Tratamiento')
                    ->required()
                    ->maxLength(500),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('descripcion')
            ->columns([
                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable(),

                TextColumn::make('diagnostico')
                    ->label('Diagnóstico')
                    ->searchable(),

                TextColumn::make('tratamiento')
                    ->label('Tratamiento'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
