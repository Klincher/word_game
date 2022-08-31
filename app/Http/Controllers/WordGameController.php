<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Factories\ActorFactory;
use Twilio\TwiML\MessagingResponse;

class WordGameController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(MessagingResponse $messageResponse)
    {
        $actor = ActorFactory::make();
        $messageResponse->message($actor->talk());

        return response($messageResponse, 200)->header(
            'Content-Type',
            'text/xml'
        );
    }
}
