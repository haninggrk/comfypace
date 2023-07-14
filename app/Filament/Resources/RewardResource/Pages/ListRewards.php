<?php

namespace App\Filament\Resources\RewardResource\Pages;

use App\Filament\Resources\RewardResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRewards extends ListRecords
{
    protected static string $resource = RewardResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
