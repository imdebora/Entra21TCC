<?php

namespace App\Service\AdminSearchEngine;

use App\Models\User;
use Illuminate\Http\Request;

class UserSearch implements SearchEngine
{

    public function search(Request $request)
    {
        $users = User::query();

        $users->when($request->search, function ($query, $campoDePesquisa){
            $query->where('name', 'like', '%' . $campoDePesquisa . '%');
        });

        $users = $users->paginate(5);

        return $users;
    }
}
