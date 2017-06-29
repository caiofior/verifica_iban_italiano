# verifica_iban_italiano
Verifica IBAN Italiano

La verifica di un'IBAN è cosa complicata, i principali passaggi per un codice italiano :
 * Lunghezza di 27 caratteri;
 * Le prime due lettere sono IT;
 * Verificare il BBAN (la parte nazionale del codice di 23 caratteri). L'ispirazione è la seguente http://alexandrerodichevski.chiappani.it/doc.php?n=218 ;
 * Verificare l'intero IBAN . L'ispirazione è la seguente http://bastianello.blogspot.it/2008/04/controllo-validit-iban-nuovo-algoritmo.html e https://github.com/globalcitizen/php-iban/blob/master/php-iban.php .
 
 I meccanismi di validazione sono due e due le sequenze di controllo (CIN e CIN euro)
 
 https://it.wikipedia.org/wiki/International_Bank_Account_Number#Italia
