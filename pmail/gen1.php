<?php

$data=json_decode(file_get_contents("https://api.idxchannel.tv/v2/kanal?set=channel_row&id_kanal=1"));  

function createXMLfile($data){
   
	$filePath = 'rss.xml'; 
	$dom = new DOMDocument('1.0', 'utf-8'); 

	$rss = $dom->createElement('rss');
	$rss->setAttribute('xmlns:content', 'http://purl.org/rss/1.0/modules/content/');
	$rss->setAttribute('xmlns:dc', 'http://purl.org/dc/elements/1.1/');
	$rss->setAttribute('xmlns:dcterms', 'http://purl.org/dc/terms/');
	$rss->setAttribute('xmlns:media', 'http://search.yahoo.com/mrss/');
	$rss->setAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');
	$rss->setAttribute('version', '2.0');

	$root = $dom->createElement('channel');
	

	$generator = $dom->createElement('generator', 'https://www.inews.id');
	$root->appendChild($generator);

	$head_title = $dom->createElement('title', 'iNews.id | Inspiring And Informative');
	$root->appendChild($head_title);
	
	$description = $dom->createElement('description', 'iNews.id - Informasi teraktual dan terlengkap Indonesia dan dunia seputar peristiwa, berita nasional, ekonomi, olahraga, daerah, lifestyle, travel, dan otomotif.');
	$root->appendChild($description);

	$language = $dom->createElement('language', 'id');
	$root->appendChild($language);

	$lastBuildDate = $dom->createElement('lastBuildDate', date('Y-m-d h:m:s'));
	$root->appendChild($lastBuildDate);

	$copyright = $dom->createElement('copyright', 'Copyright (C) 2017 iNews.id');
	$root->appendChild($copyright);

	$atom = $dom->createElement('atom:link');
	$atom->setAttribute('href', 'https://www.inews.id');
	$atom->setAttribute('rel', 'self');
	$atom->setAttribute('type', 'application/rss+xml');
	$root->appendChild($atom);

	$images = $dom->createElement('image');

	$url_img = $dom->createElement('url', 'https://img.inews.id/media/150/files/inews/inews_01.png');
	$images->appendChild($url_img);

	$img_title = $dom->createElement('title', 'iNews | Informasi teraktual dan terlengkap Indonesia dan dunia | RSS');
	$images->appendChild($img_title);

	$width = $dom->createElement('width', '300');
	$images->appendChild($width);

	$height = $dom->createElement('height', '27');
	$images->appendChild($height);

	$link = $dom->createElement('link', 'https://www.inews.id');
	$images->appendChild($link);

	$root->appendChild($images);

	$i = 0;
	$limit = 30;

	foreach($data->data as $row){

		echo $row->title.'<br>';
		//header
		$xml = $dom->createElement('item'); 
			//body
			$title   = $dom->createElement('title', $row->title); 
			$xml->appendChild($title); 

			$link_content = $dom->createElement('link', 'https://www.inews.id/sport/soccer/raih-gelar-copa-america-2019-paqueta-makin-semangat-bela-ac-milan/588869');
			$xml->appendChild($link_content);

			$guid = $dom->createElement('guid', 'https://www.inews.id/sport/soccer/raih-gelar-copa-america-2019-paqueta-makin-semangat-bela-ac-milan/588869');
			$guid->setAttribute('isPermaLink', 'false');
			$xml->appendChild($guid);

			$pubdate = $dom->createElement('pubDate', $row->date);
			$xml->appendChild($pubdate);

			$content_desc = $dom->createElement('description');
			$content_desc->appendChild($dom->createCDATASection($row->excerpt));
			$xml->appendChild($content_desc);

			$media = $dom->createElement('media:content');
			$media->setAttribute('url', 'https://img.inews.id/files/inews_new/2019/07/08/Paqueta.jpg');
			$media->setAttribute('expression', 'full');
			$media->setAttribute('type', 'image/jpeg');
			$xml->appendChild($media);

		//footer
		$root->appendChild($xml);
	} 
	
	$rss->appendChild($root);
	$dom->appendChild($rss);
	$dom->save($filePath);   
 } 
 
 echo createXMLfile($data);
?>