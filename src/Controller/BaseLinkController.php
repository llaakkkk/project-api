<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 13.12.2017
 * Time: 19:56
 */
namespace App\Controller;

//use ApiClientException;
// в утилс новий класс апи ittour
//use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseLinkController
{

    const BASELINKS =
        [
        'api_base_url' => 'https://api.ittour.com.ua/',
        'api_hot_tours_url_search' => 'showcase/hot-offers/search',
        'api_hot_tours_url_filters' => 'showcase/hot-offers/filters'
        ];

    public $authorization_token = 'a84d43c908145eb08451e7e4249259bd'; // Взять из Личного кабинета
    public $response_language = 'ru';

}
