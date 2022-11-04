<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\User;
use App\Service\DataForManagement;
use Auth;

class AdminController extends Controller

{
    public function management(User $users, DataForManagement $dataForManagement)
    {
        $orders = Order::all();

        $rentability = $dataForManagement->ordersTotalAndQuantity($orders);

        $lastDataByTotal = $dataForManagement->ordersSortedByTotal($orders);

        $lastDataByDate = $dataForManagement->ordersSortedById($orders);

        $usersData = User::all();

        $usersQuantity = $users->where(['user_type' => 'user'])->count();


        return view('admin.management.dashboard',compact('rentability', 'usersData', 'usersQuantity','lastDataByTotal','lastDataByDate'));
    }

}
