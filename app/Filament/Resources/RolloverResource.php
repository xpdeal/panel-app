<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RolloverResource\Pages;
use App\Filament\Resources\RolloverResource\RelationManagers;
use App\Models\Rollover;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RolloverResource extends Resource
{
    protected static ?string $model = Rollover::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\Select::make('wallet_id')
                    ->relationship('wallet', 'name')
                    ->required(),
                Forms\Components\TextInput::make('rollover')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('fulfilled')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('target')
                    ->numeric()
                    ->default(null),
                Forms\Components\Textarea::make('meta')
                    ->columnSpanFull(),
                Forms\Components\Select::make('rollover_id')
                    ->relationship('rollover', 'id')
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('wallet.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rollover')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fulfilled')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('target')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('rollover.id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListRollovers::route('/'),
            'create' => Pages\CreateRollover::route('/create'),
            'edit' => Pages\EditRollover::route('/{record}/edit'),
        ];
    }
}
