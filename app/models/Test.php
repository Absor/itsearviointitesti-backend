<?php

class Test extends Eloquent {
    protected $fillable = array('title', 'maxChosenPerGroup', 'showInterpretationThreshold', 'descriptionPageText', 'testPagesText', 'interpretationPageText');

    public function interpretations()
    {
        return $this->hasMany('Interpretation');
    }

    public function claims()
    {
        return $this->hasManyThrough('Claim', 'Interpretation');
    }

    public function completeds()
    {
        return $this->hasMany('Completed');
    }

    public function delete()
    {
        $claimIds = $this->claims->modelKeys();
        if (count($claimIds) > 0) {
            Claim::whereIn('id', $claimIds)->delete();
        }

        $this->interpretations()->delete();
        $this->completeds()->delete();

        return parent::delete();
    }
}