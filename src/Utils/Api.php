<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 19.12.2017
 * Time: 20:12
 */

namespace App\Utils;

use App\Exception\api_client_exception;

class Api
{

    const BASELINKS =
        [
            'api_base_url' => 'https://api.ittour.com.ua/',
            'api_hot_tours_url_search' => 'showcase/hot-offers/search',
            'api_hot_tours_url_filters' => 'showcase/hot-offers/filters'
        ];

    public $authorization_token = 'a84d43c908145eb08451e7e4249259bd'; // Взять из Личного кабинета
    public $response_language = 'ru';

    public function GetSearchHottours($params)
    {
        $result = array();
        $url = self::BASELINKS['api_base_url'] . self::BASELINKS['api_hot_tours_url_search'];
        $result = $this->get($url, $params);
        return $result;
    }

    /**
     * Отправка запроса и обработка результата
     */
    private function get($url, array $params = array()) {

        // Установка GET параметров
        if($params) {
            $query_string = http_build_query($params);
            if($query_string) $url .= '?' . $query_string;
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $this->get_http_headers());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        $curl_error_number = curl_errno($curl);
        if($curl_error_number) {
            $curl_error_text = curl_error($curl);
            curl_close($curl);
            throw new api_client_exception('cURL error: ' . $curl_error_text, $curl_error_number);
        } else {
            $info = curl_getinfo($curl);
            if($info['http_code'] != 200) {
                curl_close($curl);
                throw new api_client_exception('HTTP request failed: ' . $response, $info['http_code']);
            }
        }

        curl_close($curl);

        $result = json_decode($response, true);

        $error_code = json_last_error();
        switch($error_code) {
            case JSON_ERROR_NONE:
                break;
            case JSON_ERROR_SYNTAX:
                $result = $response;
                break;
            default:
                throw new api_client_exception('Json_decode failed. Error_code:' . $error_code . '<br>' . $response, $info['http_code']);
                break;
        }

        return $result;
    }

    /**
     * Формирование заголовков для запросов
     */
    private function get_http_headers() {
        $result = array();
        if($this->authorization_token) {
            $result[] = 'Authorization: ' . $this->authorization_token;
        } else {
            throw new api_client_exception('Authorization token not set');
        }
        if($this->response_language) $result[] = 'Accept-Language: ' . $this->response_language;

        return $result;
    }
}