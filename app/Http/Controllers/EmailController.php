<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmailController extends Controller
{
    public function show()
    {
        $subscribers = Subscriber::all();
        return view('admin.send-emails', compact('subscribers'));
    }

    public function sendEmail(Request $request)
    {
        $subject = $request->input('subject');
        $message = $request->input('message');
        $subscribers = DB::table('subscribers')->pluck('email')->toArray();

        $chunks = array_chunk($subscribers, 25);

        foreach ($chunks as $chunk) {
            dispatch(new SendEmailJob($subject, $message, $chunk));
        }

        return redirect('projects')->with('success', 'Emails sent successfully!');
    }
}
