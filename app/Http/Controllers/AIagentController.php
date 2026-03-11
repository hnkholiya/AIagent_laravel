<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AIagentController extends Controller
{
    public function ask(Request $request)
    {
        $question = $request->question;

        $response = OpenAI::chat()->create([
            'model' => 'gpt-4o-mini',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => $question
                ]
            ],
        ]);

        return response()->json([
            'answer' => $response->choices[0]->message->content
        ]);
    }
}
