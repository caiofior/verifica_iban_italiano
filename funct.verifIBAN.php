<?php
$iban = 'IT35I0513216906859570387339'; //GOOD
//$iban = 'IT19E0513216906859570387339';  //BAD
//$iban = 'IT25I0513216906859570387339'; //BAD 2

echo $iban.PHP_EOL;
echo verifIBAN($iban).PHP_EOL;
function verifIBAN(&$iban) {
   //Verifica lunghezza
   if( strlen($iban) != 27)
      return ("lunghezza errata");
	$iban = strtoupper($iban);
   //Verifica che sia un codice italiano
   if (substr($iban, 0,2) != 'IT') {
      return ("conto non italiano");
   }
   //Verifica BBAN
   $riban = substr($iban, 4);
   $dispari = array(1,0,5,7,9,13,15,17,19,21,2,4,18,20,11,3,6,8,12,14,16,10,22,25,24,23);
   $s=0;
   for ($i = 0; $i < strlen($riban); $i++) {
      
      
      $car = substr($riban,$i,1);
      $ord = ord($car);
               
         if ( $ord > 47 && $ord < 58) { 
            if ($i == 0) {
               return("formato non valido");
            } 
            $k = $ord - 48; 
         } 
         else if ($ord > 65  && $ord <= 90) 
         { 
            if ($i > 0   && $i <= 10) {
               return("formato non valido");

            } 
            $k = $ord - 65; 
         } 
         else {
            return("formato non valido");
         } 
         if ($i == 0) {
            $kcin = $k; 
         }
         else if ($i % 2 == 0) {
            $s = $s + $k; 
         }
         else {
            $s = $s + $dispari[$k]; 
         }
        } 
        if ($s % 26 != $kcin) {
           return("codice di controllo errato");
        }
        //Verifica IBAN
        $numeri = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        $riban = substr($iban, 4).substr($iban,0, 4);

        $longint = '';
        for ($c = 0 ; $c < strlen($riban); $c++) {
           $longint .= array_search(substr($riban,$c,1), $numeri);
        }
        
         $length = strlen($longint);
         $rest = "";
         $position = 0;
         while ($position < $length) {
                $value = 9-strlen($rest);
                $n = $rest . substr($longint,$position,$value);
                $rest = $n % 97;
                $position = $position + $value;
         }
         if($rest != 1) {
            return("codice di controllo errato");
         }
         $i ='';
        
         while (strlen($longint) > 6)
         {
                $i = substr($longint,0,6) % 97;
                $longint = $i .substr($longint, 6);
         }
         $i = substr($longint,0,6) % 97;

        
        
      return ("OK");
}
