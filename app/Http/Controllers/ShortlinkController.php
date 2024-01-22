<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shortlink;
use GuzzleHttp\Client;

class ShortlinkController extends Controller
{
    public function index()
    {
        $shortlinks = Shortlink::all();
        return view('shortlinks', compact('shortlinks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'url_original' => 'required|url',
        ]);

        $shortlink = Shortlink::create([
            'url_original' => $request->input('url_original'),
            'url_modifify' => $this->generateShortUrl($request->input('url_original')),
        ]);
        

        return redirect()->route('shortlinks.index')->with('success', 'Shortlink criado com sucesso!');
    }

    private function generateShortUrl($url)
    {
        $client = new Client([
            'verify' => false, // Desativei a verificação SSL, apenas para o teste pois estava dando incompatibilidade
        ]);

        // URL da API da Bitly para encurtar
        $bitlyApiUrl = 'https://api-ssl.bitly.com/v4/shorten';

        // Sua chave de API do Bitly
        $apiKey = 'bf27deeb27859acd0b570c89e387cda2baeba781';

        // Construir o corpo da requisição para a API Bitly
        $body = json_encode([
            'long_url' => $url,
        ]);

        // Fazer a requisição à API Bitly
        $response = $client->post($bitlyApiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
                'Content-Type' => 'application/json',
            ],
            'body' => $body,
        ]);

        // Obter a resposta JSON
        $result = json_decode($response->getBody(), true);

        // Retornar a URL curta gerada pela Bitly
        return $result['id'] ?? $url; // Caso algo dê errado, retorna a URL original
    }

    public function redirect($id)
    {

        $shortlink = Shortlink::findOrFail($id);
        $shortlink->increment('click_count');
        return redirect($shortlink->url_original);

    }

}
