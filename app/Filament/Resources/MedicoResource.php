<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DisponibilidadRelationManagerResource\RelationManagers\MedicoRelationManager as RelationManagersMedicoRelationManager;
use App\Filament\Resources\MedicoResource\Pages;
use App\Filament\Resources\MedicoResource\RelationManagers;
use App\Filament\Resources\MedicoResource\RelationManagers\DisponibilidadesRelationManager;
use App\Filament\Resources\MedicoResource\RelationManagers\MedicoRelationManager;
use App\Models\Especialidad;
use App\Models\Medico;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicoResource extends Resource
{
    protected static ?string $model = Medico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->options(User::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('especialidad_id')
                    ->label('Especialidad')
                    ->options(Especialidad::pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('numero_colegiado')
                    ->label('Número de Colegiado')
                    ->required()
                    ->unique(),
                Forms\Components\Textarea::make('biografia')
                    ->label('Biografía')
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('usuario.name')
                    ->label('Nombre del Médico')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('especialidad.nombre')
                    ->label('Especialidad')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('numero_colegiado')
                    ->label('Número de Colegiado')
                    ->sortable(),
                TextColumn::make('biografia')
                    ->label('Biografía')
                    ->limit(50),
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
            DisponibilidadesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMedicos::route('/'),
            'create' => Pages\CreateMedico::route('/create'),
            'edit' => Pages\EditMedico::route('/{record}/edit'),
        ];
    }
}
