<?php

class Rumah{
    //property
    public $warnaCat = "Putih";
    public $jmlKamar = 10;
    public $alamat = "Jl. Setiabudhi";

    //method
    public function __costruct($warnaCat, $jmlKamar){
        $this->warnaCat = $warnaCat;
        $this->jmlKamar = $jmlKamar;

    }


    public function kunciPintu(){
        return "Rumah ini dikunci";
    }

    public function gantiWarna($warnaCat){
        $this->warnaCat = $warnaCat;
    }

}

function pasangListrik (Rumah $rumah){
    return "Listrik sudah terpasang, rumah yang berwarna ".
    $rumah->warnaCat;
}

$rumahAndi = new Rumah("Merah", 5);
echo pasangListrik($rumahAndi);
echo "<br>";

// Rumah Saya
$rumahSaya = new Rumah("Biru", 10);
//$rumahSaya->gantiWarna('Biru');
echo "Rumah saya: ". $rumahSaya->warnaCat;
echo "<br>";
echo "Jumlah Kamar: ". $rumahSaya->jmlKamar;
echo "<br>";

// Rumah Tetangga
$rumahTetangga = new Rumah("Oren", 1);
//$rumahTetangga->gantiWarna('Oren');
echo "Rumah Tetangga: ". $rumahTetangga->warnaCat;
echo "<br>";
echo "Jumlah Kamar: ". $rumahTetangga->jmlKamar;
echo "<br>";


?>