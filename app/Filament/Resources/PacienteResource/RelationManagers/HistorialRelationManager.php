<?php

namespace App\Filament\Resources\PacienteResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistorialRelationManager extends RelationManager
{
    protected static string $relationship = 'historial';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Textarea::make('descripcion')
                    ->label('Descripción')
                    ->required()
                    ->maxLength(1000),

                DatePicker::make('fecha')
                    ->label('Fecha del Evento')
                    ->required(),

                Select::make('tipo_registro')
                    ->label('Tipo de Registro')
                    ->options([
                        'diagnostico' => 'Diagnóstico',
                        'procedimiento' => 'Procedimiento',
                        'tratamiento' => 'Tratamiento',
                        'control' => 'Control',
                    ])
                    ->nullable(),

                Select::make('medico_id')
                    ->label('Médico Asociado')
                    ->relationship('medico.usuario', 'name') // Asegúrate de que `medico` tenga la relación definida.
                    ->nullable(),

                FileUpload::make('ruta_archivo')
                    ->label('Archivo Adjunto')
                    ->directory('historial_medico')
                    ->nullable(),
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

                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->date(),

                TextColumn::make('tipo_registro')
                    ->label('Tipo de Registro'),

                TextColumn::make('medico.usuario.name')
                    ->label('Médico Asociado'),

                TextColumn::make('ruta_archivo')
                    ->label('Archivo Adjunto'),
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
