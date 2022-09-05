<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\ApiService;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;

class AdminDashboardChart extends BaseChart
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
        return Chartisan::build()
            ->labels(['Last 7 Days', 'Last 30 Days', 'Last 90 Days'])
            ->dataset('Total Clients', [$this->getUsers(7), $this->getUsers(30), $this->getUsers(90)])
            ->dataset('Total Funds', [$this->getTotalFunds(7), $this->getTotalFunds(30), $this->getTotalFunds(90)])
            ->dataset('Total Orders', [$this->getTotalOrders(7), $this->getTotalOrders(30), $this->getTotalOrders(90)]);
    }

    /**
     * @param $period
     * @return int
     */
    public function getUsers($period)
    {
        return User::query()
            ->where('is_admin', 0)
            ->where('active', 1)
            ->WhereBetween('created_at', [
                Carbon::now()->subdays($period)->format('Y-m-d'),
                Carbon::now()->subday()->format('Y-m-d')
            ])
            ->get()
            ->count();
    }

    /**
     * @param $period
     * @return int|mixed
     */
    public function getTotalFunds($period)
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
     * @param $period
     * @return int
     */
    public function getTotalOrders($period)
    {
        return Order::query()
            ->whereBetween('created_at', [
                Carbon::now()->subdays($period)->format('Y-m-d'),
                Carbon::now()->subday()->format('Y-m-d')
            ])
            ->get()
            ->count();
    }
}
