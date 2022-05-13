<?php
require_once( "sparqllib.php" );

$db = sparql_connect( "https://dbpedia.org/sparql/" );
if( !$db ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }
sparql_ns( "foaf","http://xmlns.com/foaf/0.1/" );

$sparql = "
prefix dbo:<http://dbpedia.org/ontology/>
prefix rdf:<http://www.w3.org/1999/02/22-rdf-syntax-ns#>
prefix dbr:<http://dbpedia.org/resource/>

SELECT * WHERE { 
	?criminal dbo:wikiPageWikiLink dbr:Harassment.
    ?criminal dbo:wikiPageWikiLink dbr:France.

	} LIMIT 10";

$result = sparql_query( $sparql ); 
if( !$result ) { print sparql_errno() . ": " . sparql_error(). "\n"; exit; }

$fields = sparql_field_array( $result );

print "<p>Number of rows: ".sparql_num_rows( $result )." results.</p>";
print "<table class='example_table'>";
print "<tr>";
foreach( $fields as $field )
{
	print "<th>$field</th>";
}
print "</tr>";
while( $row = sparql_fetch_array( $result ) )
{
	print "<tr>";
	foreach( $fields as $field )
	{
		print "<td>$row[$field]</td>";
	}
	print "</tr>";
}
print "</table>";