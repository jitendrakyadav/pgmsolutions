Create Virtual Host in Ubuntu: Look/Read into following website:
 
https://lowendbox.com/blog/how-to-setup-apache-virtual-hosts-on-ubuntu-16-04/	[when webserver: apache2]
Above website print-screens: setup-apache-virtual-hosts-on-ubuntu-1.png, setup-apache-virtual-hosts-on-ubuntu-2.jpg, setup-apache-virtual-hosts-on-ubuntu-3.jpg, setup-apache-virtual-hosts-on-ubuntu-4.jpg

https://www.digitalocean.com/community/tutorials/how-to-set-up-nginx-server-blocks-virtual-hosts-on-ubuntu-16-04	[when webserver: nginx]

Create Virtual Host in CentOS 6:
https://youtu.be/MR24rVosDhM							[when webserver: apache] 
/* ---------------------------------------------------------------------------------------------------------------------- */
/*** What is DNS => Domain Name System ***/
1. DNS is how domain names are translated into IP addresses, and DNS also controls email delivery. DNS is what allows you to use your web browser to find web sites as well as send and receive email.
2. DNS makes it possible for us to use easy to remember domain names in place of complex IP addresses (gracechurch.com instead of 209.61.148.168).
3. DNS is sort of like the white pages directory of the internet - when you enter a domain name into your internet browser, DNS does the directory lookup to find out which server that domain is pointed to and what it's IP address is and then it responds by displaying the site you requested.
Note: "White pages" meaning => The white pages is a listing of telephone subscribers in a telephone directory.

/*** Bypass DNS ***/
1. Create your virtual-host with server-name/domain-name defined and the directory to which it would point. [To create virtual host, get help from just previous section]
2. While creating virtual-host in previous step, you get 2 things from there:
	a. server-name/domain-name which you have mentioned there
	b. Machine IP address where you have created virtual-host
   Mention these 2 things in your local maching's host file like following:
   172.72.27.112 google.com www.google.com
   from where you would access the server-name/domain-name(mentioned/used in step.1) using your browser.
   This means, now your machine browser takes to you on IP: 172.72.27.112 web-page instead on google.com home-page when you hit the URL google.com or www.google.com in your browser.
   Remember host file location in ubuntu:
	/etc/hosts
   and in windows:
	C:\Windows\System32\Drivers\etc\hosts
/* ---------------------------------------------------------------------------------------------------------------------- */
/*** What if several virtual hosts are created for various applications and someone wants to access your particular application through IP address ***/
Important Note: 
a. Syntax for an URL in HTTP or HTTPS protocol is:
	 <protocol>://<host>:<port>/
b. For any host:
	in HTTP protocol 
		default-port is 80 
	in HTTPS protocol 
		default-port is 443
c. This means: 
	if there is an URL in HTTP protocol like
		http://www.xyz.com/ then it would be translated by browser as
		http://www.xyz.com:80/
	if there is an URL in HTTPS protocol like
		https://www.xyz.com/ then it would be translated by browser as
		https://www.xyz.com:443/

Steps:
1. Suppose there is an application: /var/www/html/2018/test
2. You have created a virtual-host to map URL:http://test.local.com/ with your application using conf file like /etc/apache2/sites-available/test.local.com.conf
3. Like /etc/apache2/sites-available/test.local.com.conf, all other conf files use port 80 as following:
	<VirtualHost *:80>
4. Replace this default port:80 with some other unique/dedicated port. It might be any random unique number like 8085, 9091, 9287, etc. as you want.
5. Suppose we have chosen port:9091, consequently /etc/apache2/sites-available/test.local.com.conf would look like as following:
	<VirtualHost *:9091>
		ServerAdmin webmaster@test.local.com
		DocumentRoot /var/www/html/2018/test

		ServerName test.local.com
		ServerAlias www.test.local.com

		ErrorLog ${APACHE_LOG_DIR}/error.log
		# To keep and track apache error log project-wise is more beneficial instead of keeping all applications/projects apache error log in a single file keep, so above apache error log path might keep as following:
		# ErrorLog /var/www/html/2018/test/error.log
		CustomLog ${APACHE_LOG_DIR}/access.log combined
	</VirtualHost>
6. Save this file /etc/apache2/sites-available/test.local.com.conf
7. Open file /etc/ports.conf and add/record above mentioned port 9091 here as following:
	Listen 80
	Listen 9091

	<IfModule ssl_module>
		Listen 443
	</IfModule>

	<IfModule mod_gnutls.c>
		Listen 443
	</IfModule> 
8. Save this file.
9. Open file /etc/hosts and add/record here our new virtual host test.local.com mapped with current machine/system/server IP as following:
	127.0.0.1	localhost
	127.0.0.1       test.local.com
10.Save this file and restart Apache server
11.Now access your application/project using followings:
	Virtual host URL:
		http://test.local.com:9091/
	IP based URL:
		http://127.0.0.1:9091/
   Note: Now this application/project would not be accessible by
		http://test.local.com/
	 as it means URL:
		http://test.local.com:80/
	 and test.local.com is now available on a separate/unique/dedicated port 9091, not on default port 80.
/* ---------------------------------------------------------------------------------------------------------------------- */
Disable and delete virtual host:
1. Go to /etc/apache2/sites-available
2. Here all virtual-hosts are listed. Suppose you want to disable virtual-host whose details are mentioned in mg226.local.com.conf, so run following command:
	sudo a2dissite <virtual-host-file/record-name>
	sudo a2dissite mg226.local.com.conf
   When a virtual-host is enabled, an entry of the file with the same name like mg226.local.com.conf(which is created in /etc/apache2/sites-available) is recorded in /etc/apache2/sites-enabled. When you fire above disable command, entry of this file from directory /etc/apache2/sites-enabled is deleted.
3. After disabling, delete this virtual-host record (from /etc/apache2/sites-available):
	sudo rm <virtual-host-file/record-name>
	sudo rm mg226.local.com.conf
4. Delete the entry for this virtual-host from /etc/hosts file.
5. Restart webserver i.e. apache 
6. It's done.
7. Apart from it, you might like to delete the whole project folder(for which this virtual-host had been created) from root-directory i.e. /var/www/html/ and delete it's associated DB as well.
/* ---------------------------------------------------------------------------------------------------------------------- */
Create virtual-host in Windows:
1. In /d/xampp/apache/conf/extra/httpd-vhosts.conf, add followings at last line:
	<VirtualHost *:80>
    		##ServerAdmin webmaster@dummy-host2.example.com
    		DocumentRoot "D:\xampp\htdocs\2018\mg2\mg226"
    		ServerName mg226.local.com
    		##ErrorLog "logs/dummy-host2.example.com-error.log"
    		##CustomLog "logs/dummy-host2.example.com-access.log" common
		<Directory "D:\xampp\htdocs\2018\mg2\mg226">
			DirectoryIndex index.php
			AllowOverride All
			Order allow,deny
			Allow from all
		</Directory>
	</VirtualHost>
2. Record this virtual-host entry in /c/Windows/System32/drivers/etc/hosts as following at last line:
	127.0.0.1       mg226.local.com
3. Restart Apache i.e. webserver
4. It's done. Now access you project by URL http://mg226.local.com in your browser. If it is un-accessible, check apache & php error logs. If it's still not working, restart your machine to make effective your hosts file entry.

Note: If you make changes in php.ini, necessarily not in all cases you need to restart Apache but in some cases, it needed to restart Apache. So to be on safe side, restart Apache even on any change in php.ini as well.
Example: a. For Magento2 installation I needed to enable php's soap extension.  
	 b. I modified xampp/php/php.ini as following:
	 	;extension=php_soap.dll     (From)
		extension=php_soap.dll      (To)
	 c. Still showing php's soap extension not enabled.
	 d. Restart Apache, then got php's soap extension is enabled now.
Example: Depends on how you use php inside webserver:
	 a. using php a module: you have to restart the server process
	 b. using php as cgi backend: you do not have to restart the server process
/* --------------------------------------------------------------------------------------------------------------------- */
Ubuntu 20.04 with Nginx web server : Install multiple versions of PHP and create various server blocks (virtual host) using different versions of PHP
1. Firstly remove PHP from your server using following commands:
	sudo apt purge php7.*	[Uninstall all versions of PHP 7]
	sudo apt autoclean
	sudo apt autoremove
2. Use following video to install fresh PHP with multiple versions:
	https://youtu.be/1P54UoBjbDs
	FYI : Important command here is:
	sudo add-apt-repository ppa:ondrej/php	[A software installation which provides facility to install multiple versions of PHP]
3. Now create server block using link provided in starting at current page in 6th or 7th line.

