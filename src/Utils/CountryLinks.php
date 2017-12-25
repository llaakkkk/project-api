<?php
/**
 * Created by PhpStorm.
 * User: Саша
 * Date: 19.12.2017
 * Time: 20:28
 */

namespace App\Utils;

class CountryLinks
{
    public function GetCountryFlag($country){
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
        return $flag[$country];
}

    public function GetCountryLink($country){
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
        return $link[$country];
}
}