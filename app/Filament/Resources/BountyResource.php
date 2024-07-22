<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BountyResource\Pages;
use App\Filament\Resources\BountyResource\RelationManagers;
use App\Models\Bounty;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BountyResource extends Resource
{
    protected static ?string $model = Bounty::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('uuid')
                    ->label('UUID')
                    ->maxLength(36)
                    ->default(null),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\Select::make('bounty_id')
                    ->relationship('bounty', 'name')
                    ->default(null),
                Forms\Components\TextInput::make('bounty')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('log')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('meta')
                    ->columnSpanFull(),
                Forms\Components\DateTimePicker::make('available_start_at'),
                Forms\Components\DateTimePicker::make('available_end_at'),
                Forms\Components\TextInput::make('event_on')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('walletable')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('repeatedly')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('bounty_group_id')
                    ->numeric()
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('uuid')
                    ->label('UUID')
                    ->searchable(),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('bounty.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bounty')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('log')
                    ->searchable(),
                Tables\Columns\TextColumn::make('available_start_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('available_end_at')
                    ->dateTime()
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
                Tables\Columns\TextColumn::make('event_on')
                    ->searchable(),
                Tables\Columns\TextColumn::make('walletable')
                    ->searchable(),
                Tables\Columns\TextColumn::make('repeatedly')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bounty_group_id')
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
            'index' => Pages\ListBounties::route('/'),
            'create' => Pages\CreateBounty::route('/create'),
            'edit' => Pages\EditBounty::route('/{record}/edit'),
        ];
    }
}
