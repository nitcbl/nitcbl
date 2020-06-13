#? |-----------------------------------------------------------------------------------------------|
#? |  /tests/logParserTest.py                                                                      |
#? |                                                                                               |
#? |  Copyright (c) 2018-2020 Belikhun. All right reserved                                         |
#? |  Licensed under the MIT License. See LICENSE in the project root for license information.     |
#? |-----------------------------------------------------------------------------------------------|

from lib.log import log
log("OKAY", "Imported: lib.log.log")
import lib.ehook
log("OKAY", "Imported: lib.ehook")
import requests
log("OKAY", "Imported: requests")
import filecmp
log("OKAY", "Imported: filecmp")
from lib.testFramework import testFramework
log("OKAY", "Imported: lib.testFramework.testFramework")

# Start a new session
sess = requests.Session()
sauce = ""
logParserTest = testFramework("logParser")

# Server Online Test
def __testServerOnline():
    global sess

    try:
        sess.get("http://localhost")
    except Exception as excp:
        return repr(excp)

    return True

logParserTest.case("Server should be up and running", __testServerOnline)

def getAPI(url = "", method = "GET", data = {}, files = {}):
    global sess

    if (method == "GET"):
        data = sess.get("http://localhost/" + url)
    else:
        data = sess.post("http://localhost/" + url, data = data, files = files)
    
    json = data.json()

    if (json["code"] != 0):
        raise Exception("[{}] {}".format(json["code"], json["description"]))
    
    if (json["status"] >= 300):
        raise Exception("[{}] {}".format(json["status"], json["description"]))

    if (json["runtime"] > 1):
        raise Exception("RunTimeOverflow: {}s".format(str(round(json["runtime"], 4))))

    return json["data"]

def __getLog():
    global logData
    global target

    try:
        logData = getAPI("api/contest/viewlog?f=" + target, "GET")
    except Exception as excp:
        return repr(excp)

    return True

#! Test for passed log
target = "passed"
logData = {}

logParserTest.case("Should parse \"{}\" log data successfully".format(target), __getLog)
logParserTest.case("[log:{:<9}] Log's status must be \"passed\"".format(target), lambda: True if (logData["header"]["status"] == "passed") else "Status is \"{}\"".format(logData["header"]["status"]))
logParserTest.case("[log:{:<9}] Extension must be \"java\"".format(target), lambda: True if (logData["header"]["file"]["extension"] == "java") else "Extension is \"{}\"".format(logData["header"]["file"]["extension"]))
logParserTest.case("[log:{:<9}] Have 3 passed tests".format(target), lambda: True if (logData["header"]["testPassed"] == 3) else "There are {} passed tests".format(logData["header"]["testPassed"]))
logParserTest.case("[log:{:<9}] Have 0 accepted/failed tests".format(target), lambda: True if (logData["header"]["testFailed"] == 0) else "There are {} failed tests".format(logData["header"]["testFailed"]))
logParserTest.case("[log:{:<9}] Got 30.00 points in total".format(target), lambda: True if (logData["header"]["point"] == 30) else "Point is {}".format(logData["header"]["point"]))
logParserTest.case("[log:{:<9}] Got 15.00 points in Test0001".format(target), lambda: True if (logData["test"][0]["point"] == 15) else "Test0001 point is {}".format(logData["test"][0]["point"]))
logParserTest.case("[log:{:<9}] Got  5.00 points in Test0003".format(target), lambda: True if (logData["test"][2]["point"] == 5) else "Test0003 point is {}".format(logData["test"][2]["point"]))
logParserTest.case("[log:{:<9}] Got a runtime of 0.12 seconds in Test0001".format(target), lambda: True if (logData["test"][0]["runtime"] == 0.12) else "Test0001 runtime is {}".format(logData["test"][0]["runtime"]))
logParserTest.case("[log:{:<9}] Got an output of 5 in Test0002".format(target), lambda: True if (logData["test"][1]["other"]["output"] == "5") else "Test0002 output is {}".format(logData["test"][1]["other"]["output"]))

#! Test for accepted log
target = "accepted"
logData = {}

logParserTest.case("Should parse \"{}\" log data successfully".format(target), __getLog)
logParserTest.case("[log:{:<9}] Log's status must be \"accepted\"".format(target), lambda: True if (logData["header"]["status"] == "accepted") else "Status is \"{}\"".format(logData["header"]["status"]))
logParserTest.case("[log:{:<9}] Extension must be \"pas\"".format(target), lambda: True if (logData["header"]["file"]["extension"] == "pas") else "Extension is \"{}\"".format(logData["header"]["file"]["extension"]))
logParserTest.case("[log:{:<9}] Have 0 passed tests".format(target), lambda: True if (logData["header"]["testPassed"] == 0) else "There are {} passed tests".format(logData["header"]["testPassed"]))
logParserTest.case("[log:{:<9}] Have 3 accepted/failed tests".format(target), lambda: True if (logData["header"]["testFailed"] == 3) else "There are {} failed tests".format(logData["header"]["testFailed"]))
logParserTest.case("[log:{:<9}] Got 0.00 points in total".format(target), lambda: True if (logData["header"]["point"] == 0) else "Point is {}".format(logData["header"]["point"]))
logParserTest.case("[log:{:<9}] Got a runtime of 0 seconds in Test0003".format(target), lambda: True if (logData["test"][2]["runtime"] == 0) else "Test0003 runtime is {}".format(logData["test"][2]["runtime"]))
logParserTest.case("[log:{:<9}] Got a valid error detail in Test0003".format(target), lambda: True if (type(logData["test"][0]["other"]["error"]) is not None) else "Test0003 error detail type is {}".format(str(type(logData["test"][0]["other"]["error"]))))

#! Test for failed log
target = "failed"
logData = {}

logParserTest.case("Should parse \"{}\" log data successfully".format(target), __getLog)
logParserTest.case("[log:{:<9}] Log's status must be \"failed\"".format(target), lambda: True if (logData["header"]["status"] == "failed") else "Status is \"{}\"".format(logData["header"]["status"]))
logParserTest.case("[log:{:<9}] Extension must be \"cpp\"".format(target), lambda: True if (logData["header"]["file"]["extension"] == "cpp") else "Extension is \"{}\"".format(logData["header"]["file"]["extension"]))
logParserTest.case("[log:{:<9}] Have 0 passed tests".format(target), lambda: True if (logData["header"]["testPassed"] == 0) else "There are {} passed tests".format(logData["header"]["testPassed"]))
logParserTest.case("[log:{:<9}] Have 0 accepted/failed tests".format(target), lambda: True if (logData["header"]["testFailed"] == 0) else "There are {} failed tests".format(logData["header"]["testFailed"]))
logParserTest.case("[log:{:<9}] Got 0.00 points in total".format(target), lambda: True if (logData["header"]["point"] == 0) else "Point is {}".format(logData["header"]["point"]))
logParserTest.case("[log:{:<9}] Got no test result".format(target), lambda: True if not (logData["test"]) else "Test count is {}".format(len(logData["test"])))
logParserTest.case("[log:{:<9}] Got a valid error detail".format(target), lambda: True if (logData["header"]["error"]) else "Error detail have {} line".format(len(logData["header"]["error"])))

#! Test for skipped log
target = "skipped"
logData = {}

logParserTest.case("Should parse \"{}\" log data successfully".format(target), __getLog)
logParserTest.case("[log:{:<9}] Log's status must be \"skipped\"".format(target), lambda: True if (logData["header"]["status"] == "skipped") else "Status is \"{}\"".format(logData["header"]["status"]))

logParserTest.complete()
