<?php
    //? |-----------------------------------------------------------------------------------------------|
    //? |  /api/contest/problems/list.php                                                               |
    //? |                                                                                               |
    //? |  Copyright (c) 2018-2020 Belikhun. All right reserved                                         |
    //? |  Licensed under the MIT License. See LICENSE in the project root for license information.     |
    //? |-----------------------------------------------------------------------------------------------|

	// SET PAGE TYPE
    define("PAGE_TYPE", "API");
    
    require_once $_SERVER["DOCUMENT_ROOT"] ."/lib/ratelimit.php";
    require_once $_SERVER["DOCUMENT_ROOT"] ."/lib/belibrary.php";
    require_once $_SERVER["DOCUMENT_ROOT"] ."/data/config.php";
    
    if (!isLoggedIn() && $config["publicProblems"] !== true)
        stop(109, "Vui lòng đăng nhập để xem đề bài!", 403, Array());

    contest_timeRequire([CONTEST_STARTED], false);

    require_once $_SERVER["DOCUMENT_ROOT"] ."/data/problems/problem.php";
    stop(0, "Thành công!", 200, problemList($_SESSION["id"] === "admin"));