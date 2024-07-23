<?php

namespace App\Filament\Resources\RolloverResource\Pages;

use App\Filament\Resources\RolloverResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRollovers extends ListRecords
{
    protected static string $resource = RolloverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
