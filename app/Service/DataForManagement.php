<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class DataForManagement
{
    public function ordersTotalAndQuantity(Collection $orders) : array
    {
        $ordersData = ['quantity' => $orders->count(), 'total' => $orders->sum('total')];

        return $ordersData;
    }
    public function ordersSortedByTotal(Collection $orders) : array
    {

        $orders = $orders->sortByDesc('total')->take(3);

        $orders = $this->insertIntoArray($orders);

            return $orders;
    }

    public function ordersSortedById(Collection $orders) : array
    {
        $orders = $orders->sortByDesc('id')->take(3);

        $orders = $this->insertIntoArray($orders);

        return $orders;
    }

    public function insertIntoArray($orders): array
    {
        $lastData = [];

            foreach ($orders as $order) {
                $data = [
                    'id' => $order->getAttribute('id'),
                    'total' => $order->getAttribute('total'),
                    'user_id' => $order->getAttribute('user_id'),
                    'created_at' => $order->getAttribute('created_at')->format('d/m/Y'),
                    'user_name' => User::find($order->getAttribute('user_id'))->name
                ];
                $lastData[] = $data;
            }
            return $lastData;
    }
}
