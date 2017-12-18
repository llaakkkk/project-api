<?php
/*echo ini_get('display_errors');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);*/
include ('api_client.php');


$api_client = new api_client;

try {
    $filters = $api_client->hot_filters();
        //var_export($filters->countries);
    } catch(api_client_exception $e) {
		echo $e->getMessage();
		echo '<br>';
		echo $e->getCode();
    }

try {
	 $params = array('hotel_rating' => '4', 'night_from' => 6, 'night_till' => 8, 'items_per_page' => 100, 'hotel_image' => 1);
	 $result = $api_client->search_hottours($params);
	 //var_export($result);
    //var_dump($result);
} catch(api_client_exception $e) {
    echo $e->getMessage();
    echo '<br>';
    echo $e->getCode();
  }

foreach ($result['offers'] as $key=>$value){
      $prices = $value['prices'];
      //var_export ($prices);
      //var_dump ($prices);
}

  /*foreach ($result['offers'] as $key=>$value){
	  $hotel_image = $value['hotel_images'];
      //var_export ($hotel_image);
      //var_dump ($hotel_image);
  }*/
foreach ($result['offers'] as $key=>$value){
	  $country = $value['country'];
	  //var_export ($country);
}

$a = 2;

function get_country_flag($country){
    $flag = array(
        'Египет' => '/site20/wp-content/uploads/2017/11/Egypt.png',
        'Турция' => '/site20/wp-content/uploads/2017/11/Turkey.png',
        'Болгария' => '/site20/wp-content/uploads/2017/11/Bulgaria.png',
        'ОАЭ' => '/site20/wp-content/uploads/2017/11/United-Arab-Emirates.png',
        'Кипр' => '/site20/wp-content/uploads/2017/11/Cyprus.png',
        'Греция' => '/site20/wp-content/uploads/2017/11/Greece.png',
        'Испания' => '/site20/wp-content/uploads/2017/11/Spain.png',
        'Грузия' => '/site20/wp-content/uploads/2017/11/Georgia.png',
        'Тунис' => '/site20/wp-content/uploads/2017/11/Tunisia.png',
        'Иордания' => '/site20/wp-content/uploads/2017/11/Jordan.png',
        'Италия' => '/site20/wp-content/uploads/2017/11/Italy.png',
        'Израиль' => '/site20/wp-content/uploads/2017/11/Israel.png',
        'Албания' => '/site20/wp-content/uploads/2017/11/Albania.png',
        'Черногория' => '/site20/wp-content/uploads/2017/11/Montenegro.png',
        'Таиланд' => '/site20/wp-content/uploads/2017/11/Thailand.png',
        'Шри Ланка' => '/site20/wp-content/uploads/2017/11/Sri-Lanka.png',
        'Индия' => '/site20/wp-content/uploads/2017/11/India.png',
        'Индонезия' => '/site20/wp-content/uploads/2017/11/Indonesia.png',
        'Танзания' => '/site20/wp-content/uploads/2017/11/Tanzania.png',
        'Мальдивы' => '/site20/wp-content/uploads/2017/11/Maldives.png',
        'Куба' => '/site20/wp-content/uploads/2017/11/Cuba.png',
        'Доминикана' => '/site20/wp-content/uploads/2017/11/Dominican-Republic.png',
        'Мексика' => '/site20/wp-content/uploads/2017/11/Mexico.png',
        'Маврикий' => '/site20/wp-content/uploads/2017/11/Mauritius.png'

    );
    foreach ($flag as $key=>$value){
        if($country == $key){
            $country_flag = $value;
            return $country_flag;
        }
    }
}

function get_country_link($country){
    $link = array(
        'Египет' => '/countries/egipet/',
        'Турция' => '/countries/turtsiya/',
        'Болгария' => '/countries/bolgariya/',
        'ОАЭ' => '/countries/emiraty/',
        'Кипр' => '/countries/kipr/',
        'Греция' => '/countries/gretsiya/',
        'Испания' => '/countries/ispaniya/',
        'Грузия' => '/countries/gruziya/',
        'Тунис' => '/countries/tunis/',
        'Иордания' => '/countries/iordaniya/',
        'Италия' => '/countries/italiya/',
        'Израиль' => '/countries/izrail/',
        'Албания' => '/countries/albaniya/',
        'Черногория' => '/countries/chernogoriya/',
        'Таиланд' => '/countries/tailand/',
        'Шри Ланка' => '/countries/shri-lanka/',
        'Индия' => '/countries/indiya/',
        'Индонезия' => '/countries/indoneziya/',
        'Танзания' => '/countries/tanzaniya/',
        'Мальдивы' => '/countries/maldivy/',
        'Куба' => '/countries/kuba/',
        'Доминикана' => '/countries/dominikana/',
        'Мексика' => '/countries/meksika/',
        'Маврикий' => '/countries/mavrikij/'

    );
    foreach ($link as $key=>$value){
        if($country == $key){
            $country_link = $value;
            return $country_link;
        }
    }
}

?>
<head>
  <link rel="stylesheet" id="fa-css" href="http://dev14.wp.ittour.com/site20/wp-content/themes/cleanco/css/customstyle.css" type="text/css">
</head>
<div class="container" style="max-width:1280px;">
<div class="country-table">
	<div class="country-row">
		<?php foreach ($result['offers'] as $key=>$value): ?>
		<div class="country-item">
            <!--<div class="hotel_image">
                <span id="country-image"><img src="<?php echo $hotel_image = $value['hotel_images'][0]['thumb']; ?>"/></span>
            </div>-->
			<a href="<?php echo get_country_link($country = $value['country']); ?>">
                <span id="country-flag"><img src="<?php echo get_country_flag($country = $value['country']); ?>"/></span>
				<span id="country-name" style="width: 35%;"><?php echo $country = $value['country']; ?></span>
				<span id="country-price" style="height: auto;"> от <?php echo round(($price = ($prices = $value['prices']['1'])/$a), 0, PHP_ROUND_HALF_DOWN).' $'; ?></span>
            </a>
		</div>
		<?php endforeach; ?>
	</div>
</div>
</div>


