<?php
	//? |-----------------------------------------------------------------------------------------------|
	//? |  /api/config.php                                                                              |
	//? |                                                                                               |
	//? |  Copyright (c) 2018-2020 Belikhun. All right reserved                                         |
	//? |  Licensed under the MIT License. See LICENSE in the project root for license information.     |
	//? |-----------------------------------------------------------------------------------------------|

	// SET PAGE TYPE
	define("PAGE_TYPE", "API");
	
	require_once $_SERVER["DOCUMENT_ROOT"] ."/lib/ratelimit.php";
	require_once $_SERVER["DOCUMENT_ROOT"] ."/lib/belibrary.php";
	require_once $_SERVER["DOCUMENT_ROOT"] ."/lib/logs.php";
	require_once $_SERVER["DOCUMENT_ROOT"] ."/data/config.php";

	if ($_SERVER["REQUEST_METHOD"] === "GET")
		stop(0, "Thành công!", 200, $rawConfig);

	if (!isLoggedIn())
		stop(11, "Bạn chưa đăng nhập.", 401);
		
	checkToken();

	if ($_SESSION["id"] !== "admin")
		stop(31, "Access Denied!", 403);

	$TYPE_ARRAY = Array(
		"string" => "Array",
		"check" => function($d) {
			json_decode($d);
			return (json_last_error() === JSON_ERROR_NONE);
		},
		"handler" => function($d) {
			return json_decode($d, true);
		}
	);

	$TYPE_NUMBER = Array(
		"string" => "Number",
		"check" => function($d) {
			return is_numeric($d);
		},
		"handler" => function($d) {
			return (int)($d);
		}
	);

	$TYPE_STRING = Array(
		"string" => "String",
		"check" => function($d) {
			return is_string($d);
		},
		"handler" => function($d) {
			return $d;
		}
	);

	$TYPE_BOOL = Array(
		"string" => "Boolean",
		"check" => function($d) {
			$d = strtolower($d);
			return ($d === "true" || $d === "false" || $d === "0" || $d === "1");
		},
		"handler" => function($d) {
			$d = strtolower($d);
			return ($d === "true" || $d === "1");
		}
	);

	$changed = false;

	function setting(String $key, &$target, $type) {
		global $changed;
		if (isset($_POST[$key]))
			if ($type["check"]($_POST[$key])) {
				$changed = true;
				return $target = $type["handler"]($_POST[$key]);
			} else
				stop(3, "Loại biến không khớp! Yêu cầu form ". $key ." là ". $type["string"], 400);
	}

	setting("app_title"					, $rawConfig["app"]["title"]					, $TYPE_STRING);
	setting("app_description"			, $rawConfig["app"]["description"]				, $TYPE_STRING);
	setting("uploadDir"					, $rawConfig["uploadDir"]						, $TYPE_STRING);
	setting("time_zone"					, $rawConfig["time"]["zone"]					, $TYPE_STRING);
	setting("time_begin_seconds"		, $rawConfig["time"]["begin"]["seconds"]		, $TYPE_NUMBER);
	setting("time_begin_minutes"		, $rawConfig["time"]["begin"]["minutes"]		, $TYPE_NUMBER);
	setting("time_begin_hours"			, $rawConfig["time"]["begin"]["hours"]			, $TYPE_NUMBER);
	setting("time_begin_days"			, $rawConfig["time"]["begin"]["days"]			, $TYPE_NUMBER);
	setting("time_begin_months"			, $rawConfig["time"]["begin"]["months"]			, $TYPE_NUMBER);
	setting("time_begin_years"			, $rawConfig["time"]["begin"]["years"]			, $TYPE_NUMBER);
	setting("time_during"				, $rawConfig["time"]["during"]					, $TYPE_NUMBER);
	setting("time_offset"				, $rawConfig["time"]["offset"]					, $TYPE_NUMBER);
	setting("pageTitle"					, $rawConfig["pageTitle"]						, $TYPE_STRING);
	setting("publish"					, $rawConfig["publish"]							, $TYPE_BOOL  );
	setting("submit"					, $rawConfig["submit"]							, $TYPE_BOOL  );
	setting("submitInProblems"			, $rawConfig["submitInProblems"]				, $TYPE_BOOL  );
	setting("allowRegister"				, $rawConfig["allowRegister"]					, $TYPE_BOOL  );
	setting("edit_name"					, $rawConfig["edit"]["name"]					, $TYPE_BOOL  );
	setting("edit_password"				, $rawConfig["edit"]["password"]				, $TYPE_BOOL  );
	setting("edit_avatar"				, $rawConfig["edit"]["avatar"]					, $TYPE_BOOL  );
	setting("viewRank"					, $rawConfig["viewRank"]						, $TYPE_BOOL  );
	setting("viewRankTask"				, $rawConfig["viewRankTask"]					, $TYPE_BOOL  );
	setting("viewRankHideDisabled"		, $rawConfig["viewRankHideDisabled"]			, $TYPE_BOOL  );
	setting("viewLog"					, $rawConfig["viewLog"]							, $TYPE_BOOL  );
	setting("viewLogOther"				, $rawConfig["viewLogOther"]					, $TYPE_BOOL  );
	setting("publicProblems"			, $rawConfig["publicProblems"]					, $TYPE_BOOL  );
	setting("clientConfig_sounds"		, $rawConfig["clientConfig"]["sounds"]			, $TYPE_BOOL  );
	setting("clientConfig_nightmode"	, $rawConfig["clientConfig"]["nightmode"]		, $TYPE_BOOL  );
	setting("clientConfig_showMs"		, $rawConfig["clientConfig"]["showMs"]			, $TYPE_BOOL  );
	setting("clientConfig_transition"	, $rawConfig["clientConfig"]["transition"]		, $TYPE_BOOL  );
	setting("clientConfig_dialogProblem", $rawConfig["clientConfig"]["dialogProblem"]	, $TYPE_BOOL  );
	setting("clientConfig_rankUpdate"	, $rawConfig["clientConfig"]["rankUpdate"]		, $TYPE_BOOL  );
	setting("clientConfig_logsUpdate"	, $rawConfig["clientConfig"]["logsUpdate"]		, $TYPE_BOOL  );
	setting("clientConfig_updateDelay"	, $rawConfig["clientConfig"]["updateDelay"]		, $TYPE_NUMBER);
	setting("ratelimit_maxRequest"		, $rawConfig["ratelimit"]["maxRequest"]			, $TYPE_NUMBER);
	setting("ratelimit_time"			, $rawConfig["ratelimit"]["time"]				, $TYPE_NUMBER);
	setting("ratelimit_banTime"			, $rawConfig["ratelimit"]["banTime"]			, $TYPE_NUMBER);
	setting("cache_contestRank"			, $rawConfig["cache"]["contestRank"]			, $TYPE_NUMBER);

	if ($rawConfig["publish"] !== true) {
		$rawConfig["viewRank"] = false;
		$rawConfig["viewLog"] = false;
	}

	if ($rawConfig["viewRankTask"] !== true)
		$rawConfig["viewLogOther"] = false;

	if ($changed === false)
		stop(102, "Woah nothing happened.", 200);

	saveConfig($rawConfig);
	writeLog("OKAY", "Đã thay đổi cài đặt.");
	stop(0, "Thay đổi cài đặt thành công!", 200);