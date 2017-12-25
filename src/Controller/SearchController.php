<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 13.12.2017
 * Time: 19:56
 */
namespace App\Controller;

use App\Utils\Api;
use App\Utils\CountryLinks;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Twig;


class SearchController extends Controller
{

    private $divisionForOnePerson = 2;

    /**
     *
     * @Route("/search", name="search")
     */
    public function SearchHottours()
    {
        $api_client = new Api;
        try {
            $params = array('hotel_rating' => '4', 'night_from' => 6, 'night_till' => 8, 'items_per_page' => 100, 'hotel_image' => 1);
            $result = $api_client->GetSearchHottours($params);
            //var_export($result);
            //var_dump($result);
        } catch (api_client_exception $e) {
            echo $e->getMessage();
            echo '<br>';
            echo $e->getCode();
        }

        foreach ($result['offers'] as $key => $value) {
            $country = $value['country'];
            //var_export ($country);
        }
        foreach ($result['offers'] as $key => $value) {
            $prices = $value['prices'];
            //var_export ($prices);
            //var_dump ($prices);
        }
        $countryLinks = new CountryLinks();

        return $this->render('/templates/api.html.twig',  array(
                'country' => $countryLinks,
                'offers' => $result['offers'],
                'divisionForOnePerson' => $this->divisionForOnePerson
            ));
    }
}
?>

use Symfony\Bundle\FrameworkBundle\Controller\Controller;