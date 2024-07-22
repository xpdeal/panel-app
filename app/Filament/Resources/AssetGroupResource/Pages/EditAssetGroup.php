<?php

namespace App\Filament\Resources\AssetGroupResource\Pages;

use App\Filament\Resources\AssetGroupResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssetGroup extends EditRecord
{
    protected static string $resource = AssetGroupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
