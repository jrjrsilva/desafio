<?php


require_once('wp-load.php');

use GuzzleHttp\Client;

function api_get_cep($request)
{

    $fcep = $request["fcep"];

    //chamada direta ao via CEP
    // $response =  wp_remote_get('https://viacep.com.br/ws/' . $fcep . '/json');

    //chamada ao Laravel
    $response =  wp_remote_get(
        'http://localhost:8000/cep/' . $fcep,
        array(
            'timeout'     => 120,
            'httpversion' => '1.1',
        )
    );


    return $response;
}

function register_api_get_cep()
{
    register_rest_route('api/v1', '/cep/(?P<fcep>[-\w]+)', array(
        array(
            //'methods' => 'GET',
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'api_get_cep',
        )
    ));
}

add_action('rest_api_init', 'register_api_get_cep');
