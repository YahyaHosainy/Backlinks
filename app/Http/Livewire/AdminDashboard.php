<?php

namespace App\Http\Livewire;

use App\Models\ApiService;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProfitPercent;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\GTMConfig;

/**
 * Class AdminDashboard
 * @package App\Http\Livewire
 */
class AdminDashboard extends Component
{
    // Public Attributes
    public $totalClients;
    public $totalOrders;
    public $totalOrderAmount;
    public $totalFunds = 0;
    public $lastPayments;
    public $totalCosts;
    public $totalProfit = 0;
    public $profitPercentageAlert = null;
    public $period = 7;

    // Private attributes
    private $url;
    private ?ProfitPercent $profitPercent;

    /**
     * AdminDashboard constructor.
     * @param null $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->url = env('SEOESTORE_URL');
        $this->profitPercent = ProfitPercent::first();
        if ($this->profitPercent === null) {
            $this->profitPercentageAlert = true;
        }
    }

    /**
     * Load of the component
     */
    public function mount()
    {
        // Number of total clients based on the chosen period
        $this->totalClients = User::query()
            ->where('is_admin', 0)
            ->where('active', 1)
            ->WhereBetween('created_at', [
                Carbon::now()->subdays($this->period)->format('Y-m-d'),
                Carbon::now()->addDay()->format('Y-m-d')
            ])
            ->get()
            ->count();

        // Number of total orders based on the chosen period
        $this->totalOrders = Order::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($this->period)->format('Y-m-d'),
                Carbon::now()->addDay()->format('Y-m-d')
            ])
            ->get()
            ->count();

        // Total amount of orders
        $this->totalOrderAmount = Order::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($this->period)->format('Y-m-d'),
                Carbon::now()->addDay()->format('Y-m-d')
            ])
            ->get()
            ->sum('price');

        // Last 10 orders
        $this->lastPayments = Payment::query()
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // Total funds
        $this->totalFunds = 0;
        $payments = Payment::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($this->period)->format('Y-m-d'),
                Carbon::now()->addDay()->format('Y-m-d')
            ])
            ->get();

        $funds = 0;
        if ($payments->isNotEmpty()) {
            foreach ($payments as $payment) {
                $funds += $payment->amount;
            }
            $this->totalFunds = $funds;
        }

        // Total Api Orders cost
        $this->totalCosts = $this->getApiCoasts();

        // Total earned profit
        if ($this->profitPercent !== null) {
            $this->totalProfit = $this->totalFunds - $this->totalFunds*($this->profitPercent->service/100) - $this->totalCosts;
        }
    }

    /**
     * Return API Cost of all orders
     */
    public function getApiCoasts()
    {
        $apiCost = 0;

        // Get all DB Orders
        $orders = Order::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($this->period)->format('Y-m-d'),
                Carbon::now()->addDay()->format('Y-m-d')
            ])
            ->get();

        // Calculate all API prices
        foreach ($orders as $order) {
            $apiService = ApiService::find($order->service->id);
            $apiCost += $order->getApiExtraServicesCost() + $apiService->price_per_item;
        }

        return $apiCost;
    }

    /**
     * @return Factory|View
     */
    public function render()
    {
         // Get GTM Settings
         $gtm = GTMConfig::first();
         $gtmHead = "";
         $gtmBody = "";
 
         if ($gtm !=null) {
             $gtmHead = $gtm->headPart;
             $gtmBody = $gtm->bodyPart;
         }
        return view('livewire.admin-dashboard', [
            'gtmHead' => $gtmHead,
            'gtmBody' => $gtmBody
        ]);
    }
}
