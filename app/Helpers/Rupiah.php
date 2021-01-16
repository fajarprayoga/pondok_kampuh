<?php
namespace App\Helpers;

      function rupiah($angka = 0){

            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah;
            
      }

?>