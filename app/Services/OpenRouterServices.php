<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

/**
 * Class OpenRouterServices
 *
 * Service responsible for communicating with the OpenRouter API
 * to explain any code snippet or plain text in simple English.
 *
 * Supported input:
 * - Source code (any programming language)
 * - Plain text
 *
 * @package App\Services
 */
class OpenRouterServices
{
    /**
     * OpenRouter API key.
     *
     * @var string
     */
    protected string $apiKey;

    /**
     * OpenRouter base API URL.
     *
     * @var string
     */
    protected string $baseUrl;

    /**
     * Loads API configuration from services config.
     */
    public function __construct()
    {
        $this->apiKey  = config('services.openrouter.api_key');
        $this->baseUrl = config('services.openrouter.base_url');
    }

    /**
     * Explain any code or text in plain English using OpenRouter GPT-5.2
     *
     * @param string $input Any code snippet or text
     * @return string Explanation from AI
     */
    public function explainCode(string $input): string
    {
        $prompt = "Explain the following code or text in simple, plain English:\n\n" . $input;
        /** @var Response $response */
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
        ])->post("{$this->baseUrl}/chat/completions", [
            'model' => config('constants.model'),
            'max_tokens' => config('constants.max_tokens'),
            'messages' => [
                [
                    'role' => config('constants.role'),
                    'content' => $prompt
                ]
            ]
        ]);
        if ($response->failed()) {
            return "Error: " . $response->body();
        }
        $data = $response->json();
        return $data['choices'][0]['message']['content'] ?? 'No explanation returned.';
    }
}
