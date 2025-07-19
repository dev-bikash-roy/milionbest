<?php
namespace App;

class RouterAI {
    private string $apiKey;

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    public function generate(string $prompt): string {
        $ch = curl_init('https://api.openai.com/v1/chat/completions');
        $data = json_encode([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ]
        ]);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $this->apiKey
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $data,
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        if (!$response) return '';
        $json = json_decode($response, true);
        return $json['choices'][0]['message']['content'] ?? '';
    }
}
