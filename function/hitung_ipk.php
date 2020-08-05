<?php 

    function hitung_ipk($sks, $nisbi) {

        $bobot_nilai = [];

        for ($i = 0; $i < count($nisbi); $i++){

            if ($nisbi[$i] == "A") {

                array_push($bobot_nilai, $sks[$i]*4);

            } else if ($nisbi[$i] == "AB") {

                array_push($bobot_nilai, $sks[$i]*3.5);

            } else if ($nisbi[$i] == "B") {

                array_push($bobot_nilai, $sks[$i]*3);
                
            } else if ($nisbi[$i] == "BC") {

                array_push($bobot_nilai, $sks[$i]*2.5);
                
            } else if ($nisbi[$i] == "C") {

                array_push($bobot_nilai, $sks[$i]*2);
                
            } else if ($nisbi[$i] == "D") {

                array_push($bobot_nilai, $sks[$i]*1);
                
            }
        }   

        // hitung total sks
        $total_sks = array_sum($sks);

        // hitung total bobot nilai
        $total_bobot_nilai = array_sum($bobot_nilai);

        if ($total_sks == 0 || $total_bobot_nilai == 0) {

            return "0";

        } else {

            return $total_bobot_nilai/$total_sks;

        }
    }


?>