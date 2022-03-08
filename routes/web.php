<?

use GuzzleHttp\Client;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('cors')->get('/cep/{cep}', function ($cep) {
    $client = new Client([
        'base_uri' => 'https://viacep.com.br/ws/',

        'timeout'  => 2.0,
    ]);
    $response = $client->request('GET', $cep . '/json');
    $dados = $response->getBody()->getContents();

    return ($dados);
});
