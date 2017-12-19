<?php
function hentFacts($link){
    $hentFacts = mysqli_query($link, "SELECT text FROM facts ORDER BY rand() LIMIT 1"); /* vælger værdien af text fra tabellen facts, sorterer efter tilfældige tal, max 1 (henter kun 1 værdi (den øverste) ud af hvor mange resultater, som der er) */
    
    while($facts = mysqli_fetch_array($hentFacts)){
        echo $facts["text"];
    }
}