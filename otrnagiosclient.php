#! /usr/bin/php

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


// $argv[1] - Host Name
// $argv[2] - Group Name (Group API Key)
// $argv[3] - Host or Service Name
// $argv[4] - Hosst or Service Status

$title =   urlencode("::".$argv[4].":: ".$argv[1]);
$message =  urlencode($argv[3]." - ".$argv[1]." is ".$argv[4]);
$URL = "https://api01.serveralarms.com/fcm/api.php?tag=send&title=$title&groupname=$argv[2]&mess=$message";
echo $URL;
$data = file($URL);

?>
