<?php

namespace App\Http\Livewire;

use App\Models\SeoSetting;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Livewire\Component;

/**
 * @TODO keep just the used properties
 *
 * Class AdminGeneralSeoForm
 * @package App\Http\Livewire
 */
class AdminGeneralSeoForm extends Component
{
    // SeoMeta Attributes
    public $title;
    public $description;
    // public $keywords;
    // public $canonical;

    // OpenGraph Seo Attributes
    // public $openGraphTitle;
    // public $openGraphDescription;
    // public $openGraphUrl;

    // SeoSettings
    private ?SeoSetting $seoSettings;

    /**
     * @var array
     */
    protected $rules = [
        'title' => 'string|required',
        'description' => 'string|required',
        // 'keywords' => 'required',
        // 'canonical' => 'required|url',
        // 'openGraphTitle' => 'string|required',
        // 'openGraphDescription' => 'string|required',
        // 'openGraphUrl' => 'url|required'
    ];

    /**
     * AdminGeneralSeoForm constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->seoSettings = SeoSetting::first();
        parent::__construct($id);
    }

    /**
     * Load the stored SEO settings
     */
    public function mount()
    {
        if ($this->seoSettings !== null) {
            $this->title = $this->seoSettings->seo_meta_title;
            $this->description = $this->seoSettings->seo_meta_description;
            // $this->keywords = json_decode($this->seoSettings->keywords);
            // $this->openGraphTitle = $this->seoSettings->opengraph_title;
            // $this->openGraphDescription = $this->seoSettings->opengraph_description;
            // $this->openGraphUrl = $this->seoSettings->opengraph_url;
            // $this->canonical = $this->seoSettings->seo_meta_canonical;
        }
    }

    /**
     * Save the Seo Meta Settings
     */
    public function saveSeoMetaChanges()
    {
        // Validate the user's data
        $this->validate();

        // Check if there is any previous entries on the DB concerning the SEO
        if ($this->seoSettings !== null) {
            $this->seoSettings->seo_meta_title = $this->title;
            $this->seoSettings->seo_meta_description = $this->description;
            // $this->seoSettings->keywords = json_encode($this->keywords);
            // $this->seoSettings->opengraph_title = $this->openGraphTitle;
            // $this->seoSettings->opengraph_description= $this->openGraphDescription;
            // $this->canonical = $this->seoSettings->seo_meta_canonical;
            // $this->seoSettings->opengraph_url = $this->openGraphUrl;
            $this->seoSettings->save();
        } else {
            // Create a new SeoSetting entry
            SeoSetting::create([
                'seo_meta_title' => $this->title,
                'seo_meta_description' => $this->description,
                // 'keywords' => json_encode(explode(',', $this->keywords)),
                // 'seo_meta_canonical' => $this->canonical,
                // 'opengraph_title' => $this->openGraphTitle,
                // 'opengraph_description' => $this->openGraphDescription,
                // 'opengraph_url' => $this->openGraphUrl
            ]);
        }

        // Show a success message to the user
        session()->flash('seo_changes_applied', 'The SEO changes are saved successfully !');
    }

    /**
     * Reset form after saving settings
     */
    public function resetForm()
    {
        $this->title = '';
        $this->description = '';
        // $this->keywords = '';
        // $this->canonical = '';
        // $this->openGraphUrl = '';
        // $this->openGraphTitle = '';
        // $this->openGraphDescription = '';
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.admin-general-seo-form');
    }
}
