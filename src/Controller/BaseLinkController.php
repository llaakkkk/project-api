<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 13.12.2017
 * Time: 19:56
 */
namespace src\Controller;

use ApiClientException;

class BaseLinkController extends Controller
{
    private $_api_base_url = 'https://api.ittour.com.ua/';

    private $_api_params_url = 'module/params';
    private $_api_search_url = 'module/search';
    private $_api_search_by_keys_url = 'module/search-list';
    private $_api_tour_info_url = 'tour/info/';
    private $_api_tour_validate_url = 'tour/validate/';
    private $_api_tour_flights_url = 'tour/flights/';
    private $_api_hot_tours_url_search = 'showcase/hot-offers/search';
    private $_api_min_prices_url_search = 'showcase/min-prices/search';
    private $_api_hot_tours_url_filters = 'showcase/hot-offers/filters';

    private $_api_tour_destinations_url = '/module/params/destinations';

    public $authorization_token = 'a84d43c908145eb08451e7e4249259bd'; // Взять из Личного кабинета
    public $response_language = 'ru';


    public function search_hottours($params)
    {
        $result = array();
        $url = $this->_api_base_url . $this->_api_hot_tours_url_search;
        $result = $this->get($url, $params);
        return $result;
    }

    /*
    *Фильтры для поиска горящих туров
    * https://api.ittour.com.ua/showcase/hot-offers/filters
    */
    public function hot_filters()
    {
        $result = array();
        $url = $this->_api_base_url . $this->_api_hot_tours_url_filters;
        $result = $this->get($url);
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
