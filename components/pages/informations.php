<?php
    require_once( "sparqllib.php" );
    
    $fraudster = isset($_GET["fraudster"]) ? $_GET["fraudster"] : false;
    if($fraudster){
        $db = sparql_connect( "https://dbpedia.org/sparql/" );
        if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

        $sparql = '
        prefix owl: <http://dbpedia.org/ontology/>
        prefix dbr:<http://dbpedia.org/resource/>
        prefix rdfs:<http://www.w3.org/2000/01/rdf-schema#>

        select ?abstract ?name where { 
            dbr:'.$fraudster.' owl:abstract ?abstract;
            rdfs:label ?name.
            filter(langMatches(lang(?abstract),"en"))
            filter(langMatches(lang(?name),"en"))
        }';

        $result = sparql_query( $sparql );
        $row = sparql_fetch_array( $result );
        echo "<h1 class='text-center'>".$row["name"]."</h1>";
        echo "<p class='text-center'>".$row["abstract"]."</p>";
        include "./components/pages/commentaire.php";
    }    
    else echo "<h1>Press the button !</h1>"
?>