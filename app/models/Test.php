<?php

class Test extends Eloquent {
    protected $fillable = array('title', 'maxChosenPerGroup', 'showInterpretationThreshold', 'descriptionPageText', 'testPagesText', 'interpretationPageText');

    public function interpretations()
    {
        return $this->hasMany('Interpretation');
    }
}