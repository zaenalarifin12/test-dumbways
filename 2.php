<?php 

/**
 * function untuk memfilter kata-kata pada array1 dan array2
 * 
 * jika ketemu ubah huruf vokalnya jadi (paramter yang ditentukan)
 * 
 */

 $array1    = ["apa" ,"saya", "anda", "kamu", "hallo"];
 $array2    = [
     "apa yang anda lakukan ?",
     "selamat pagi",
     "kamu cantik juga ya",
     "yukk belajar javascript",
     "kamu itu adalah kebanggaan saya",
     "music hari ini yang akan muncul oleh gabut FM apa ya?"
 ];
 $vc    = "i";

 function filterKonversiArray($array1, $array2, $vc){

    /**
     * step2
     * 
     *  - looping array2
     *  - string di array 2 buat jadi array dulu (explode)
     *  - looping hasil explode 
     *  - looping array1
     *  - isi ke array baru
     */

     $muncul = [];

     // kegunaan untuk mencari jumlah kata yang ada di string
     foreach ($array2 as $value) {
        
        $hasilexplode = explode(" ", $value);
        
        foreach ($hasilexplode as $value2) {
            
            foreach ($array1 as $valueArray1) {
                
                if ($valueArray1 == $value2){

                    if(empty($muncul[$valueArray1])){
                        $muncul[$valueArray1] = 1;
                    }else{
                        $jumlah_muncul = $muncul[$valueArray1];
                        $muncul[$valueArray1] = $jumlah_muncul + 1;
                    }

                }

            }

         }
     }

     // kegunaan untuk mengurutkan berdasarkan array1
     $hasil_filter = [];
     foreach ($array1 as $key => $value) {

        if (array_key_exists($value, $muncul)) {
            foreach ($muncul as $key1 => $value1) {
                if($value == $key1){
                    $hasil_filter[$value] = $value1;
                }
            }
        }else{
            $hasil_filter[$value] = 0;
        }  
     }
     

     // mengganti huruf vokal menjadi sesuai params
     $vokal = ["a", "i", "u", "e", "o"];
     $hasil_convert = [];
     /**
      * looping array2 
      * -split ke array
        - looping hurung vokal
        - jika ada huruf vokalnya di array maka ganti ke params vokal
        - implode ke string
        - masukan ke array baru
      */

      foreach ($array2 as $value) {
          $split = str_split($value);
          foreach ($split as $key1 => $value1) {
              foreach ($vokal as $keyVokal => $valueVokal) {
                  if ($value1 == $valueVokal) {
                      $split[$key1] = $vc;
                  }
              }
          }

          array_push($hasil_convert, [$value, implode($split)]);
      }

    echo "HASIL FILTER DAN KONVERSI <br>";

    foreach ($hasil_filter as $key => $value) {
        echo "Kata $key apa muncul sebanyak : $value <br>";
    }
    echo "<br>";
    foreach ($hasil_convert as $key => $value) {
        echo $value[0] . " => <b>" . $value[1] . "</b> <br>";
        // foreach ($value as $val) {
            
        // }
    }

 }

 filterKonversiArray($array1, $array2, $vc);

?>