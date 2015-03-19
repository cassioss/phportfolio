<?php

/**
 * Gets the general template for a SVN command.
 *
 * @param $netID
 * @param $semester
 * @param $svnCmd
 * @return string
 */
function getSVNCommand($netID, $semester, $svnCmd){
    $subversionURL = "https://subversion.ews.illinois.edu/svn/";
    $classAddOn = "-cs242/";
    return $svnCmd . $subversionURL . $semester . $classAddOn . $netID;
}

/**
 * Gets the SVN command to obtain the XML log file.
 *
 * @param $netID
 * @param $semester
 * @return string
 */
function getLogCommand($netID, $semester) {
    $svnLogCmd = "svn log --verbose --xml ";
    return getSVNCommand($netID, $semester, $svnLogCmd);
}

/**
 * Gets the SVN command to obtain the XML list file.
 *
 * @param $netID
 * @param $semester
 * @return string
 */
function getListCommand($netID, $semester) {
    $svnListCmd = "svn list --xml --recursive ";
    return getSVNCommand($netID, $semester, $svnListCmd);
}

/**
 * Gets the XML data from an SVN command and saves it in a file.
 *
 * @param $svnCommand
 * @param $xmlFileToSave
 */
function getXMLFromSVN($svnCommand, $xmlFileToSave) {
    $xmlData = simplexml_load_string(utf8_decode(trim(shell_exec($svnCommand))));
    $xmlData->asXML($xmlFileToSave);
}

/**
 * Saves both log and list files from a student in a given semester.
 *
 * @param $netID
 * @param $semester
 */
function saveLogAndListFiles($netID, $semester)
{
    $logXMLFile = dirname(__FILE__) . "/resources/svn_log.xml";
    $listXMLFile = dirname(__FILE__) . "/resources/svn_list.xml";
    getXMLFromSVN(getLogCommand($netID, $semester), $logXMLFile);
    getXMLFromSVN(getListCommand($netID, $semester), $listXMLFile);
}

// Final function that creates log and list files
saveLogAndListFiles('dssntss2', 'sp15');