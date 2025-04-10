<?php

	namespace App\Traits;

	trait RedirectToListPage
	{
		protected function getRedirectUrl(): string
		{
			return $this->getResource()::getUrl('index');
		}
	}