## Asennus

1. Kopioi palvelimelle, käyttäjille pääsy public-hakemistoon.
2. Muuta app/config/app.php-tiedostosta rivin "'key' => 'yourkeyhere'" kohta "yourkeyhere" satunnaiseksi 32-merkkiseksi merkkijonoksi, esimerkiksi "'key' => 'kcwnBkSHM0l3rhn0FAXieVDURcSOgsXB'" (älä käytä tätä).
3. Muuta app/config/database.php-tiedostosta tietokannan tiedot oikein, esimerkiksi:

        'mysql' => array(
                    'driver'    => 'mysql',
                    'host'      => 'localhost',
                    'database'  => 'forge',
                    'username'  => 'forge',
                    'password'  => '',
                    'charset'   => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix'    => '',
                )

    ja muuta "'default' => 'mysql'" kohta mysql vastaamaan tietokantakonfiguraation nimeä.

4. Palvelimella pitää olla oikeudet hakemistoon app/storage ja sen kaikkiin alihakemistoihin.
5. Poista kommentti public/index.php-tiedoston riviltä "//Artisan::call('migrate', array('--force' => true));" eli "Artisan::call('migrate', array('--force' => true));".
6. Mene sivulle (public-hakemisto). Tietokantataulut on nyt luotu tietokantaan.
7. Kommentoi kohdan 5. rivi uudestaan.
8. Tee sama (5.-7.) myös riville "//Artisan::call('db:seed', array('--class' => 'UserTableSeeder', '--force' => true));". Tämä luo käyttäjän tietokantaan tunnuksella test@test.com ja salasanalla test.
9. Muokkaa sähköpostiasetukset kuntoon tiedostosta app/config/mail.php.