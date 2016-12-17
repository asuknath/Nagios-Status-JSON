#! /usr/local/bin/php

<?php

/**
 * ServerAlarmNotify.php - Nagios Client Push Notification
 *
 *
 * This file is part of "asuknath/Nagios-Status-JSON" - a Small script
 * to send push notification to IOS and Android devices.
 *
 * Copyright  Copyright (c) 2015 - 2016, Asuk Nath
 * All rights reserved.
 *
 *
 * LICENSE
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 *  * Redistributions of source code must retain the above copyright notice, this
 *    list of conditions and the following disclaimer.
 *
 *  * Redistributions in binary form must reproduce the above copyright notice, this
 *    list of conditions and the following disclaimer in the documentation and/or
 *    other materials provided with the distribution.
 *
 *  * Neither the name of Open Solutions nor the names of its contributors may be
 *    used to endorse or promote products derived from this software without
 *    specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
 * IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT,
 * INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE
 * OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    asuknath/Nagios-Status-JSON
 * @copyright  Copyright (c) 2015 - 2016, Asuk Nath
 * @link       https://www.serveralarms.com
 * @author     Asuk Nath <support@serveralarms.com>
 */


// USAGE: ServerAlarmNotify.php <HOST> <GROPU_KEY> <TYPE> <STATE>


date_default_timezone_set('America/New_York');
define( "VERSION", '1.0' );

ini_set( 'max_execution_time', '60' );

ini_set( 'display_errors', true );
ini_set( 'display_startup_errors', true );

define( 'PRI_LOW',   -1 );
define( 'PRI_NORMAL', 0 );
define( 'PRI_HIGH',   1 );


// get the message from STDIN
$message = trim( fgets( STDIN ) );

// get the parameters

$hostorservice  = isset( $argv[1] ) ? $argv[1] : false;
$groupname      = isset( $argv[2] ) ? $argv[2] : false;
$type           = isset( $argv[3] ) ? $argv[4] : false;
$state          = isset( $argv[4] ) ? $argv[5] : false;

if( !$hostorservice || !$groupname || !$type || !$state )
    die( "ERROR - USAGE: ServerAlarmNotify.php <HOST> <GROPU_KEY> <TYPE> <STATE>\n\n" );

switch( $state )
{
    case 'WARNING':
    case 'UNKNOWN':
        $priority = PRI_LOW;
        break;

    case 'OK':
        $priority = PRI_NORMAL;
        break;

   case 'CRITICAL':
        $priority = PRI_HIGH;
        break;

    default:
        $priority = PRI_NORMAL;
        break;
}

$title = urlencode($hostorservice - $state);
$message = urlencode($hostorservice - $type - $state);
$URL = "https://serveralarms.com/fcm/api.php?tag=send&title=$title&groupname=$groupname&mess=$message";
$data = file($URL);




