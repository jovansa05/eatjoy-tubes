<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AIChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => ['required', 'string', 'max:2000'],
            'history' => ['nullable', 'array'],
            'history.*.role' => ['required_with:history', 'string'],
            'history.*.content' => ['required_with:history', 'string'],
        ]);

        $apiKey  = env('DEEPSEEK_API_KEY');
        $baseUrl = rtrim(env('DEEPSEEK_BASE_URL', 'https://api.deepseek.com'), '/');
        $model   = env('DEEPSEEK_MODEL', 'deepseek-chat');

        if (!$apiKey) {
            return response()->json([
                'error' => 'DEEPSEEK_API_KEY belum di-set di .env'
            ], 500);
        }

        $userMessage = $request->input('message');
        $history = $request->input('history', []);

        // Normalisasi role: hanya system/user/assistant
        $messages = [
            [
                'role' => 'system',
                'content' => 'Kamu adalah AI asisten diet & nutrisi. Jawab singkat, jelas, dan actionable. Bahasa Indonesia.'
            ]
        ];

        foreach ($history as $h) {
            $role = $h['role'] ?? 'user';
            if (!in_array($role, ['system', 'user', 'assistant'], true)) {
                $role = 'user';
            }
            $messages[] = [
                'role' => $role,
                'content' => (string) ($h['content'] ?? '')
            ];
        }

        // Pastikan message terbaru masuk
        $messages[] = [
            'role' => 'user',
            'content' => $userMessage
        ];

        try {
            // DeepSeek endpoint: POST /chat/completions :contentReference[oaicite:2]{index=2}
            $url = $baseUrl . '/chat/completions';

            $resp = Http::timeout(60)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $apiKey, // Bearer token :contentReference[oaicite:3]{index=3}
                    'Content-Type'  => 'application/json',
                ])
                ->post($url, [
                    'model' => $model,
                    'messages' => $messages,
                    'temperature' => 0.8,
                    'max_tokens' => 800,
                    'stream' => false,
                ]);

            if (!$resp->successful()) {
                // Log detail biar kamu bisa lihat error asli dari DeepSeek
                Log::error('DeepSeek API failed', [
                    'status' => $resp->status(),
                    'body' => $resp->body(),
                ]);

                return response()->json([
                    'error' => 'DeepSeek API error',
                    'status' => $resp->status(),
                    'detail' => $resp->json() ?? $resp->body(),
                ], 500);
            }

            $data = $resp->json();

            $reply = $data['choices'][0]['message']['content'] ?? null;
            if (!$reply) {
                Log::warning('DeepSeek response missing reply', ['data' => $data]);
                return response()->json([
                    'error' => 'Response DeepSeek tidak ada konten jawaban',
                    'detail' => $data,
                ], 500);
            }

            return response()->json([
                'reply' => $reply
            ]);
        } catch (\Throwable $e) {
            Log::error('AI chat exception', [
                'message' => $e->getMessage(),
            ]);

            return response()->json([
                'error' => 'Server error saat memanggil DeepSeek',
                'detail' => $e->getMessage(),
            ], 500);
        }
    }
}
