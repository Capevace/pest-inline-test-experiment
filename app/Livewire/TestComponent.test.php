<?php

use App\Livewire\TestComponent;
use Livewire\Livewire;

describe('TestComponent', function () {
	it('renders successfully', function () {
		Livewire::test(TestComponent::class)
			->assertStatus(200);
	});
});
