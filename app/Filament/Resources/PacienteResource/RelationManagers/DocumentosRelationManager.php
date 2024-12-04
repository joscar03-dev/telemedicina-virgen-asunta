<?php

namespace App\Filament\Resources\PacienteResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DocumentosRelationManager extends RelationManager
{
    protected static string $relationship = 'documentos';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre_documento')
                    ->label('Nombre del Documento')
                    ->required()
                    ->maxLength(255),

                Select::make('tipo_documento')
                    ->label('Tipo de Documento')
                    ->options([
                        'informe' => 'Informe Médico',
                        'receta' => 'Receta Médica',
                        'otro' => 'Otro',
                    ])
                    ->required(),

                FileUpload::make('ruta_archivo')
                    ->label('Archivo')
                    ->directory('documentos_paciente')
                    ->nullable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nombre_documento')
            ->columns([
                TextColumn::make('nombre_documento')
                    ->label('Nombre del Documento')
                    ->searchable(),

                TextColumn::make('tipo_documento')
                    ->label('Tipo de Documento'),
                TextColumn::make('fecha_subida')
                    ->label('Fecha de Subida')
                    ->date(),
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
