<?php 
class RssDisplay extends Model{
	
	protected $feed_url;
	protected $num_feed_items;
	
	
	public function __construct($url){
		$this->feed_url = $url;
		parent::__construct();	
	}

	
	public function getFeedItems($num_feed_items){		
		$items = simplexml_load_file($this->feed_url);	
		$count = 0;	
			foreach ($items->channel->item as $item){				
				$item_array = array( 
					'title' => (string)$item->title, 
					'link' => (string)$item->link, 
					'date' => (string)$item->pubDate,
					'desc' => (string)$item->description
				);		
				
				$feedItems[$count] = $item_array;				
				if($count <= $num_feed_items -1)
				{
					$count = $count + 1;
				}else
				{
					return $feedItems;		
				}
			}		
		}
	
	public function getChannelInfo(){
		$items = simplexml_load_file($this->feed_url);
		foreach ($items->channel as $channel){
			$chanInfo = array(
				'title' => (string)$channel->title, 
				'link' => (string)$channel->link, 
				'desc' => (string)$channel->description
			);
		}
		return $chanInfo;
	}
		
}

?>