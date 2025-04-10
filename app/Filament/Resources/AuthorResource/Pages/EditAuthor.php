<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use App\Traits\RedirectToListPage;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuthor extends EditRecord
{
	use RedirectToListPage;

	protected static string $resource = AuthorResource::class;


	protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
