<?php

namespace App\Filament\Resources\BookResource\Pages;

use App\Filament\Resources\BookResource;
use App\Models\Book;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\Action;

class ListBooks extends ListRecords
{
    protected static string $resource = BookResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

	protected function getTableActions(): array
	{
		return [
			Action::make('markAsOutOfPrint')
				->label('Mark as Out of Print')
				->action(fn (Book $record) => $record->update(['is_out_of_print' => true]))
				->visible(fn (Book $record) => ! $record->is_out_of_print)
				->requiresConfirmation()
				->color('danger'),
		];
	}
}
