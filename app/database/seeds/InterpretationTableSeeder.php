<?php

class InterpretationTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        DB::table('interpretations')->delete();

        Interpretation::create(array(
            "id" => 1,
            "test_id" => 1,
            "category" => "Kirjoittaminen mentaalisena toimintana (esim. ilon tai ahdistuksen aiheet, tuen vaikutus, itsenäisyys, vastuu omasta oppimisesta)",
            "type" => "strength",
            "text" => "Vastauksissasi korostuu kirjoittamisen palkitsevuus. Myönteinen asenne kirjoittamiseen helpottaakin työskentelyä monella tavalla: aloittaminen helpottuu, tekstiä syntyy helposti eri tarkoituksiin ja kirjoitusprossista voi nauttia. Itsevarmuus kirjoittajana auttaa myös uusissa tilanteissa, sillä vaativiinkin kirjoitustehtäviin voi suhtautua luottavaisesti. Tutkimusten mukaan sosiaalinen tuki auttaa kirjoitusprosessissa, ja sen vuoksi kirjoittamisesta kannattaakin tehdä yhteisöllistä. Hienoa, jos olet oivaltanut myös tämän kirjoittamisen ulottuvuuden ja mahdollisuuden kehittyä kirjoittajana koko ajan monipuolisemmaksi ja paremmaksi.",
            "color" => "red"
        ));
    }

}