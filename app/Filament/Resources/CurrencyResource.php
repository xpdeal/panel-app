<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CurrencyResource\Pages;
use App\Filament\Resources\CurrencyResource\RelationManagers;
use App\Models\Currency;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CurrencyResource extends Resource
{
    protected static ?string $model = Currency::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('country_id')
                    ->relationship('country', 'name')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('code')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('precision')
                    ->required()
                    ->numeric()
                    ->default(2),
                Forms\Components\TextInput::make('symbol')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('symbol_native')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('symbol_first')
                    ->required()
                    ->numeric()
                    ->default(1),
                Forms\Components\TextInput::make('decimal_mark')
                    ->required()
                    ->maxLength(1)
                    ->default('.'),
                Forms\Components\TextInput::make('thousands_separator')
                    ->required()
                    ->maxLength(1)
                    ->default(','),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('country.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('precision')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('symbol')
                    ->searchable(),
                Tables\Columns\TextColumn::make('symbol_native')
                    ->searchable(),
                Tables\Columns\TextColumn::make('symbol_first')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('decimal_mark')
                    ->searchable(),
                Tables\Columns\TextColumn::make('thousands_separator')
                    ->searchable(),
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
            'index' => Pages\ListCurrencies::route('/'),
            'create' => Pages\CreateCurrency::route('/create'),
            'edit' => Pages\EditCurrency::route('/{record}/edit'),
        ];
    }
}
