<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DisponibilidadResource\Pages;
use App\Filament\Resources\DisponibilidadResource\RelationManagers;
use App\Models\Disponibilidad;
use App\Models\Medico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DisponibilidadResource extends Resource
{
    protected static ?string $model = Disponibilidad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('medico_id')
                ->label('Médico')
                ->options(Medico::with('usuario')->get()->pluck('usuario.name', 'id'))
                ->searchable()
                ->required(),
            Forms\Components\DatePicker::make('fecha')
                ->label('Fecha')
                ->required(),
            Forms\Components\TimePicker::make('hora_inicio')
                ->label('Hora de Inicio')
                ->required(),
            Forms\Components\TimePicker::make('hora_fin')
                ->label('Hora de Fin')
                ->required(),
            Forms\Components\Toggle::make('disponible')
                ->label('Disponible')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('medico.usuario.name')
                    ->label('Médico')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->sortable(),
                TextColumn::make('hora_inicio')
                    ->label('Hora de Inicio'),
                TextColumn::make('hora_fin')
                    ->label('Hora de Fin'),
                TextColumn::make('disponible')
                    ->label('Disponible'),
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
            'index' => Pages\ListDisponibilidads::route('/'),
            'create' => Pages\CreateDisponibilidad::route('/create'),
            'edit' => Pages\EditDisponibilidad::route('/{record}/edit'),
        ];
    }
}
