<?php

namespace App\Http\Livewire;

use App\Mail\OrderPlaced;
use App\Models\ArticleCategory;
use App\Models\Extra;
use App\Models\Order;
use App\Models\Report;
use App\Models\Service;
use App\Models\ServiceExtra;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Livewire\Component;

/**
 * Class OrderForm
 * @package App\Http\Livewire
 */
class OrderForm extends Component
{
    // Public
    public $services = null;
    public $serviceExtras = null;
    public $currentService;
    public $currentExtras = [];
    public $category;
    public $quantity;
    public $min_qte;
    public $link1;
    public $link2;
    public $link3;
    public $links=[];
    public $keywords;
    public $price = 0;
    public $extras_price = 0;
    public $notes;
    public ?Service $chosenService;
    public $keywordExceedMessage = '';
    public $linksExceedMessage = '';
    public $showLink2 = false;
    public $showLink3 = false;

    // Private
    private $url = 'https://panel.seoestore.net/action/api.php';

    /**
     * @var array
     */
    protected $listeners = [
      'categoryChanged' => 'categoryChanged'
    ];

    /**
     * @var array
     */
    protected $rules = [
        'currentService' => 'required|numeric',
        'keywords' => 'required',
        'link1' => 'required|url',
        'link2' => 'nullable|url',
        'link3' => 'nullable|url',
        'quantity' => 'required'
    ];

    /**
     * Update the category base on the user choice
     *
     * @param $category
     */
    public function categoryChanged($category)
    {
        $this->category = $category;
    }

    /**
     * Real-Time validation of quantity attribute
     *
     * @param $quantity
     * @throws ValidationException
     */
    public function updated($quantity)
    {
        if($this->currentService !== null  &&  $this->currentService !== "null") {
            // Validate the quantity value
            $this->validateOnly($quantity, [
                'quantity' => 'required|gte:'. Service::find($this->currentService)->min_qte,
            ]);
            // Get the current service
            $service = Service::find($this->currentService);
            // Initialise the price
            $this->price = 0;
            // Update the price
            $this->price = $this->price + $service->price_per_item * floatval($this->quantity);
        }
        else{
            return;
        }
    }

    /**
     * Get all the active services will booting the app
     */
    public function mount()
    {
        $this->services = Service::where('active', '1')->get();
    }

    public function showLink2()
    {
         $this->showLink2 = true;
    }

    public function showLink3()
    {
        $this->showLink3 = true;
    }
    /**
     * Get all extra services of the chosen service
     */
    public function getService()
    {
        // Initialize the prices & quantity after changing the service
        $this->price = 0;
        $this->extras_price = 0;
        $this->quantity = null;

        // Get the service extras
        $this->serviceExtras = ServiceExtra::query()
            ->where('service_id', $this->currentService)
            ->get();

        // Find the actual service object
        $this->chosenService = Service::find($this->currentService);

        //initialize the min quanitity
        if($this->currentService !== null  &&  $this->currentService !== "null") {
            $this->min_qte =  $this->chosenService->min_qte;
            $this->quantity = $this->min_qte;
        }

        // Filter the service extras to keep just the active ones
        $this->serviceExtras = $this->serviceExtras->filter(fn($serviceExtra) => $serviceExtra->extra->active);

        // Initialise the extras service when the chosen service is modified
        $this->currentExtras = [];
    }

    /**
     * Update the price by adding the chosen extra services prices
     */
    public function updatePriceWithExtraServices ()
    {
        $this->extras_price = 0;
        if(!empty($this->currentExtras)) {
            foreach ($this->currentExtras as $extraId) {
                $this->extras_price = $this->extras_price + Extra::find($extraId)->price_per_item;
            }
        }
    }



    /**
     * Making & Saving the order
     */
    public function sendOrder()
    {
        // Validate the received data
        $this->validate();

        // Configure the links & keywords to match the API requirements

        //add link1 & link2 & link3 to links array
        if($this->link1 && strlen($this->link1) !== 0)
        {
            //remove / from the end
            if(substr($this->link1, -1)=="/")
            {
                $this->link1= substr_replace($this->link1, "", -1);
            }
            array_push($this->links,$this->link1);
        }
        if($this->link2 && strlen($this->link2) !== 0)
        {
            //remove / from the end
            if(substr($this->link2, -1)=="/")
            {
                $this->link2= substr_replace($this->link2, "", -1);
            }
            array_push($this->links,$this->link2);
        }
        if($this->link3 && strlen($this->link3) !== 0)
        {
            //remove / from the end
            if(substr($this->link3, -1)=="/")
            {
                $this->link3= substr_replace($this->link3, "", -1);
            }
            array_push($this->links,$this->link3);
        }
        $keywords = preg_split('/\r\n|\r|\n/', $this->keywords);


        // Modify the links & keywords to match the API example in order sending
        // $newLinks = implode('\r\n', $filteredLinks);
        $newLinks = implode(PHP_EOL, $this->links);
        $newKeywords = implode(PHP_EOL, $keywords);
        $extras = '';

        $data = [
            'api_key' => env('SEOESTORE_API_KEY'),
            'email' => env('SEOESTORE_EMAIL'),
            'action' => 'order',
            'service' => $this->currentService,
            'quantity' => $this->quantity,
            'links' => $newLinks,
            'keywords' => $newKeywords
        ];

        if (sizeof($this->currentExtras) != 0) {
            $extras = implode(',', $this->currentExtras);
            // The order Data
            $data = [
                'api_key' => env('SEOESTORE_API_KEY'),
                'email' => env('SEOESTORE_EMAIL'),
                'action' => 'order',
                'service' => $this->currentService,
                'quantity' => $this->quantity,
                'extras' => $extras,
                'links' => $newLinks,
                'keywords' => $newKeywords
            ];
        }

        // Check if the article category is available or not
        if (!empty($this->category)) {
            $data = array_merge($data, [
                'article' => $this->category
            ]);
        }

        // Check if the notes is available or not
        if (!empty($this->notes)) {
            $data = array_merge($data, [
                'notes' => $this->notes
            ]);
        }

        // Calculate order total price
        $orderTotalPrice = $this->price + $this->extras_price;

        // Get the number of keywords
        $numberOfKeywords = sizeof(explode(',', $newKeywords));

        // Get the number of links
        $numberOfLinks = sizeof(explode('\r\n', $newLinks));

        // Check if the available funds enough to make this order
        if ($numberOfLinks > 3) {
            $this->linksExceedMessage = "You can't add more than 3 links";
            if ($numberOfKeywords <=10) {
                $this->keywordExceedMessage = '';
            }
        } else if ($numberOfKeywords > 10) {
            if ($numberOfLinks <= 3) {
                $this->linksExceedMessage = '';
            }
            $this->keywordExceedMessage = "You can't add more than 10 keywords";
        } else if (auth()->user()->balance < $orderTotalPrice) {
            $this->keywordExceedMessage = '';
            $this->linksExceedMessage = '';
            session()->flash('funds_not_enough', 'Not enough balance ! You should have $' . $orderTotalPrice .' in your balance at least to perform this order.');
        } else {
            // Calculate the price of the current order
            $orderPrice = $this->price + $this->extras_price;

            // Send the order request to the API
            $order = null;
            if (!$this->chosenService->is_personal) {
                $order = Http::asForm()->post($this->url, $data);
            }

            // Save the order
            $dbOrder = Order::create([
                'id' => isset($order['order']) ? $order['order'] :  mt_rand(100000,999999),
                'service_id' => $this->currentService,
                'extras' => $extras,
                'quantity' => floatval($this->quantity),
                'links' => $newLinks,
                'keywords' => $newKeywords,
                'price' => $orderPrice,
                'article_category' => $this->category,
                'notes' => $this->notes
            ]);

            // Get the order's status
            $orderStatus = null;
            if (!$this->chosenService->is_personal) {
                $orderStatus = Http::asForm()->post( $this->url, [
                    'api_key' => env('SEOESTORE_API_KEY'),
                    'email' => env('SEOESTORE_EMAIL'),
                    'action' => 'order_status',
                    'order_id' => $order['order']
                ])->json();
            }

            // Create a new Report
            Report::query()->create([
                'id' => isset($order['order']) ? $order['order'] : mt_rand(100000,999999),
                'user_id' => auth()->user()->id,
                'order_id' => isset($order['order']) ? $order['order'] : $dbOrder->id,
                'qte' => $this->quantity,
                'charge' => $orderPrice,
                'status' => isset($orderStatus['status']) ? $orderStatus['status'] : 'processing'
            ]);

            // Notify the user by his order placement
            Mail::to(auth()->user()->email)->send(new OrderPlaced($dbOrder));

            // Subtract the used balance from the user's balance
            $user = auth()->user();
            $user->balance = $user->balance - $orderPrice;
            $user->save();

            // Show a success message
            session()->flash('order-done', 'The order has been done successfully !');
            session()->flash('order-sent', 'The order has been sent successfully !');

            // Init the order form
            $this->initForm();
        }
    }

    /**
     * Get all article categories
     * @param Request $request
     */
    public function getArticleCategories(Request $request)
    {
        $search = $request->search;

        if($search == ''){
            $categories = ArticleCategory::orderby('description','asc')->select('code','description')->get();
        }else{
            $categories = ArticleCategory::orderby('description','asc')->select('code','description')->where('description', 'like', '%' .$search . '%')->get();
        }
        $response = array();
        foreach($categories as $categorie) {
            $response[] = array(
                "id"=>$categorie->code,
                "text"=>$categorie->description
            );
        }

        echo json_encode($response);
        exit;
    }

    /**
     * Reset the order form fields
     */
    public function initForm()
    {
        $this->currentService = null;
        $this->currentExtras = [];
        $this->price = 0;
        $this->extras_price = 0;
        $this->category = null;
        $this->links = null;
        $this->quantity = null;
        $this->keywords = null;
        $this->notes = null;
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
        return view('livewire.order-form');
    }
}
