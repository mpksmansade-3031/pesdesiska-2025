<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages;
use App\Models\Setting;
use Filament\Forms;
use Filament\Forms\Form;   // ✅
use Filament\Tables;
use Filament\Tables\Table; // ✅ (untuk table juga harus begini)
use Filament\Resources\Resource;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Settings';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Toggle::make('web_access')
                ->label('Web Access'),

            Forms\Components\Select::make('mode')
                ->options([
                    'Ketua MPK' => 'Ketua MPK',
                    'Ketua OSIS' => 'Ketua OSIS',
                ])
                ->native(false)
                ->label('Mode')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('web_access')->boolean()->label('Web Access'),
                Tables\Columns\TextColumn::make('mode')->label('Mode'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSettings::route('/'),
            // 'create' => Pages\CreateSetting::route('/create'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
