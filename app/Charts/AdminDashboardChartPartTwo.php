<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\ApiService;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProfitPercent;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

/**
 * Class AdminDashboardChartPartTwo
 * @package App\Charts
 */
class AdminDashboardChartPartTwo extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     * @param Request $request
     * @return Chartisan
     */
    public function handler(Request $request): Chartisan
    {

        //total cost
        $totalCost7 = number_format((float)$this->getTotalCost(7), 2, '.', '');
        $totalCost30 = number_format((float)$this->getTotalCost(30), 2, '.', '');
        $totalCost90 = number_format((float) $this->getTotalCost(90), 2, '.', '');

        // total order
        $totalOrdersAmount7 = number_format((float)$this->getTotalOrdersAmount(7), 2, '.', '');
        $totalOrdersAmount30 = number_format((float)$this->getTotalOrdersAmount(30), 2, '.', '');
        $totalOrdersAmount90 = number_format((float) $this->getTotalOrdersAmount(90), 2, '.', '');

        // total profit
        $totalProfit7 = number_format((float)$this->getTotalProfit(7), 2, '.', '');
        $totalProfit30 = number_format((float)$this->getTotalProfit(30), 2, '.', '');
        $totalProfit90 = number_format((float) $this->getTotalProfit(90), 2, '.', '');


        return Chartisan::build()
            ->labels(['Last 7 Days', 'Last 30 Days', 'Last 90 Days'])
            ->dataset('Total Costs', [$totalCost7, $totalCost30, $totalCost90])
            ->dataset('Total Orders Amount', [$totalOrdersAmount7,$totalOrdersAmount30,$totalOrdersAmount90])
            ->dataset('Total Profit', [$totalProfit7, $totalProfit30, $totalProfit90]);
    }

    /**
     * @param $period
     * @return float|int|mixed
     */
    public function getTotalProfit($period)
    {
        $profitPercent = ProfitPercent::first();
        if ($profitPercent !== null) {
            return $this->getAllFunds($period) - $this->getAllFunds($period)*($profitPercent->service/100) - $this->getTotalCost($period) ;
        }

        // In case if there is no Profit Percent saved on the DB
        return 0;
    }

    /**
     * Get Total Funds based on the demanded period
     *
     * @param $period
     * @return int|mixed
     */
    public function getAllFunds($period)
    {
        // Total funds
        $payments = Payment::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($period)->format('Y-m-d'),
                Carbon::now()->subday()->format('Y-m-d')
            ])
            ->get();

        $funds = 0;
        if ($payments->isNotEmpty()) {
            foreach ($payments as $payment) {
                $funds += $payment->amount;
            }
        }

        return $funds;
    }

    /**
     * Get Total API Costs
     *
     * @param $period
     * @return int
     */
    public function getTotalCost($period)
    {
        $apiCost = 0;

        // Get all DB Orders
        $orders = Order::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($period)->format('Y-m-d'),
                Carbon::now()->subday()->format('Y-m-d')
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
     * Get Total Order Amount
     *
     * @param $period
     * @return mixed
     */
    public function getTotalOrdersAmount($period)
    {
        return Order::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($period)->format('Y-m-d'),
                Carbon::now()->subday()->format('Y-m-d')
            ])
            ->get()
            ->sum('price');
    }
}
