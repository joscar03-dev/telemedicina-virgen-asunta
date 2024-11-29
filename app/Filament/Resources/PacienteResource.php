<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PacienteResource\Pages;
use App\Filament\Resources\PacienteResource\RelationManagers;
use App\Models\Paciente;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PacienteResource extends Resource
{
    protected static ?string $model = Paciente::class;

    protected static ?string $navigationLabel = 'Pacientes';

    protected static ?string $navigationGroup = 'Gestión de Pacientes';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),

                TextInput::make('apellido')
                    ->label('Apellido')
                    ->required()
                    ->maxLength(255),

                TextInput::make('correo')
                    ->label('Correo Electrónico')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                TextInput::make('telefono')
                    ->label('Teléfono')
                    ->nullable()
                    ->maxLength(15),

                Textarea::make('direccion')
                    ->label('Dirección')
                    ->nullable()
                    ->maxLength(500),

                DatePicker::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento')
                    ->required(),

                Select::make('sexo')
                    ->label('Género')
                    ->options([
                        'masculino' => 'Masculino',
                        'femenino' => 'Femenino',
                        'otro' => 'Otro',
                    ])
                    ->nullable(),

                TextInput::make('numero_seguro')
                    ->label('Número de Seguro Médico')
                    ->nullable()
                    ->maxLength(50),

                Select::make('usuario_id')
                    ->label('Usuario Asociado')
                    ->relationship('usuario', 'name') // Relación con User (si aplica)
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable(),

                Tables\Columns\TextColumn::make('apellido')
                    ->label('Apellido')
                    ->searchable(),

                Tables\Columns\TextColumn::make('correo')
                    ->label('Correo Electrónico')
                    ->searchable(),

                Tables\Columns\TextColumn::make('telefono')
                    ->label('Teléfono'),

                Tables\Columns\TextColumn::make('direccion')
                    ->label('Dirección'),

                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento')
                    ->date(),

                Tables\Columns\TextColumn::make('sexo')
                    ->label('Género'),

                Tables\Columns\TextColumn::make('numero_seguro')
                    ->label('Número de Seguro'),

                Tables\Columns\TextColumn::make('usuario.name')
                    ->label('Usuario Asociado'),
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
            'index' => Pages\ListPacientes::route('/'),
            'create' => Pages\CreatePaciente::route('/create'),
            'edit' => Pages\EditPaciente::route('/{record}/edit'),
        ];
    }
}
