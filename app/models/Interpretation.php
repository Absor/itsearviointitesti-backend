<?php

class Interpretation extends Eloquent {
    protected $fillable = array('category', 'type', 'text', 'color', 'test_id');

    public function claims()
    {
        return $this->hasMany('Claim');
    }

    public function delete()
    {
        $this->claims()->delete();

        return parent::delete();
    }
}