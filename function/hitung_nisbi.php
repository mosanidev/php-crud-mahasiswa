<?php 

    function hitung_nisbi($nts, $nas) {

        $na = 0.4*$nts+0.6*$nas;
        
        if ($na >= 81) {

            return "A";

        } else if ($na >= 73 && $na < 81) {

            return "AB";

        } else if ($na >= 66 && $na < 73) {

            return "B";

        } else if ($na >= 60 && $na < 66) {

            return "BC";

        } else if ($na >= 55 && $na < 60) {

            return "C";

        } else if ($na >= 40 && $na < 55) {

            return "D";

        } else if ($na < 40) {

            return "E";

        }

    }

?>