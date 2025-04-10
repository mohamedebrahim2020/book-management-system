<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Filament\Resources\BookResource\RelationManagers;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
				Select::make('author_id')
					->relationship('author', 'name')
					->required(),
				TextInput::make('title')
					->required()
					->unique(ignoreRecord: true),
				TextInput::make('isbn')
					->nullable()
					->unique(ignoreRecord: true),
				TextInput::make('publication_year')
					->numeric()
					->nullable(),
				Select::make('genre')
					->options([
						'Fiction' => 'Fiction',
						'Non-Fiction' => 'Non-Fiction',
						'Mystery' => 'Mystery',
						'Science Fiction' => 'Science Fiction',
					])
					->nullable(),
			]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
				TextColumn::make('title')->sortable()->searchable(),
				TextColumn::make('author.name')->label('Author'),
				TextColumn::make('isbn')->sortable(),
				TextColumn::make('publication_year')->sortable(),
				ToggleColumn::make('is_out_of_print')
					->label('Out of Print')
					->sortable()
			])
            ->filters([
                //
            ])
			->actions([
                Tables\Actions\EditAction::make(),

            ])
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
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
}
