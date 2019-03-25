<?php 
App::import('Vendor','facebook',array('file' => '/php-graph-sdk/src/Facebook/autoload.php'));
use Facebook\Facebook;

class FacebookShell extends AppShell{
	const APP_ID = '126583341343638';
	const APP_SECRET = 'a64660ac12a951a2abf2c870274f1c71';
	const DEFAULT_GRAPH_VERSION = 'v2.10';
	const ACCESS_TOKEN = '126583341343638|a64660ac12a951a2abf2c870274f1c71';

	public $uses = array('Facebook');

/**
 * Connect to Facebook
 *
 *
 */
	public function connectFacebook(){
		$connect = new Facebook(array(
			'app_id' => self::APP_ID,
			'app_secret' => self::APP_SECRET,
			'default_grpah_version' => self::DEFAULT_GRAPH_VERSION
		));

		return $connect;
	}
/**
 * Get Data From Facebook
 *
 *
 */
	public function getFeeds(){
		$screen_name = 'nytimes';
		$path = sprintf("/$screen_name/feed?limit=10&fields=message,reactions.summary(true),id,comments.summary(true),shares,created_time");
		if($this->connectFacebook()){
			$res = $this->connectFacebook()->get($path, self::ACCESS_TOKEN);
			return $res;
		} else{
			return false;
		}
	}

	public function main(){

		$res = $this->getFeeds();
		$result = $res->getDecodedBody();

		foreach ($result['data'] as $data) {
			$id_post = $data['id'];
			$message = isset($data['message']) ? $data['message'] : '';
			$likes = isset($data['reactions']['summary']['total_count']) ?  $data['reactions']['summary']['total_count'] : '';
			$comments = isset($data['comments']['summary']['total_count']) ? $data['comments']['summary']['total_count'] : '';
			$Date = isset($data['created_time']) ? $data['created_time'] : '';

			$datafacebook = array(
				'ID_Post' => $id_post,
				'Message' => $message,
				'Likes' => $likes,
				'Comment' => $comments,
				'Date' => $Date,
			);
			$this->Facebook->create();
			$this->Facebook->save($datafacebook);

		}
	}
}
?>