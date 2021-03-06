<?php
    //? |-----------------------------------------------------------------------------------------------|
    //? |  /lib/cache.php                                                                               |
    //? |                                                                                               |
    //? |  Copyright (c) 2018-2020 Belikhun. All right reserved                                         |
    //? |  Licensed under the MIT License. See LICENSE in the project root for license information.     |
    //? |-----------------------------------------------------------------------------------------------|

	require_once $_SERVER["DOCUMENT_ROOT"] ."/lib/belibrary.php";
	require_once $_SERVER["DOCUMENT_ROOT"] ."/data/info.php";

	if (!defined("CACHE_LOCATION"))
		define("CACHE_LOCATION", $_SERVER["DOCUMENT_ROOT"] ."/.cache");

	if (!defined("CACHE_DEFAULT_AGE"))
		define("CACHE_DEFAULT_AGE", 10);

	if (!file_exists(CACHE_LOCATION))
		mkdir(CACHE_LOCATION);

	class cache {
		public $id;
		public $data = Array();
		private $cachefile;
		private $cachepath;
		private $stream;
		private $template = Array(
			"id" => "",
			"age" => CACHE_DEFAULT_AGE,
			"time" => 0,
			"data" => null
		);

		public function __construct($cacheID, $defaultData = null) {
			$this -> id = $cacheID;

			$this -> cachefile = $this -> id .".cache";
			$this -> cachepath = CACHE_LOCATION ."/". $this -> cachefile;
			$this -> template["id"] = $this -> id;
			$this -> template["data"] = $defaultData;

			$this -> fetch();
		}

		private function fetch() {
			$this -> stream = new fip($this -> cachepath, serialize($this -> template));
			$data = $this -> stream -> read();

			$this -> data = unserialize($data);
		}

		public function setAge($age) {
			$this -> data["age"] = $age;
		}

		public function validate() {
			return (time() - $this -> data["time"]) < $this -> data["age"];
		}

		public function getData() {
			return $this -> data["data"];
		}

		public function save($data) {
			if (isset($data))
				$this -> data["data"] = $data;

			$this -> data["time"] = time();
			$this -> stream -> write(serialize($this -> data));
		}
	}
