Look into website: 
https://lowendbox.com/blog/how-to-setup-apache-virtual-hosts-on-ubuntu-16-04/     [when webserver: apache2]
https://tecadmin.net/setup-nginx-virtual-hosts-on-ubuntu/     [when webserver: nginx]
If 404 or page not found error, then use print-screen: setup-apache-virtual-hosts-on-ubuntu-1.png, setup-apache-virtual-hosts-on-ubuntu-2.jpg, setup-apache-virtual-hosts-on-ubuntu-3.jpg, setup-apache-virtual-hosts-on-ubuntu-4.jpg

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
5. It's done.
6. Apart from it, you might like to delete the whole project folder(for which this virtual-host had been created) from root-directory i.e. /var/www/html/ and delete it's associated DB as well.

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
