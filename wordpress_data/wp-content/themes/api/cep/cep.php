<?php

function get_cep($cep)
{
    $response =  wp_remote_get('https://viacep.com.br/ws/' . $cep . '/json');

    return wp_remote_retrieve_body($response);
}

add_action('init', 'get_cep');
