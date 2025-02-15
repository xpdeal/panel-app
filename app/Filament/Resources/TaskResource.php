<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Toggle::make('completed')
                    ->required(),
                Forms\Components\TextInput::make('task')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('url')
                    ->maxLength(255),
                Forms\Components\Select::make('stage')
                    ->required()
                   ->options([
                       'waiting' => 'waiting',
                       'revision' => 'revision',
                       'completed' => 'completed',
                       'in_progress' => 'in_progress',
                   ])
                    ->default('waiting'),
                Forms\Components\Select::make('side')
                    ->required()
                    ->options([
                       'frontend' => 'frontend',
                        'admin' => 'admin',
                        'api' => 'api',
                        'core' => 'core'
                    ])
                    ->default('waiting'),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->disk('r2')->directory('assets')->visibility('public'),

                Forms\Components\TextInput::make('priority')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextInputColumn::make('task')
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('url')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ,
                Tables\Columns\SelectColumn::make('stage')->options([
                    'frontend' => 'frontend',
                    'admin' => 'admin',
                    'api' => 'api',
                    'core' => 'core'
                ])
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('priority')
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
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->defaultSort('priority','desc')
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
