# Nagios Status JSON
Nagios Status JSON

This PHP API script reads Nagios status.dat file and return the JSON result. This API is desinged for Nagios Client unofficial Nagios status monitoring app.

# Step 1
Upload **nath_status.php** to your Nagios web root folder.
###Nagios Core's 3.5.1 default Web Root folder Web Root Folder - Centos
**/usr/share/nagios/html/**

###Nagios Core's default Web Root folder Web Root Folder - Centos & Ubuntu
**/usr/local/nagios/share/**

###NagiosXI's default Web Root folder Web Root Folder - Centos & Ubuntu
**/usr/local/nagiosxi/html/**

# Step 2
Edit **nath_status.php.** *You can use your favourite text editor*

vi /usr/local/nagios/share/nath_status.php  

Change status.dat file's path according to your Nagios Server configuration.

**$statusFile = '/usr/local/nagios/var/status.dat';**

###Nagios Core's 3.5.1 status.dat file's location:
**/var/log/nagios/status.dat**

Use following command to find status.dat location.

**find / -name status.dat** 

# Step 3
**Download and Configure Android Nagios Client**

[Nagios Client](https://play.google.com/store/apps/details?id=com.serveralarms.nagios&hl=en)

Go to settings

![Settings](https://github.com/asuknath/Nagios-Status-JSON/blob/master/SettingPage-A-I.png)

Update URL
###Nagios Core
**(http or https)://nagiosserver_address/nagios/**

###NagiosXI
**(http or https)://nagiosserver_address/nagiosxi/**



![URL Update](https://github.com/asuknath/Nagios-Status-JSON/blob/master/URLUpdatePage-A-I.png)

#Step 5
###Add IOS Push Notification and Android FCM Notification

- **1** Download Script from following PHP Script File
  - https://github.com/asuknath/Nagios-Status-JSON/blob/master/ServerAlarmNotify.php
  
- **2** Upload File to Nagios's Plugin Folder**
```javascript
    /usr/local/nagios/libexec/
```
  
- **3** Make **ServerAlarmNotify.php** file executable using following command.
```javascript
    chmod +x ServerAlarmNotify.php
```
  
- **4** Edit **commands.cfg** and add following two commands. You will find your under settings. Menu -> Setting.
![Settings](https://github.com/asuknath/Nagios-Status-JSON/blob/master/settingsview-A-I.jpg)
```javascript
# 'sm-host-push-notify' command definition
define command{
    command_name 	sm-host-push-notify
    command_line 	/usr/local/nagios/libexec/ServerAlarmNotify.php $HOSTNAME$ YOURGROUPKEY HOST $HOSTSTATE$
}


# 'sm-service-push-notify' command definition
define command{
  	command_name 	sm-service-push-notify
	command_line  	/usr/local/nagios/libexec/ServerAlarmNotify.php $HOSTNAME$ YOURGROUPKEY SERVICE $SERVICESTATE$
}
```
#
- **5** Edit **templates.cfg** file. Modify Contact Templates and add **sm-service-push-notify** as service notification command and **sm-host-push-notify** as host notification command.
   -
```javascript
define contact{
        name                            generic-contact
        service_notification_period     24x7
        host_notification_period        24x7
        service_notification_options    c,r
        host_notification_options       d,r
        service_notification_commands   notify-service-by-email,sm-service-push-notify
        host_notification_commands      notify-host-by-email,sm-host-push-notify
        register                        0       					
        }
```
#
- **6** Nagios Client Generates **GROUP API KEY** using Nagios URL
  - All devices using same URL will get Notification simultaneously.  
  - Every Android/IOS user has option to Turn off Notification for his device only.
  
- **7** If your GROUP API KEY is not showing
  - Update URL 
  - Turn OFF and ON Notification.
  
For support contact support@serveralarms.com
