<?php
echo "<font color='FF9900'; size=4><center><strong>tape of RSS news</strong></center></font><br>";
			// make RSS news line
$rss = 'http://rss.unian.net/site/news_ukr.rss';
 
 $xmlstr = @file_get_contents($rss);
 
	if ( $xmlstr===false ) die('Error connect to RSS: '.$rss);
	
	$xml = new SimpleXMLElement($xmlstr);
	
	if ( $xml===false ) die('Error parse RSS: '.$rss);

	foreach ( $xml->xpath('//item') as $item ) {
		print '<mark><a href='.$item->link.'>'.$item->title.'</a></br></mark>';
		echo ''.$item->description.'<br><hr>';
	}
