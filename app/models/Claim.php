<?php

class Claim extends Eloquent {
    protected $fillable = array('text', 'claimgroupId', 'interpretation_id');
}