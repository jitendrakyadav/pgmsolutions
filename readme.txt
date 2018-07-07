Search with keyword: "magenest install magento 2 in ubuntu 16.04"
Use first video link or https://www.youtube.com/watch?v=ehhZaEG2MIc
NOte: Before any installation in ubuntu 16.04, run command "sudo apt update"

Main points:
1. Download magento2 latest version  with sample data here:
   https://magento.com/tech-resources/download
2. Enabling mod_rewrite:
   sudo a2enmod rewrite        /* check mod_rewrite already enabled or not: through phpinfo() search in browser "mod_rewrite" whether it presents under "Loaded Modules" or not as in image check_mod_rewrite_under_Loaded_Modules.png, here mod_rewrite enabled already */
   /* Modify following file */
   sudo nano /etc/apache2/apache2.conf
   /* search keyword "/var/www" and change AllowOverride from "None" to "all" */
   AllowOverride None
   AllowOverride all
   /* Now restart apache server */
   sudo service apache2 restart
3. /* Modify following file to modify some variables */
   sudo vim /etc/php/7.0/apache2/php.ini
   max_execution_time = 3600
   max_input_time = 3600
   memory_limit = 1024M
4. when you start installatin of magento 2 and make readyness check, if magento points out any missing php extension, then install php missing extensions as following:
   sudo apt install php-gd php-intl php-mbstring
   and provide 777 permissions as following:
   sudo chmod -R 777 /var/www/html/2018/magento2/public_html/var
   sudo chmod -R 777 /var/www/html/2018/magento2/public_html/pub
5. if .htaccess file is missing in magento2 root directory, create your own and get content from:
   https://github.com/magento/magento2
   without this file, you might be unable to view other pages except home-page
   
6. Install composer as following:
   sudo apt install composer
7. Install git as following:
   sudo apt install git-core  

