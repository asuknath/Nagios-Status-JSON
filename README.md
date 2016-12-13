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

Use following command to find status.dat location.

**find / -name status.dat**

# Step 3
**Download and Configure Android Nagios Client**

[Nagios Client](https://play.google.com/store/apps/details?id=com.serveralarms.nagios&hl=en)

Go to settings

![Settings](https://github.com/asuknath/Nagios-Status-JSON/blob/master/SettingPage.png)

Update URL
###Nagios Core
**(http or https)://nagiosserver_address/nagios/**

###NagiosXI
**(http or https)://nagiosserver_address/nagiosxi/**



![URL Update](https://github.com/asuknath/Nagios-Status-JSON/blob/master/URLUpdatePage.png)




