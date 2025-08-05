<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
	public $name = 'John';

	public function render()
	{
		return <<<'HTML'
        <div>
            Hello tehre!
        </div>
        HTML;
	}
}
