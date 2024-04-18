<?php

use Illuminate\Support\Facades\Route;
use App\Domains\Contact\DTO\CreateContactDTO;
use App\Domains\Box\Collections\RecipientDTOCollection;

Route::get('/', function () {
    $coll = new RecipientDTOCollection();
    $coll->push(new CreateContactDTO('test'));
    dd($coll->find(0));

    return view('welcome');
});
