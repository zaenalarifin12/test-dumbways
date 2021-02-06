<?php

/**
 * function sederhana untuk menghitung total gaji pegawai
 * 
 *  params
 *      - per golongan          => (Golongan I, Golongan II, Golongan III, Golongan IV)
 *      - jenis kelamin         => (laki-laki, perempuan)
 *      - status perkawinan     => (menikah, belum menikah)
 *      - jumlah anak           => (1,2,dst) (integer)
 *   
 */

 /**
  * return gaji pokok + tunjangan (integer)
  */
 function hitungGaji($kategoriGolongan, $gender, $menikah, $jumlah_anak )
 {
     $gajiPokok = 0;

     $gajiTunjangan = 0;

     $gajiPokokdanTunjangan = 0;
     
     $tunjanganAnak         = 0;
     
     $tunjanganMenikah      = 0;

     $potonganPensiun       = 200_000;

     $potonganBpjs          = 150_000;
     
     $pajak = 10/100;
     
     $total = 0;

     switch ($kategoriGolongan) {
         case 'Golongan I':
            
            $gajiPokok = 1_500_000;

            $gajiTunjangan = 200_000;

            $gajiPokokdanTunjangan  = $gajiPokok + $gajiTunjangan;
            
            break;
         
        case 'Golongan II':
            
            $gajiPokok = 2_000_000;

            $gajiTunjangan = 400_000;
            
            $gajiPokokdanTunjangan  = $gajiPokok + $gajiTunjangan;

            break;
         
        case 'Golongan III':
            
            $gajiPokok = 3_000_000;

            $gajiTunjangan = 600_000;
            
            $gajiPokokdanTunjangan  = $gajiPokok + $gajiTunjangan;

            break;
         
        case 'Golongan IV':

            $gajiPokok = 4_000_000;

            $gajiTunjangan = 1_000_000;

            $gajiPokokdanTunjangan  = $gajiPokok + $gajiTunjangan;

            break;
                    
         default:
            
            $gajiPokok = 0;

            $gajiTunjangan = 0;
            
            $gajiPokokdanTunjangan  = 0;
            
            break;
     }


     if ($menikah == "Menikah") {
        switch ($gender) {
            case 'Laki-laki':
                $tunjanganMenikah = 200_000;
                break;
   
           case 'Perempuan':
               $tunjanganMenikah = 0;
               break;
            
            default:
                throw new Exception("jenis kelamin tidak ada");
                break;
        }
     }else{
        $tunjanganMenikah;
     }
     
     if($jumlah_anak > 0 )
        $tunjanganAnak  = $jumlah_anak * 100_000;
     else
        $tunjanganAnak;
     
    $total = ($gajiPokokdanTunjangan + $tunjanganAnak + $tunjanganMenikah);

    $pajak10percen = $total * $pajak;

    $gajiBersih = $total - ($pajak10percen + $potonganPensiun + $potonganBpjs);

    echo "HASIL PERHITUNGAN GAJI  <br>";
    echo "=====================   <br>";
    echo "INFO PEGAWAI            <br>";
    echo "=====================   <br>";
    echo "PEGAWAI YANG BERSANGKUTAN   <br>";
    echo "Golongan = $kategoriGolongan<br>";
    echo "Jenis Kelamin = $gender     <br>";
    echo "Jumlah anak = $jumlah_anak  <br>";
    echo "============================<br>";
    echo "GAJI DAN TUNJANGAN          <br>";
    echo "============================<br>";
    echo "Gaji Pokok : $gajiPokok <br>";
    echo "Gaji Tunjangan : $gajiTunjangan <br>";
    echo "Gaji Tunjangan Istri : $tunjanganMenikah <br>";
    echo "Gaji Tunjangan Anak : $tunjanganAnak <br>";
    echo "Total : $total <br>";
    echo "Pajak 10% : " . ($pajak10percen)."<br>";
    echo "Gaji Sementara : ". ($total - $pajak10percen) ." <br>";
    echo "===============================<br>";
    echo "GAJI BERSIH                    <br>";
    echo "===============================<br>";
    echo "Potongan pensiun : $potonganPensiun   <br>";
    echo "Potongan pensiun : $potonganBpjs      <br>";
    echo "Gaji Bersih $gajiBersih               <br>";


}

hitungGaji("Golongan IV","Laki-laki","Menikah",1)
?>