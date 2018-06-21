<?php

class oglasZaStan
{
    public $stan_id;
    public $longituda;
    public $latituda;
    public $tip_oglasa;
    public $namestenost;
    public $tip_objekta;
    public $grejanje;
    public $pomocne_strukture;
    public $cena;
    public $kvadratura;
    public $broj_soba;
    public $sprat;
    public $lokacija;
    public $telefon;
    public $dodatno;
    public $uknjizenost;
    public $datum_postavljanja;
    public $memberID;

    public function __construct($stan_id,$longituda,$latituda,$tip_oglasa,$namestenost,$tip_objekta,$grejanje,$pomocne_strukture,$cena,$kvadratura,$broj_soba,$sprat,$lokacija,$telefon,$dodatno,$uknjizenost,$datum_postavljanja,$memberID)
    {
        $this->stan_id=$stan_id;
        $this->longituda=$longituda;
        $this->latituda=$latituda;
        $this->tip_oglasa=$tip_oglasa;
        $this->namestenost=$namestenost;
        $this->tip_objekta=$tip_objekta;
        $this->grejanje=$grejanje;
        $this->pomocne_strukture=$pomocne_strukture;
        $this->cena=$cena;
        $this->kvadratura=$kvadratura;
        $this->broj_soba=$broj_soba;
        $this->sprat=$sprat;
        $this->lokacija=$lokacija;
        $this->telefon=$telefon;
        $this->dodatno=$dodatno;
        $this->uknjizenost=$uknjizenost;
        $this->datum_postavljanja=$datum_postavljanja;
        $this->memberID=$memberID;
    }
}

?>