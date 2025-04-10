<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use App\Traits\RedirectToListPage;
use Filament\Resources\Pages\CreateRecord;

class CreateAuthor extends CreateRecord
{
	use RedirectToListPage;

	protected static string $resource = AuthorResource::class;
}
