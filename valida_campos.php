<?php
 function valida_campo($campo)
 {
     $campo=trim($campo);//elimina espacios y otros caracteros por delante y por detras
     $campo=stripcslashes($campo);// elimina las barras inveritdas \
     $campo=stripslashes($campo);// elimina barras normales /
     $campo=htmlspecialchars($campo);// limpia caracteres especiales
     return $campo;// devuelve el valor limpio
 }


