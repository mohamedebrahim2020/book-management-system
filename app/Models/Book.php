<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var list<string>
	 */
	protected $fillable = [
		'author_id',
		'title',
		'isbn',
		'publication_year',
		'genre',
		'is_out_of_print',
	];

	public function author()
	{
		return $this->belongsTo(Author::class);
	}
}
