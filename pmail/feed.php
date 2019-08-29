<?php
date_default_timezone_set('Asia/Jakarta');
class generateXML{

	function related($id = null, $limit = null, $offset = null){
		$related = json_decode(file_get_contents("https://api.idxchannel.tv/v2/related?set=news_related&id_kanal=".$id."&limit=".$limit."&offset=".$offset));
		
		return $related;
	}

	function feed($data){
		
		$last_modified = date('Y-m-d\TH:i:s', strtotime($data[0]->date)).'+07:00';
		$myfile = fopen("latest.xml", "w") or die("Unable to open file!");
		$url_app = 'https://www.idxchannel.com/';
		$url_img = 'https://img.idxchannel.com/media/1000';

		$txt = 	'<?xml version="1.0" encoding="utf-8" ?>'.
				'<articles>'.
				'<UUID>'. $uuid = hash('crc32', 'inews.id-'. date('Y-m-d')) . hash('crc32', 'inews_'. date('YmdH')) .'</UUID>'.
				'<time>'. strtotime($last_modified) * 1000 .'</time>';

		foreach($data as $row){
			var_dump($data);
			die();
			$url = $url_app . $row->channel[0]->slug .'/'. $row->slug;
			$url_img = $url_img .$row->thumbnail;
			// $publication_date=date('Y-m-d\TH:i:s',strtotime($row->date)).'+07:00';

			$publication_date=date("D, d M Y H:i:s O", strtotime($row->date));
			$related = $this->related($row->id, 5);
			
			$txt .='<article>';
			$txt .='<ID>'. $row->id .'</ID>';
			$txt .='<nativeCountry>ID</nativeCountry>';
			$txt .='<language>id</language>';
			$txt .='<publishCountries>';
				$txt .='<country>ID</country>';
			$txt .='</publishCountries>';
			$txt .='<startYmdtUnix>'. strtotime($row->date) * 1000 .'</startYmdtUnix>';
			$txt .='<endYmdtUnix>32502013199000</endYmdtUnix>';
			$txt .='<title><![CDATA['. $row->title .']]></title>';
			$txt .='<category><![CDATA['. $row->type .']]></category>';
			$txt .='<publishTimeUnix>'. strtotime($row->date) * 1000  .'</publishTimeUnix>';
			$txt .='<publishTime>'.$publication_date .'</publishTime>';
			$txt .='<updateTime>'.$publication_date .'</updateTime>';
			
			$txt .='<contents>';
				$txt .= '<image>';
					$txt .= '<title><![CDATA['. $row->caption .']]></title>';
					$txt .= '<description><![CDATA['. $row->caption .']]></description>';
					$txt .= '<url>'. $url_img . $row->image .'</url>';
					$txt .= '<thumbnail>'. $url_img . $row->thumbnail .'</thumbnail>';
				$txt .= '</image>';
				$txt .= '<text>';
					$txt .='<content>'.$row->content.'</content>';
				$txt .='</text>';
			$txt .='</contents>';

			$txt .='<recommendArticles>';

				foreach($related->data as $content){
					$related_url = 'https://www.idxchannel.com/'. $content->channel[0]->slug.'/'.$content->slug;
					$related_url_img = $url_img . $content->thumbnail;

					$txt .='<article>';
						$txt .= '<title><![CDATA['. $content->title .']]></title>';
						$txt .= '<url>'. $related_url .'</url>';
						$txt .= '<thumbnail>'. $related_url_img .'</thumbnail>';
					$txt .= '</article>';
				}

			$txt .='</recommendArticles>';
			$txt .= '<author>author</author>';
			$txt .= '<sourceUrl><![CDATA['. $url .'?utm_source=LINE&utm_medium=News]]></sourceUrl>';
			$txt .= '<copyright>';
				$txt .= '<name>Inews.id</name>';
				$txt .= '<url>https://www.inews.id</url>';
				$txt .= '<logo>logo</logo>';
			$txt .= '</copyright>';
			$txt .='</article>';
		}

		$txt .='</articles>';
		fwrite($myfile, $txt);
		fclose($myfile);

		echo "done: feed\n";
	}

}

$generateXML = new generateXML();
$data=json_decode(file_get_contents("https://stg-api.idxchannel.com/v2/kanal?set=home_row&limit=5&field=all")); 
 
if($data){
	$generateXML->feed($data->data);
}