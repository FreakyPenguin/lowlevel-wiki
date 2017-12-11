<?php

if ( $wgCommandLineMode ) {
	if ( isset( $_SERVER ) && array_key_exists( 'REQUEST_METHOD', $_SERVER ) ) {
		die( "This script must be run from the command line\n" );
	}
}

$wgSitename         = "Lowlevel";
$wgServer           = "//www.lowlevel.eu";
$wgSecureLogin      = true;

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
$wgScriptPath       = "/w";
$wgArticlePath      = "/wiki/$1";
$wgScriptExtension  = ".php";
$wgUsePathInfo      = true;

$wgEnableEmail      = true;
$wgEnableUserEmail  = true;
$wgEmailAuthentication = true; // require email authentication for using any email function (except password reminder which works independently from this setting)
$wgEmailConfirmToEdit = true; // Require a confirmed address to edit pages

$wgEmergencyContact = "wiki@lowlevel.eu";
$wgPasswordSender = "wiki@lowlevel.eu";

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

$wgSMTP = array(
 'host'     => $_ENV['SMTP_HOSTNAME'],
 'IDHost'   => "lowlevel.eu",
 'port'     => $_ENV['SMTP_PORT'],
 'auth'     => true,
 'username' => $_ENV['SMTP_USERNAME'],
 'password' => $_ENV['SMTP_PASSWORD']
);


## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads       = true;
$wgFileExtensions = array( 'png', 'gif', 'jpg', 'jpeg', 'pdf' );
$wgUploadDirectory = "/images";

$wgLocalInterwiki   = $wgSitename;

$wgLanguageCode = "de";

$wgSecretKey = $_ENV['SECRET_KEY'];

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook':
wfLoadSkin( 'Vector' );
wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Modern' );
wfLoadSkin( 'CologneBlue' );
$wgDefaultSkin = 'monobook';

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgEnableCreativeCommonsRdf = true;
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/licenses/by-nc-sa/3.0/de/";
$wgRightsText = "Namensnennung - Keine kommerzielle Nutzung - Weitergabe unter gleichen Bedingungen 3.0 Deutschland";
$wgRightsIcon = "https://i.creativecommons.org/l/by-nc-sa/3.0/de/88x31.png";
# $wgRightsCode = "[license_code]"; # Not yet used

$wgFavicon = '/Favicon.png'; 
$wgLogo = '/wiki.png';

$wgDiff3 = "";

$wgEnableMWSuggest=true;

# Restrict anonymous editing
$wgGroupPermissions['*']['edit'] = false;

# Prevent new user registrations except by sysops
$wgGroupPermissions['*']['createaccount'] = false;
$wgGroupPermissions['user']['createaccount'] = true;

# Allow sysops to remove revisions
#$wgGroupPermissions['sysop']['deleterevision']  = true;


#Set Default Timezone
$wgLocaltimezone = "Europe/Berlin";
$oldtz = getenv("TZ");
putenv("TZ=$wgLocaltimezone");


# Syntax highlighting
wfLoadExtension( 'SyntaxHighlight_GeSHi' );

# ParserFunctions extension
wfLoadExtension( 'ParserFunctions' );

# Renameuser extension
wfLoadExtension( 'Renameuser' );

# These two are unmaintained
# PdfExport extension
#require_once("$IP/extensions/PdfExport/PdfExport.php");
# Recent Changes Cleanup extension
#require_once("$IP/extensions/RecentChangesCleanup/RecentChangesCleanup.php");

# Extern images
$wgAllowExternalImages = true;

$wgUseFileCache = false; /* default: false */
$wgFileCacheDirectory = "$IP/cache";
$wgShowIPinHeader = false; 

# Enable blacklisting
$wgEnableDnsBlacklist = true;
$wgDnsBlacklistUrls = array('opm.tornevall.org.');

#$wgReadOnly = 'Software Update';

$wgShowExceptionDetails = true;

# Use proper IPs from X-forwarded-for
$wgUsePrivateIPs = true;
$wgUseSquid = true;
$wgSquidServersNoPurge = array();
$wgSquidServersNoPurge[] = "172.16.0.0/12";
