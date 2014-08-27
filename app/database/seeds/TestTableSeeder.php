<?php

class TestTableSeeder extends Seeder {

    public function run()
    {
        DB::table('tests')->delete();

        Test::create(array(
            "id" => 1,
            "title" => "Tieteellisen kirjoittamisen itsearviointitesti",
            "maxChosenPerGroup" => 3,
            "showInterpretationThreshold" => 2,
            "descriptionPageText" => "Tämän testin avulla voit arvioida osaamistasi suomenkielisen tieteellisen tekstin kirjoittajana. Testissä on väitteitä seuraavilta kirjoittamisen osa-alueilta:\n\n* Kirjoittaminen mentaalisena toimintana\n* Akateemiset käytänteet ja tekstilajien hallinta\n* Lukeminen ja lähteiden käyttö\n* Kirjoittaminen prosessina\n* Tekstin rakenne ja tyyli\n* Kielelliset seikat\n\nItsearviointitestin tekeminen vie aikaa noin 10 minuuttia. Lopuksi saat valitsemiesi väitteiden pohjalta arvion kirjoittamisesi vahvuuksista ja kehittämiskohteista. Koosteen voit tulostaa tai lähettää omaan sähköpostiisi. Vastauksiasi ei tallenneta.\n\nValitse joka kohdasta 0–3 väitettä, jotka **eniten** kuvaavat omaa tieteellisen tekstin kirjoittamistasi.",
            "testPagesText" => "Valitse 0–3 väitettä.",
            "interpretationPageText" => "#Itsearviointitestin tulokset\n\nTällä sivulla näkyy, mitä kirjoittamisen osa-alueita painotat valinnoissasi. Tulokset näyttävät ensin vahvuutesi kirjoittajana ja sen jälkeen näet alueet, joissa tarvitset harjoitusta. Lue tuloksesi ja niistä annetut tulkinnat huolellisesti ja hyödynnä niitä tarpeen mukaan.",
        ));
    }

}