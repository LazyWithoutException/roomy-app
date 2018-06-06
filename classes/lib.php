<?php
include_once 'oglasZaStan.php';
include_once 'oglasZaCimera.php';
include_once 'marker.php';

class DB 
{
    const host = "localhost";
    const username = "root";
    const password = "";
    const dbName = "roomy";
    

    function dodajOglasZaStan(oglasZaStan $o)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {
            $naredba = $konekcija->prepare("INSERT INTO oglas_za_stan (longituda, latituda, namestenost, tip_objekta, grejanje, pomocne_strukture, cena, kvadratura, broj_soba, sprat, lokacija, telefon, dodatno, uknjizenost, datum_postavljanja, memberID) "
                        . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // Povezivanje naredbe i parametara za upit. 
            // "i" označava celobrojni tip podataka. 
            // "s" označava string tip podataka.
            // "d" označava realni tip podataka.
            // PARAMETRI SE NAVODE PO REDOSLEDU U KOM SE OČEKUJU U PRIPREMLJENOM UPITU!
            $naredba->bind_param("ddssssiiiisssssi", $o->longituda, $o->latituda, $o->namestenost, $o->tip_objekta, $o->grejanje, $o->pomocne_strukture, $o->cena, $o->kvadratura, $o->broj_soba, $o->sprat, $o->lokacija, $o->telefon, $o->dodatno, $o->uknjizenost, $o->datum_postavljanja, $o->memberID);        
            $rezultat = $naredba->execute();
            $naredba->close();
            $konekcija->close();
            if (!$rezultat) {
                if ($konekcija->errno) {
                    print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
                } else {
                    print ("Nepoznata greška pri izvrsenju upita");
                }
            }
        }
    }

    function vratiOglasZaStan($stan_id)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {
            $naredba = $konekcija->prepare("SELECT * FROM oglas_za_stan WHERE stan_id=?");
            $naredba->bind_param("i", $stan_id);
            $rezultat = $naredba->execute();

            $naredba->bind_result($stan_id, $longituda, $latituda, $namestenost, $tip_objekta, $grejanje, $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, $datum_postavljanja, $memberID);
            $stan = NULL;

            if ($rezultat) {
                if ($naredba->fetch()) {
                    $stan = new oglasZaStan($stan_id, $longituda, $latituda, $namestenost, $tip_objekta, $grejanje, $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, $datum_postavljanja, $memberID);
                }
                // Zatvaranje naredbe i konekcije. 
                $naredba->close();
                $konekcija->close();
                return $stan;
            } else if ($konekcija->errno) {
                // U slučaju greške pri izvršenju upita odštampati odgovarajucu poruku
                print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
            } else {
                // U slučaju greške pri izvršenju upita odštampati odgovarajucu poruku
                print ("Nepoznata greška pri izvrsenju upita");
            }
        }
    }

    function dodajOglasZaCimera(oglasZaCimera $o)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {

            $stan=new oglasZaStan($o->stan_id,$o->longituda, $o->latituda, $o->namestenost, $o->tip_objekta, $o->grejanje, $o->pomocne_strukture, $o->cena, $o->kvadratura, $o->broj_soba, $o->sprat, $o->lokacija, $o->telefon, $o->dodatno, $o->uknjizenost, $o->datum_postavljanja, $o->memberID);
            DB::dodajOglasZaStan($stan);

            $naredba = $konekcija->prepare("INSERT INTO oglas_za_cimera (pol, lifestyle, raspon_godina, osobine, hobi, radni_odnos, id_za_stan) "
                        . "VALUES (?, ?, ?, ?, ?, ?, ?)");
            // Povezivanje naredbe i parametara za upit. 
            // "i" označava celobrojni tip podataka. 
            // "s" označava string tip podataka.
            // "d" označava realni tip podataka.
            // PARAMETRI SE NAVODE PO REDOSLEDU U KOM SE OČEKUJU U PRIPREMLJENOM UPITU!
            $naredba->bind_param("ssisssi", $o->pol, $o->lifestyle, $o->raspon_godina, $o->osobine, $o->hobi, $o->radni_odnos, $o->stan_id);        
            $rezultat = $naredba->execute();
            $naredba->close();
            $konekcija->close();
            if (!$rezultat) {
                if ($konekcija->errno) {
                    print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
                } else {
                    print ("Nepoznata greška pri izvrsenju upita");
                }
            }
        }
    }

    function vratiOglasZaCimera($cimer_id)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {
            $naredba = $konekcija->prepare("SELECT * FROM oglas_za_cimera INNER JOIN oglas_za_stan WHERE cimer_id=? AND id_za_stan=stan_id");
            $naredba->bind_param("i", $cimer_id);
            $rezultat = $naredba->execute();

            $naredba->bind_result($cimer_id,$pol,$lifestyle,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);
            $cimer = NULL;

            /*$stan=null;
            $sql = $konekcija->prepare("SELECT * FROM oglas_za_stan WHERE id_za_stan=stan_id");
            $rezultat = $naredba->execute();*/

            if ($rezultat) {
                if ($naredba->fetch()) {
                    $cimer = new oglasZaCimera($cimer_id,$pol,$lifestyle,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);
                }
                // Zatvaranje naredbe i konekcije. 
                $naredba->close();
                $konekcija->close();
                return $cimer;
            } else if ($konekcija->errno) {
                // U slučaju greške pri izvršenju upita odštampati odgovarajucu poruku
                print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
            } else {
                // U slučaju greške pri izvršenju upita odštampati odgovarajucu poruku
                print ("Nepoznata greška pri izvrsenju upita");
            }
        }
    }

    function vratiSveStanove()
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');

        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } 
        else 
        {
            $memberId=intval($_SESSION['memberID']);
            $naredba = $konekcija->prepare("SELECT * FROM oglas_za_stan WHERE memberID=?  ORDER BY stan_id ASC");
            $naredba->bind_param("i", $memberId);
            $rezultat = $naredba->execute();

            $naredba->bind_result($stan_id, $longituda, $latituda, $namestenost, $tip_objekta, $grejanje, $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, $datum_postavljanja, $memberID);

            if ($rezultat) {
                $niz = array();

                while ($naredba->fetch()) 
                {
                    $niz[$stan_id] = new oglasZaStan($stan_id, $longituda, $latituda, $namestenost, $tip_objekta, $grejanje, $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, $datum_postavljanja, $memberID);
                }

                $naredba->close();
                $konekcija->close();
                return $niz;
            }
            else if ($konekcija->errno) {
                print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
            }
            else {
                print ("Nepoznata greška pri izvrsenju upita");
            }
        }
    }

    function vratiSveCimere()
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');

        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } 
        else 
        {
            $naredba = $konekcija->prepare("SELECT * FROM oglas_za_cimera ORDER BY cimer_id ASC");
            $rezultat = $naredba->execute();

            $naredba->bind_result($cimer_id,$pol,$lifestyle,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);

            if ($rezultat) {
                $niz = array();

                while ($naredba->fetch()) 
                {
                    $niz[$cimer_id] = new oglasZaCimera($cimer_id,$pol,$lifestyle,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);
                }

                $naredba->close();
                $konekcija->close();
                return $niz;
            }
            else if ($konekcija->errno) {
                print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
            }
            else {
                print ("Nepoznata greška pri izvrsenju upita");
            }
        }
    }

    function vratiSveMarkere()
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');

        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } 
        else 
        {
            $naredba = $konekcija->prepare("SELECT * FROM oglas_za_stan ORDER BY stan_id ASC");
            $rezultat = $naredba->execute();

            $naredba->bind_result($stan_id, $longituda, $latituda, $namestenost, $tip_objekta, $grejanje, $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, $datum_postavljanja, $memberID);

            if ($rezultat) {
                $niz = array();

                while ($naredba->fetch()) 
                {
                    $niz[$stan_id] = new Marker($stan_id, $longituda, $latituda);
                }

                $naredba->close();
                $konekcija->close();
                return $niz;
            }
            else if ($konekcija->errno) {
                print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
            }
            else {
                print ("Nepoznata greška pri izvrsenju upita");
            }
        }
    }
}

?>