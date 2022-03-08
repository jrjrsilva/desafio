<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Canducci\ZipCode\Facades\ZipCode;
use GuzzleHttp\Client;


class CepController extends Controller
{

    public function getCep($cep)
    {
        $url = "https://viacep.com.br/ws/" . $cep . "/json/";
        $logradouro = json_decode(file_get_contents($url));

        return response()->json($logradouro);
    }

    public function teste()
    {
        return response()->json('funcionando...');
    }
}
