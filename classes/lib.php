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
            $naredba = $konekcija->prepare("INSERT INTO oglas_za_stan (longituda, latituda, tip_oglasa,".
            " namestenost, tip_objekta, grejanje, pomocne_strukture, cena, kvadratura, broj_soba, sprat, "."
            lokacija, telefon, dodatno, uknjizenost, datum_postavljanja, memberID) "
                        . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // Povezivanje naredbe i parametara za upit. 
            // "i" označava celobrojni tip podataka. 
            // "s" označava string tip podataka.
            // "d" označava realni tip podataka.
            // PARAMETRI SE NAVODE PO REDOSLEDU U KOM SE OČEKUJU U PRIPREMLJENOM UPITU!

            $naredba->bind_param("ddsssssiiiisssssi", $o->longituda, $o->latituda, $o->tip_oglasa, $o->namestenost, 
            $o->tip_objekta, $o->grejanje, $o->pomocne_strukture, $o->cena, $o->kvadratura, $o->broj_soba, $o->sprat, 
            $o->lokacija, $o->telefon, $o->dodatno, $o->uknjizenost, $o->datum_postavljanja, $o->memberID);        
            $rezultat = $naredba->execute();
            $_SESSION['kljuc']=$konekcija->insert_id;

            $naredba->close();
            $konekcija->close();
            if (!$rezultat) {
                if ($konekcija->errno) {
                    print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
                } else {
                    print ("Nepoznata greška pri izvrsenju upita");
                }
            }

            //return $kljuc;
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

            $naredba->bind_result($stan_id, $longituda, $latituda, $tip_oglasa, $namestenost, $tip_objekta, $grejanje, 
            $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, 
            $datum_postavljanja, $memberID);
            $stan = NULL;

            if ($rezultat) {
                if ($naredba->fetch()) {

                    $stan = new oglasZaStan($stan_id, $longituda, $latituda, $tip_oglasa, $namestenost, $tip_objekta, 
                    $grejanje, $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, 
                    $dodatno, $uknjizenost, $datum_postavljanja, $memberID);
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

            $stan=new oglasZaStan($o->stan_id,$o->longituda, $o->latituda, $o->tip_oglasa, $o->namestenost, $o->tip_objekta, $o->grejanje, 
            $o->pomocne_strukture, $o->cena, $o->kvadratura, $o->broj_soba, $o->sprat, $o->lokacija, $o->telefon, $o->dodatno, 
            $o->uknjizenost, $o->datum_postavljanja, $o->memberID);
            $k=DB::dodajOglasZaStan($stan);

            $naredba = $konekcija->prepare("INSERT INTO oglas_za_cimera (pol, raspon_godina, osobine, hobi, radni_odnos, id_za_stan) "
                        . "VALUES (?, ?, ?, ?, ?, ?)");
            // Povezivanje naredbe i parametara za upit. 
            // "i" označava celobrojni tip podataka. 
            // "s" označava string tip podataka.
            // "d" označava realni tip podataka.
            // PARAMETRI SE NAVODE PO REDOSLEDU U KOM SE OČEKUJU U PRIPREMLJENOM UPITU!
            $naredba->bind_param("sisssi", $o->pol, $o->raspon_godina, $o->osobine, $o->hobi, $o->radni_odnos, $_SESSION['kljuc']);        
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
            //return $kljuc;
        }
    }

    function vratiOglasZaCimeraStan_id($cimer_id)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {

            

            $naredba = $konekcija->prepare("SELECT cimer_id, pol, raspon_godina, osobine, hobi, radni_odnos, id_za_stan".
            " FROM oglas_za_cimera INNER JOIN oglas_za_stan ON oglas_za_cimera.id_za_stan = oglas_za_stan.stan_id WHERE id_za_stan=?");
            $naredba->bind_param("i", $cimer_id);
            $rezultat = $naredba->execute();

            $stan=DB::vratiOglasZaStan($cimer_id);
            //var_dump($stan);

            $naredba->bind_result($cimer_id,$pol,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);
            $cimer = NULL;

            /*$stan=null;
            $sql = $konekcija->prepare("SELECT * FROM oglas_za_stan WHERE id_za_stan=stan_id");
            $rezultat = $naredba->execute();*/

            if ($rezultat) {
                if ($naredba->fetch()) {

                    $cimer = new oglasZaCimera($stan->stan_id, $stan->longituda, $stan->latituda, $stan->tip_oglasa, $stan->namestenost, 
                    $stan->tip_objekta, $stan->grejanje, $stan->pomocne_strukture, $stan->cena, $stan->kvadratura, $stan->broj_soba, $stan->sprat, 
                    $stan->lokacija, $stan->telefon, $stan->dodatno, $stan->uknjizenost, $stan->datum_postavljanja, $stan->memberID, 
                    $cimer_id,$pol,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);
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


            $naredba->bind_result($stan_id, $longituda, $latituda, $tip_oglasa, $namestenost, $tip_objekta, $grejanje, 
            $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, 
            $datum_postavljanja, $memberID);

            if ($rezultat) {
                $niz = array();

                while ($naredba->fetch()) 
                {

                   $niz[] = array('id'=> $stan_id,'longituda'=>$longituda,'latituda'=>$latituda,'tip_oglasa'=>$tip_oglasa,'namestenost'=>
                    $namestenost,'tip_objekta'=>$tip_objekta,'grejanje'=>$grejanje,'pomocne_strukture'=>$pomocne_strukture,'cena'=>
                    $cena,'kvadratura'=>$kvadratura,'broj_soba'=>$broj_soba,'sprat'=>$sprat,'lokacija'=>$lokacija,'telefon'=>
                    $telefon,'dodatno'=>$dodatno,'uknjizenost'=>$uknjizenost,'datum_postavljanja'=>$datum_postavljanja,'memberID'=>$memberId);
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

            $naredba->bind_result($cimer_id,$pol,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);

            if ($rezultat) {
                $niz = array();

                while ($naredba->fetch()) 
                {
                    //$niz[$cimer_id] = new oglasZaCimera($cimer_id,$pol,$lifestyle,$raspon_godina,$osobine,$hobi,$radni_odnos,$id_za_stan);

                    $niz[] = array('cimer_id'=> $cimer_id,'tip'=>'cimer','pol'=>$pol,'raspon_godina'=>$raspon_godina,'osobine'=>
                    $osobine,'hobi'=>$hobi,'radni_odnos'=>$radni_odnos,'id_za_stan'=>$id_za_stan);
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


            $naredba->bind_result($stan_id, $longituda, $latituda, $tip_oglasa, $namestenost, $tip_objekta, $grejanje, 
            $pomocne_strukture, $cena, $kvadratura, $broj_soba, $sprat, $lokacija, $telefon, $dodatno, $uknjizenost, 
            $datum_postavljanja, $memberID);

            if ($rezultat) {
                $niz = array();

                while ($naredba->fetch()) 
                {
                    //$niz[$stan_id] = new Marker($stan_id, $longituda, $latituda);
                    $niz[] = array('id'=> $stan_id,'tip_oglasa'=>$tip_oglasa,'longituda'=>$longituda,'latituda'=>$latituda );
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


    function dodajSliku($ime,$stan_id)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        // koristimo charset utf8 za prikaz karaktera van osnovne ASCII tabele
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            // u slučaju greške pri povezivanju odštampati odgovarajuću poruku
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {

            $tekst_upita = "INSERT INTO image (name,stan_id) VALUES ('$ime','$stan_id')";
            $rezultat = $konekcija->query($tekst_upita);

            // ovde $rezultat moze biti samo true ili false posto se nista ne vraca iz baze
            if ($rezultat) {
                // zatvaranje konekcije
                $konekcija->close();
            }
            else{
                if ($konekcija->errno) {
                    // u slucaju greške pri izvršenju upita odštampati odgovarajucu poruku
                    print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
                } else {
                    // u slucaju greške pri izvršenju upita odštampati odgovarajucu poruku
                    print ("Nepoznata greška pri izvrsenju upita");
                }
            }
        }
    }

    function prikaziSlike($id)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        // koristimo charset utf8 za prikaz karaktera van osnovne ASCII tabele
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            // u slučaju greške pri povezivanju odštampati odgovarajuću poruku
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {
            $naredba = $konekcija->prepare("SELECT name FROM image WHERE stan_id=?");
            $naredba->bind_param("i", $id);
            $rezultat = $naredba->execute();

            $naredba->bind_result($naziv);

            // ovde $rezultat moze biti samo true ili false posto se nista ne vraca iz baze
            if ($rezultat) {
                $niz = array();

                while ($naredba->fetch()) 
                {
                    $niz[] = array('naziv'=>$naziv);

                    //echo '<img height="200" width="200" src="data:image;base64,'.$niz[2].' "> ';
                    //echo "<img height='250' width='250' src=$niz[1]>";
                }

                $konekcija->close();
                return $niz;
            }
            else{
                if ($konekcija->errno) {
                    // u slucaju greške pri izvršenju upita odštampati odgovarajucu poruku
                    print ("Greška pri izvrsenju upita ($konekcija->errno): $konekcija->error");
                } else {
                    // u slucaju greške pri izvršenju upita odštampati odgovarajucu poruku
                    print ("Nepoznata greška pri izvrsenju upita");
                }
            }
        }
    }


    function izmeniStan(oglasZaStan $o)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {

            $naredba = $konekcija->prepare("UPDATE oglas_za_stan (longituda, latituda, namestenost, tip_objekta, ".
            "grejanje, pomocne_strukture, cena, kvadratura, broj_soba, sprat, lokacija, telefon, dodatno, uknjizenost, "."
            datum_postavljanja, memberID) "
            . "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            // Povezivanje naredbe i parametara za upit. 
            // "i" označava celobrojni tip podataka. 
            // "s" označava string tip podataka.
            // "d" označava realni tip podataka.
            // PARAMETRI SE NAVODE PO REDOSLEDU U KOM SE OČEKUJU U PRIPREMLJENOM UPITU!

            $naredba->bind_param("ddssssiiiisssssi", $o->longituda, $o->latituda, $o->namestenost, $o->tip_objekta, 
            $o->grejanje, $o->pomocne_strukture, $o->cena, $o->kvadratura, $o->broj_soba, $o->sprat, $o->lokacija, 
            $o->telefon, $o->dodatno, $o->uknjizenost, $o->datum_postavljanja, $o->memberID);        
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

    function vratiStanISlike($id)
    {
        $stan=DB::vratiOglasZaStan($id);
        $slike=DB::prikaziSlike($id);
        return array('stan'=>$stan,'slike'=>$slike);
    }

    function vratiCimeraISlike($id)
    {
        $stan=DB::vratiOglasZaCimeraStan_id($id);
        $slike=DB::prikaziSlike($id);
        return array('stan'=>$stan,'slike'=>$slike);
    }

    function obrisiStan($id)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        // koristimo charset utf8 za prikaz karaktera van osnovne ASCII tabele
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            // u slučaju greške pri povezivanju odštampati odgovarajuću poruku
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {
            $naredba = $konekcija->prepare("DELETE FROM oglas_za_stan WHERE stan_id = ?");
            $naredba->bind_param("i", $id);
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

    function obrisiCimera($id)
    {
        $konekcija = new mysqli(self::host, self::username, self::password, self::dbName);
        // koristimo charset utf8 za prikaz karaktera van osnovne ASCII tabele
        $konekcija->set_charset('utf8');
        if ($konekcija->connect_errno) {
            // u slučaju greške pri povezivanju odštampati odgovarajuću poruku
            print ("Greška pri povezivanju sa bazom podataka ($konekcija->connect_errno): $konekcija->connect_error");
        } else {
            $naredba = $konekcija->prepare("DELETE FROM oglas_za_cimera WHERE cimer_id = ?");
            $naredba->bind_param("i", $id);
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
}

?>