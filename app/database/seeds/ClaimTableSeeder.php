<?php

class ClaimTableSeeder extends Seeder {

    public function run()
    {
        Eloquent::unguard();

        DB::table('claims')->delete();

        Claim::create(array(
            "interpretation_id" => 1,
            "text" => "En luota itseeni kirjoittajana.",
            "claimgroupId" => 1
        ));

        Claim::create(array(
            "interpretation_id" => 1,
            "text" => "Minun on joskus vaikeaa asettaa omia tavoitteitani kirjoittamiselle.",
            "claimgroupId" => 3
        ));

        Claim::create(array(
            "interpretation_id" => 1,
            "text" => "Kirjoittamiseen keskittyminen on usein hankalaa.",
            "claimgroupId" => 5
        ));

        Claim::create(array(
            "interpretation_id" => 1,
            "text" => "Suhtaudun omaan tekstiini liiankin kriittisesti, mikä toisinaan ahdistaa ja vaikeuttaa kirjoittamista.",
            "claimgroupId" => 7
        ));

        Claim::create(array(
            "interpretation_id" => 1,
            "text" => "Kirjoittaminen on ahdistavaa alusta loppuun.",
            "claimgroupId" => 9
        ));

        Claim::create(array(
            "interpretation_id" => 1,
            "text" => "Täydellisyyteen pyrkiminen vaikeuttaa kirjoittamista, joten yleensä en kirjoita tosissani.",
            "claimgroupId" => 11
        ));

        Eloquent::guard();
    }

}