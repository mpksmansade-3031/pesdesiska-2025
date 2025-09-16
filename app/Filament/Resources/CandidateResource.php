<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CandidateResource\Pages;
use App\Models\Candidate;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CandidateResource extends Resource
{
    protected static ?string $model = Candidate::class;
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Candidates';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama')->required(),
            Forms\Components\FileUpload::make('foto')
                ->image()
                ->directory('candidates')
                ->disk('public_uploads')
                ->nullable(),
            Forms\Components\Textarea::make('visi')->required(),
            Forms\Components\Textarea::make('misi')->required(),
            Forms\Components\Select::make('type')
                ->options([
                    'Ketua OSIS' => 'Ketua OSIS',
                    'Ketua MPK'  => 'Ketua MPK',
                ])
                ->native(false)
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('foto')
                    ->disk('public_uploads') // penting
                    ->square()
                    ->size(60),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('created_at')->dateTime(),
            ])
            ->filters([]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCandidates::route('/'),
            'create' => Pages\CreateCandidate::route('/create'),
            'edit'   => Pages\EditCandidate::route('/{record}/edit'),
        ];
    }
}