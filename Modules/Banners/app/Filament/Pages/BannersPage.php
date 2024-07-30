<?php

namespace Modules\Banners\Filament\Pages;

use Filament\Pages\Page;

class BannersPage extends Page
{
    public static string $view = 'banners::index';
    public static ?string $navigationLabel = 'banners';
    public static ?string $navigationIcon = 'eroicon-o-cog';

    public function getTitle(): string
    {
        return __('banners');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('banners');
    }

}
