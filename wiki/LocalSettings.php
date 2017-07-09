<?php

# This file was automatically generated by the MediaWiki installer.
# If you make manual changes, please keep track in case you need to
# recreate them later.
#
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.

# If you customize your file layout, set $IP to the directory that contains
# the other MediaWiki files. It will be used as a base to locate files.
if( defined( 'MW_INSTALL_PATH' ) ) {
	$IP = MW_INSTALL_PATH;
} else {
	$IP = dirname( __FILE__ );
}

$path = array( $IP, "$IP/includes", "$IP/languages" );
set_include_path( implode( PATH_SEPARATOR, $path ) . PATH_SEPARATOR . get_include_path() );

require_once( "$IP/includes/DefaultSettings.php" );

# If PHP's memory limit is very low, some operations may fail.
#ini_set( 'memory_limit', '20M' );

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}
## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename         = "Lowlevel";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
$wgScriptPath       = "/w";
$wgArticlePath      = "/wiki/$1";
$wgScriptExtension  = ".php";
$wgUsePathInfo      = true;

## For more information on customizing the URLs please see:
## http://www.mediawiki.org/wiki/Manual:Short_URL

$wgEnableEmail      = true;
$wgEnableUserEmail  = true;
$wgEmailAuthentication = true; // require email authentication for using any email function (except password reminder which works independently from this setting)
$wgEmailConfirmToEdit = true; // Require a confirmed address to edit pages

$wgEmergencyContact = "wiki@lowlevel.eu";
$wgPasswordSender = "Lowlevel Wiki <wiki@lowlevel.eu>";

## For a detailed description of the following switches see
## http://www.mediawiki.org/wiki/Extension:Email_notification 
## and http://www.mediawiki.org/wiki/Extension:Email_notification
## There are many more options for fine tuning available see
## /includes/DefaultSettings.php
## UPO means: this is also a user preference option
$wgEnotifUserTalk = true; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

$wgDBtype                          = "mysql";
$wgDBserver                        = $_ENV['DB_HOSTNAME'];
$wgDBname                          = $_ENV['DB_DATABASE'];
$wgDBuser = $wgDBadminuser         = $_ENV['DB_USER'];
$wgDBpassword = $wgDBadminpassword = $_ENV['DB_PASSWORD'];

# MySQL specific settings
$wgDBprefix         = "";

# MySQL table options to use during installation or update
$wgDBTableOptions   = "TYPE=InnoDB";

# Experimental charset support for MySQL 4.1/5.0.
$wgDBmysql5 = false;

# Postgres specific settings
$wgDBport           = "5432";
$wgDBmwschema       = "mediawiki";
$wgDBts2schema      = "public";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = true;
$wgFileExtensions = array( 'png', 'gif', 'jpg', 'jpeg', 'pdf' );
# $wgUseImageMagick = true;
# $wgImageMagickConvertCommand = "/usr/bin/convert";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
# $wgHashedUploadDirectory = false;

## If you have the appropriate support software installed
## you can enable inline LaTeX equations:
$wgUseTeX           = false;

$wgLocalInterwiki   = $wgSitename;

$wgLanguageCode = "de";

$wgSecretKey = $_ENV['SECRET_KEY'];

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
$wgDefaultSkin = 'monobook';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "http://creativecommons.org/licenses/by-nc-sa/3.0/de/";
$wgRightsText = "Namensnennung - Keine kommerzielle Nutzung - Weitergabe unter gleichen Bedingungen 3.0 Deutschland";
$wgRightsIcon = "http://i.creativecommons.org/l/by-nc-sa/3.0/de/88x31.png";
# $wgRightsCode = "[license_code]"; # Not yet used

$wgFavicon = '/Favicon.png'; 
$wgLogo = '/wiki.png';

$wgDiff3 = "";

$wgEnableMWSuggest=true;

# When you make changes to this configuration file, this will make
# sure that cached pages are cleared.
#$configdate = gmdate( 'YmdHis', @filemtime( __FILE__ ) );
#$wgCacheEpoch = max( $wgCacheEpoch, $configdate );

# Restrict anonymous editing
$wgGroupPermissions['*']['edit'] = false;

# Prevent new user registrations except by sysops
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['user']['createaccount'] = true;

#Set Default Timezone
$wgLocaltimezone = "Europe/Berlin";
$oldtz = getenv("TZ");
putenv("TZ=$wgLocaltimezone");

## GeshiCodeTag extension
#include("extensions/GeshiCodeTag.php");

# ParserFunctions extension
#require_once("$IP/extensions/ParserFunctions/ParserFunctions.php");

# PdfExport extension
#require_once("$IP/extensions/PdfExport/PdfExport.php");

# Renameuser extension
#require_once("$IP/extensions/Renameuser/SpecialRenameuser.php");

# Recent Changes Cleanup extension
#require_once("$IP/extensions/RecentChangesCleanup/RecentChangesCleanup.php");

# Allow sysops to remove revisions
#$wgGroupPermissions['sysop']['deleterevision']  = true;



# Extern images
$wgAllowExternalImages = true;

$wgUseFileCache = false; /* default: false */
$wgFileCacheDirectory = "$IP/cache";
$wgShowIPinHeader = false; 


#$wgUseSquid = true;
#$wgSquidServers = array('www.lowlevel.eu');
#$wgSquidServersNoPurge = array('127.0.0.1', '::1', '89.163.145.14', '2001:470:1f0b:dbe::10');

/* Enable blacklisting */
$wgEnableDnsBlacklist = true;
$wgDnsBlacklistUrls = array('opm.tornevall.org.');

#$wgReadOnly = 'Software Update';

$wgShowExceptionDetails = true;
