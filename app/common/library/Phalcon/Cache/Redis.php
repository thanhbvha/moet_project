<?php
	namespace Phalcon\Cache;

	use Phalcon\Cache\Backend\Redis as RedisCache;

	class Redis extends RedisCache{

		public function lpush($keyName, $content=null){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			if(is_null($content)){
				$cachedContent = $frontend->getContent();
			}else{
				$cachedContent = $content;
			}

			if(!is_numeric($cachedContent)){
				$preparedContent = $frontend->beforeStore($cachedContent);
			}else{
				$preparedContent = $cachedContent;
			}

			$success = $redis->lpush($lastKey, $preparedContent);

			if(!$success) throw new \Exception("Failed storing the data in redis");

			return $success;
		}

		public function rpush($keyName, $content=null){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			if(is_null($content)){
				$cachedContent = $frontend->getContent();
			}else{
				$cachedContent = $content;
			}

			if(!is_numeric($cachedContent)){
				$preparedContent = $frontend->beforeStore($cachedContent);
			}else{
				$preparedContent = $cachedContent;
			}

			$success = $redis->rpush($lastKey, $preparedContent);

			if(!$success) throw new \Exception("Failed storing the data in redis");

			return $success;
		}

		public function rpop($keyName){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			$cachedContent = $redis->rpop($lastKey);

			if(!$cachedContent) return null;

			return $frontend->afterRetrieve($cachedContent);
		}

		public function rpoplpush($keyName, $newKeyName){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			$prefixedNewKey = $this->_prefix . $newKeyName;
			$newKey = "_PHCR" . $prefixedNewKey;

			$cachedContent = $redis->rpoplpush($lastKey, $newKey);

			if(!$cachedContent) return null;

			return $frontend->afterRetrieve($cachedContent);
		}

		public function lrange($keyName, $offset=0, $limit = -1){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			$cachedContent = $redis->lrange($lastKey, $offset, $limit);

			if(!$cachedContent) return null;

			$lrangeData = [];
			foreach($cachedContent as $key => $content){
				$lrangeData[] = @unserialize($content) ? unserialize($content) : $content;
			}
			return $lrangeData;
		}

		public function ltrim($keyName, $offset=0, $limit = -1){
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			return $redis->ltrim($lastKey, $offset, $limit);
		}

		public function llen($keyName){
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			return $redis->llen($lastKey);
		}

		public function hset($keyName, $field, $content=null, $lifetime=null){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			if(is_null($content)){
				$cachedContent = $frontend->getContent();
			}else{
				$cachedContent = $content;
			}

			if(!is_numeric($cachedContent)){
				$preparedContent = $frontend->beforeStore($cachedContent);
			}else{
				$preparedContent = $cachedContent;
			}

			$success = $redis->hset($lastKey, $field, $preparedContent);

			if(is_null($lifetime)){
				$tmp = $this->_lastLifetime;
				if(!$tmp)
					$ttl = $frontend->getLifetime();
				else
					$ttl = $tmp;
			}else{
				$ttl = $lifetime;
			}

			if($ttl>0){
				$redis->settimeout($lastKey, $ttl);
			}

			return $success;
		}

		public function hget($keyName, $field){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			$cachedContent = $redis->hget($lastKey, $field);
			if(!$cachedContent) return null;
			return $frontend->afterRetrieve($cachedContent);
		}

		public function hdel($keyName, $field){
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			return $redis->hdel($lastKey, $field);
		}

		public function hkeys($keyName){
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			return $redis->hkeys($lastKey);
		}

		public function hvals($keyName){
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			$cachedContent = $redis->hvals($lastKey);

			if(sizeof($cachedContent)===0) return null;

			$contentArr = [];
			foreach($cachedContent as $key => $content){
				$contentArr[] = @unserialize($content) ? unserialize($content) : $content;
			}
			return $contentArr;
		}

		public function hexists($keyName, $field){
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			return $redis->hexists($lastKey, $field);
		}

		public function ttl($keyName){
			$this->_getconnect($redis);
			
			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			return $redis->ttl($lastKey);
		}

		public function expire($keyName, $lifetime=null){
			$frontend = $this->_frontend;
			$this->_getconnect($redis);

			$prefixedKey = $this->_prefix . $keyName;
			$lastKey = "_PHCR" . $prefixedKey;

			if(is_null($lifetime)){
				$tmp = $this->_lastLifetime;
				if(!$tmp)
					$ttl = $frontend->getLifetime();
				else
					$ttl = $tmp;
			}else{
				$ttl = $lifetime;
			}
			
			return $redis->expire($lastKey, $ttl);
		}

		public function keys($regex){
			$this->_getconnect($redis);
			return $redis->keys($regex);
		}

		public function setPrefix($prefix=null){
			if(!is_null($prefix) || !empty($prefix)){
				$this->_prefix = $prefix;
			}
			return $this;
		}

		private function _getconnect(&$redis){
			$redis = $this->_redis;
			if(!is_object($redis)) {
				$this->_connect();
				$redis = $this->_redis;
			}
		}
	}
?>