<?php

class oglasZaCimera extends oglasZaStan
{
    public $cimer_id;
    public $pol;
    public $raspon_godina;
    public $osobine;
    public $hobi;
    public $radni_odnos;
    public $id_za_stan;

    
public function __construct($stan_id,$longituda,$latituda,$namestenost,$tip_objekta,$grejanje,$pomocne_strukture,$cena,$kvadratura,$broj_soba,$sprat,$lokacija,$telefon,$dodatno,$uknjizenost,$datum_postavljanja,$memberID,$cimer_id,$pol,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan)
    {
        parent::__construct($stan_id,$longituda,$latituda,$namestenost,$tip_objekta,$grejanje,$pomocne_strukture,$cena,$kvadratura,$broj_soba,$sprat,$lokacija,$telefon,$dodatno,$uknjizenost,$datum_postavljanja,$memberID);
    
        $this->cimer_id=$cimer_id;
        $this->pol=$pol;
        $this->raspon_godina=$raspon_godina;
        $this->osobine=$osobine;
        $this->hobi=$hobi;
        $this->radni_odnos=$radni_odnos;
        $this->id_za_stan=$id_za_stan;
    }
}

?>