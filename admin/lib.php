<?php
function convertDateTimeDBtoIndo($string){
    // contoh : 2019-01-30 10:20:20
    
    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];
 
    $date = explode(" ", $string)[0];
    $time = explode(" ", $string)[1];
    
    $tanggal = explode("-", $date)[2];
    $bulan = explode("-", $date)[1];
    $tahun = explode("-", $date)[0];
    
    
 
    return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun . " " . $time;
}
?>