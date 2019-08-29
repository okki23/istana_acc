<?php
class generateXML{

	function related($id = null, $limit = null, $offset = null){
		return $related = json_decode(file_get_contents("https://api.idxchannel.tv/v2/related?set=news_related&id_kanal=".$id."&limit=".$limit."&offset=".$offset));
	}

	function feed($data){
		
		$last_modified = date('Y-m-d\TH:i:s', strtotime($data[0]->date)).'+07:00';
		$myfile = fopen("latest.xml", "w") or die("Unable to open file!");
		$txt = 	'<?xml version="1.0" encoding="utf-8" ?>'.
				'<articles>'.
				'<UUID>UUID</UUID>'.
				'<time>'. strtotime($last_modified) * 1000 .'</time>';

		foreach($data as $row){
			$url = 'https://www.idxchannel.com/'.$row->channel[0]->slug.'/'.$row->slug;
			$url_img = 'https://img.idxchannel.com/media/1000'.$row->thumbnail;
			$publication_date=date('Y-m-d\TH:i:s',strtotime($row->date)).'+07:00';
			$txt .='<articles>'.
			'<ID>'. $row->id .'</ID>'.
			'<nativeCountry>ID</nativeCountry>'.
			'<language>id</language>'.
			'<publishCountries>'.
				'<country>ID</country>'.
			'</publishCountries>'.
			'<startYmdtUnix>'. strtotime($publication_date) * 1000 .'</startYmdtUnix>'.
			'<endYmdtUnix>32502013199000</endYmdtUnix>'.
			'<title>'. $row->title .'</title>'.
			'<category>'. $row->type .'</category>'.
			'<subCategory></subCategory>'.
			'<publishTimeUnix>'. strtotime($publication_date) * 1000  .'</publishTimeUnix>'.
			'<publishTime>'. $row->date .'</publishTime>'.
			'<updateTime> 2019-08-01T12:50:17 </updateTime>'.
			'<contents>';

				if($row->type == 'video' || $row->type == 'photo'){
					$text .= '<video>'. 
						'<title>'. $row->title .'</title>'.
						'<description>'. $row->excerpt .'</description>'.
						'<url>'. $url .'</url>'.
						'<thumbnail>'. $url_img .'</thumbnail>'.
						'<restrictedCountries>'.
							'<country>String // ISO 3166-1 alpha-2</country>'.
							'<country>String // ISO 3166-1 alpha-2</country>'.
							'<country>... // others</country>'.
						'</restrictedCountries>'.
					'</video>';
				}else{
					$text .= '<image>'.
						'<title>'. $row->title .'</title>'.
						'<description>'. $row->excerpt .'</description>'.
						'<url>'. $url .'</url>'.
						'<thumbnail>'. $url_img .'</thumbnail>'.
					'</image>';
				}

				$text .= '<text>'.
					'<content></content>'.
					'</text>'.
					'</contents>'.
					'<recommentArticles>';

			foreach($this->related($row->id, 5) as $relateds)
			{
				foreach($relateds as $related){

					$related_url = 'https://www.idxchannel.com/'. $related->channel[0]->slug.'/'.$related->slug;
					$related_url_img = 'https://img.idxchannel.com/media/1000'. $related->thumbnail;
					
					$text .='<article>';
						'<title>'. $related->title .'</title>'.
						'<url>'. $related_url .'</url>'.
						'<thumbnail>'. $related_url_img .'</thumbnail>'.
						'</article>';
				}
			}

			$text .='</recommentArticles>'.
				'<publisher>'.
					'<name>String</name>'.
					'<url>String // absolute path</url>'.
					'<logo>String // relative path or absolute path</logo>'.
				'</publisher>';
				'<author>String // author</author>';
				'<sourceUrl>String // original source url</sourceUrl>';
				'<copyright>';
					'<name>inews.id</name>';
					'<url>https://www.inews.id</url>';
					'<logo>String // relative path or absolute path</logo>';
				'</copyright>';

		}
		
		$txt .='</article>'.
			'</articles>';

		fwrite($myfile, $txt);
		fclose($myfile);

		echo "done: feed\n";
	}

}

$generateXML = new generateXML();
$data=json_decode(file_get_contents("https://api.idxchannel.com/v2/kanal?set=home_row&limit=100")); 
 
if($data){
	$generateXML->feed($data->data);
}