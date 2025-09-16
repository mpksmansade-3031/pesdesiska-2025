<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Students';
    protected static ?string $pluralModelLabel = 'Students';
    protected static ?string $modelLabel = 'Student';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('kelas')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nis')
                    ->required()
                    ->unique(ignoreRecord: true),

                Forms\Components\Select::make('role')
                    ->options([
                        'siswa' => 'Siswa',
                        'perwakilan_kelas' => 'Perwakilan Kelas',
                    ])
                    ->default('siswa')
                    ->native(false)
                    ->required(),

                Forms\Components\TextInput::make('pilih_mpk')
                    ->numeric()
                    ->default(-1),

                Forms\Components\TextInput::make('pilih_osis')
                    ->numeric()
                    ->default(-1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('kelas')->searchable(),
                Tables\Columns\TextColumn::make('nis')->searchable(),
                Tables\Columns\TextColumn::make('role')->badge(),
                Tables\Columns\TextColumn::make('pilih_mpk'),
                Tables\Columns\TextColumn::make('pilih_osis'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->options([
                        'siswa' => 'Siswa',
                        'perwakilan_kelas' => 'Perwakilan Kelas',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
