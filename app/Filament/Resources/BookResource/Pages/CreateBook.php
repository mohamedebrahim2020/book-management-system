<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use Filament\Resources\Pages\CreateRecord;
use App\Traits\RedirectToListPage;

class CreateBook extends CreateRecord
{
	use RedirectToListPage;

	protected static string $resource = BookResource::class;
}
