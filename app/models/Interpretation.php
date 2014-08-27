<?php

class Interpretation extends Eloquent {
    protected $fillable = array('category', 'type', 'text', 'color');

    public function claims()
    {
        return $this->hasMany('Claim');
    }
}