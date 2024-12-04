<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CitaResource\Pages;
use App\Filament\Resources\CitaResource\RelationManagers;
use App\Filament\Resources\CitaResource\RelationManagers\ConsultasRelationManager;
use App\Models\Cita;
use App\Models\Disponibilidad;
use App\Models\Medico;
use App\Models\Paciente;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CitaResource extends Resource
{
    protected static ?string $model = Cita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('medico_id')
                    ->label('Medico')
                    ->options(function () {
                        return Medico::with('usuario')
                            ->get()
                            ->pluck('usuario.name', 'id');
                    })
                    ->searchable()
                    ->required(),
                Select::make('paciente_id')
                    ->label('Paciente')
                    ->options(Paciente::all()->pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),
                DatePicker::make('fecha')
                    ->label('Fecha')
                    ->required(),
                TimePicker::make('hora_inicio')
                    ->label('Hora de Inicio')
                    ->required(),
                TimePicker::make('hora_fin')
                    ->label('Hora de Fin')
                    ->required(),
                Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'pendiente' => 'pendiente',
                        'confirmada' => 'confirmada',
                        'cancelada' => 'cancelada',
                    ]),
                Select::make('tipo_cita')
                    ->label('Tipo de Cita')
                    ->options([
                        'pendiente' => 'pendiente',
                        'confirmada' => 'confirmada',
                        'cancelada' => 'cancelada',
                    ]),
                Textarea::make('observaciones')
                    ->label('Observaciones')
                    ->rows(3),
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
                TextColumn::make('paciente.nombre')
                    ->label('Paciente')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('fecha')
                    ->label('Fecha')
                    ->sortable(),
                TextColumn::make('hora_inicio')
                    ->label('Hora Inicio'),
                TextColumn::make('hora_fin')
                    ->label('Hora Fin'),
                TextColumn::make('estado')
                    ->label('Estado'),
                TextColumn::make('observaciones')
                    ->label('Observaciones')
                    ->wrap(),
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
            ConsultasRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCitas::route('/'),
            'create' => Pages\CreateCita::route('/create'),
            'edit' => Pages\EditCita::route('/{record}/edit'),
        ];
    }
}
