<?php

class HomeController extends Controller{
	
	public function index(){
		//http://feeds.feedburner.com/CreativeBloq?format=xml
		$rssObj = new RssDisplay('http://feeds.feedburner.com/nettuts?format=xml');
		$items = $rssObj->getFeedItems(8);
		$info = $rssObj->getChannelInfo();
		$this->set('rssItems', $items);
		$this->set('rssInfo', $info);
			
	}
	
	
}

?>