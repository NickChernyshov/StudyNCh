<?php
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







/**********************************************************
 * Parse XML data into an array structure                 *
 * Usage: array parse_rss ( string data )                 *
 **********************************************************/
/*function parse_rss($reg_exp, $xml_data) {
    preg_match_all($reg_exp, $xml_data, $temp);
    return array(
        'count'=>count($temp[0]),
        'title'=>$temp[1],
        'link'=>$temp[2],
        'desc'=>$temp[3]
    );
}
 
/**********************************************************
 * Parse Array data into an HTML structure                *
 * Usage: string parse_rss ( array data )                 *
 **********************************************************/
/*function output_rss($pattern, $rss_data) {
    for($i=0; $i<$rss_data['count']; $i++) {
        $temp .= sprintf($pattern,
            $rss_data['link'][$i],
            html_entity_decode($rss_data['title'][$i]),
            html_entity_decode($rss_data['desc'][$i])
        );
    }
    return $temp;
}
 
/**********************************************************
 * Settings                                               *
 **********************************************************/
/*$url = 'http://rss.unian.net/site/news_ukr.rss';
 
$reg_exp  = '#<item>.*?<title>(.*?)<\/title>.*?';
$reg_exp .='<link>(.*?)<\/link>.*?<description>';
$reg_exp .='(.*?)<\/description>.*?<\/item>#si';
 
$pattern = '<a href="%s">%s</a><br>%s<hr>';
 
/**********************************************************
 * Main script                                            *
 **********************************************************/
/*if ( $xml_data = file_get_contents($url) ) {
    $rss_data = parse_rss($reg_exp, $xml_data);
    echo output_rss($pattern, $rss_data);
}
/**********************************************************
 * The END                                                *
 **********************************************************/
