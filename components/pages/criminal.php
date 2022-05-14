<?php
require_once( "sparqllib.php" );

$db = sparql_connect( "https://dbpedia.org/sparql/" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );

$sparql = "
prefix category:<http://dbpedia.org/resource/Category:>
prefix dbr:<http://dbpedia.org/resource/>

SELECT ?wikiPageWikiLink WHERE {
        ?wikiPageWikiLink dbo:wikiPageWikiLink category:People_convicted_of_fraud
	}";

$result = sparql_query( $sparql ); 
if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
$fields = sparql_field_array( $result );
$count=0;
$rand=rand(1,sparql_num_rows($result));
echo($rand);
while( $row = sparql_fetch_array( $result ) )
{
	foreach( $fields as $field )
	{
		$count++;
		if($count==$rand){
			print str_replace("http://dbpedia.org/resource/","",$row[$field]);
			header('Location: http://localhost/FindACriminal/index.php?fraudster='.str_replace("http://dbpedia.org/resource/","",$row[$field]));
		}
	}
}

