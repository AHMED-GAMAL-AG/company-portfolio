<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function show()
{
    $subscribers = Subscriber::all();
    return view('admin.send-emails', compact('subscribers'));
}

}
