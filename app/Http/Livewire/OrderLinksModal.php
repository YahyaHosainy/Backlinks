<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class OrderLinksModal
 * @package App\Http\Livewire
 */
class OrderLinksModal extends Component
{
    /**
     * @var array
     */
    protected $listeners = [
        'showLinksModal' => 'showLinksModal'
    ];

    /**
     * @var
     */
    public $links;

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.order-links-modal');
    }

    /**
     * Show links modal
     *
     * @param $report
     */
    public function showLinksModal($report)
    {
        $this->links = explode(PHP_EOL, $report['order']['links']);
    }
}
