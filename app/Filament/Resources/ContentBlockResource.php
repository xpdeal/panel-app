<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContentBlockResource\Pages;
use App\Filament\Resources\ContentBlockResource\RelationManagers;
use App\Models\ContentBlock;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContentBlockResource extends Resource
{
    protected static ?string $model = ContentBlock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('subtitle')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\RichEditor::make('block')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()->directory('content')->visibility('public')
                    ->imageEditor()->imageResizeMode('imageResizeMode')
                    ->imageEditorMode(2)->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])->disk('r2'),
                Forms\Components\Textarea::make('meta')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('action')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Select::make('content_id')
                    ->relationship('content', 'id')
                    ->default(null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('action')
                    ->searchable(),
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
                Tables\Columns\TextColumn::make('content.id')
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
            'index' => Pages\ListContentBlocks::route('/'),
            'create' => Pages\CreateContentBlock::route('/create'),
            'edit' => Pages\EditContentBlock::route('/{record}/edit'),
        ];
    }
}
