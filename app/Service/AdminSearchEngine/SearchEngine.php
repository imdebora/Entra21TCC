<?php

namespace App\Service\AdminSearchEngine;


use Illuminate\Http\Request;

interface SearchEngine
{
    public function search(Request $request);
}
