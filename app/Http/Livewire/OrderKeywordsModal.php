<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class OrderKeywordsModal
 * @package App\Http\Livewire
 */
class OrderKeywordsModal extends Component
{
    /**
     * @var
     */
    public $keywords;

    /**
     * @var array
     */
    protected $listeners = [
        'showKeywordsModal' => 'showKeywordsModal'
    ];

    /**
     * Show links modal
     *
     * @param $report
     */
    public function showKeywordsModal($report)
    {
        $this->keywords = explode(PHP_EOL, $report['order']['keywords']);
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.order-keywords-modal');
    }
}
