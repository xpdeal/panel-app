<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageBlockResource\Pages;
use App\Filament\Resources\PageBlockResource\RelationManagers;
use App\Models\PageBlock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PageBlockResource extends Resource
{
    protected static ?string $model = PageBlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('page_id')
                    ->relationship('page', 'name')
                    ->required(),
                Forms\Components\TextInput::make('page_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('identifier')
                    ->maxLength(26)
                    ->default(null),
                Forms\Components\Textarea::make('page_block')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('page_order')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('identifier')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListPageBlocks::route('/'),
            'create' => Pages\CreatePageBlock::route('/create'),
            'edit' => Pages\EditPageBlock::route('/{record}/edit'),
        ];
    }
}
