Look into website: 
https://lowendbox.com/blog/how-to-setup-apache-virtual-hosts-on-ubuntu-16-04/     [when webserver: apache2]
https://tecadmin.net/setup-nginx-virtual-hosts-on-ubuntu/     [when webserver: nginx]
If 404 or page not found error, then use print-screen: lowendbox.com_blog_how-to-setup-apache-virtual-hosts-on-ubuntu-16-04.png, 2.png, 3.png, 4.png

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
