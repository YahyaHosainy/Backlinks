<?php

namespace App\Http\Livewire;

use App\Models\Bloc;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

/**
 * Class AdminManagePreFooterBloc
 * @package App\Http\Livewire
 */
class AdminManagePreFooterBloc extends Component
{
    /**
     * @var
     */
    public $content;

    /**
     * @var
     */
    private $bloc;

    /**
     * @var array
     */
    protected $rules = [
        'content' => 'required'
    ];

    /**
     * AdminManagePreFooterBloc constructor.
     */
    public function __construct()
    {
        parent::__construct($id=null);

        // Get the bloc's code
        $this->bloc = Bloc::query()->where('bloc_name','=','pages_footer_banner')->first();

        if ($this->bloc != null) {
            $this->content = $this->bloc->content;
        }
    }

    /**
     * Save the changes
     */
    public function saveContent()
    {
        // Validate user data
        $this->validate();

        // Check if there is any previous banner
        if ($this->bloc !== null) {
            $this->bloc->content = $this->content;
            $this->bloc->save();
        } else {
            // Create a new banner
            Bloc::create([
                'bloc_name' => 'pages_footer_banner',
                'content' => $this->content
            ]);
        }

        session()->flash('banner_changes_applied', "The banner's code is saved successfully.");
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.admin-manage-pre-footer-bloc');
    }
}
