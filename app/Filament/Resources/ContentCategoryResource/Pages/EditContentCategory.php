<?php

namespace App\Filament\Resources\ContentCategoryResource\Pages;

use App\Filament\Resources\ContentCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContentCategory extends EditRecord
{
    protected static string $resource = ContentCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
