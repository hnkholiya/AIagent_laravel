<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Http;
class AIagentController extends Controller
{
     public function ask(Request $request)
    {
        $question = $request->question;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.env('HUGGINGFACE_API_KEY'),
            'Content-Type' => 'application/json'
        ])->post(
            'https://router.huggingface.co/hf-inference/models/mistralai/Mistral-7B-Instruct-v0.2',
            [
                "inputs" => $question
            ]
        );

        $data = $response->json();

        return response()->json([
            'answer' => $data[0]['generated_text'] ?? 'No response'
        ]);


        return $response->json();
    }
}
