<?php

namespace App\Filament\Resources\MedicoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DisponibilidadesRelationManager extends RelationManager
{
    protected static string $relationship = 'disponibilidades';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Campo para la fecha
                Forms\Components\DatePicker::make('fecha')
                    ->label('Fecha')
                    ->required(),

                // Campo para hora de inicio
                Forms\Components\TimePicker::make('hora_inicio')
                    ->label('Hora de Inicio')
                    ->required(),

                // Campo para hora de fin
                Forms\Components\TimePicker::make('hora_fin')
                    ->label('Hora de Fin')
                    ->required(),
                // Campo para disponibilidad (activo/inactivo)
                Toggle::make('disponible')
                    ->label('Disponible')
                    ->required()
                    ->default(true),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('disponibilidad')
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                    ->label('Fecha')
                    ->sortable()
                    ->searchable(),

                // Mostrar la hora de inicio
                Tables\Columns\TextColumn::make('hora_inicio')
                    ->label('Hora de Inicio')
                    ->sortable()
                    ->searchable(),

                // Mostrar la hora de fin
                Tables\Columns\TextColumn::make('hora_fin')
                    ->label('Hora de Fin')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('disponible')
                    ->boolean(),
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
