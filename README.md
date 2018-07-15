# Linux Commands
/*** Get help related to a linux command for ex. 'tail' ***/
<br>**tail --help**

/*** Create a directory and any parents(-p argument) that don't already exist
Following will create both directories i.e. trainingapp directory along with it's parent directory jitendray ***/
<br>**mkdir -p /var/www/html/jitendray/trainingapp**
<br>**sudo mkdir -p /var/www/html/jitendray/trainingapp**

/*** Update a file or create a file with provided extension if it doesn't exist: ***/
<br>//vim is different editor from vi and better while updating/editing a record/file
<br>**sudo vim index.html**

/*** Change owner from one to another ***/
<br>**sudo chown -R jitendray:www-data /var/www/html/jitendray**        /* chown username:groupname directory */

/*** Get username using currently ***/
<br>**whoami**

/*** Get groups for a username ***/
<br>**groups username**       /* first word after : is your primary group */

/*** Change mode of a file/directory ***/
<br>**chmod -R 777 /var/www/html/2018/magento2/public_html/var**
<br>**chmod -Rf 777 /var/www/html/2018/magento2/public_html/pub**     /* R for recursively, f for forcefully */

/*** Copy a file xyz.php but with different name jitendray.php, means both file would have same content ***/
<br>**cp xyz.php jitendray.php**

/*** move some files from one place to another  ***/
<br>**mv /home/jitendra/Downloads/* /var/www/html/2018/magento2/public_html/**

/*** Rename a file xyz.txt by abc.txt  ***/
<br>**mv xyz.txt abc.txt**

/*** Remove all files and directories recursively from a directory trainingapp ***/
<br>**rm -R /var/www/html/jitendray/trainingapp/'*'**
<br>**rm -R .**        /* remove recursively from current directory  */

/*** Switch user from current to other for ex. 'jitendray' ***/
<br>**su jitendray**

/*** View log file ***/
<br>**tail error.log**               /* last 10 lines by default */
<br>**tail -f 15 error.log**         /* last 15 lines, if file-content grows dynamically, would show dynamically latest 15 lines */
<br>**tail -n 15 error.log**         /* last 15 lines, statically i.e. just opposite of above */
<br>**head error.log**               /* first 10 lines by default */
<br>**head -n 15 error.log**         /* first 15 lines */

/*** To know about OS on machine ***/
<br>**cat /etc/os-release**

/*** To know about your machine IP ***/
<br>**ifconfig**         /* Linux */
<br>**ipconfig**         /* Dos */


# Ubuntu Commands
Difference between apt and apt-get:
<br>apt is newer version of apt-get, introduced in 16.04
<br>//apt is a new package manager for Ubuntu just like composer for PHP
<br>//Type "apt --help" to get commands of apt and "apt-get --help" to get commands of apt-get

/*** Before install any new software(refresh available updates): ***/
<br>**sudo apt-get update**

/*** Installs newer versions of the packages you have: ***/
<br>**sudo apt upgrade**

/*** To uninstall Software Center(In left, there is orange bag with name 'Ubuntu Software'): ***/
<br>**sudo apt remove software-center**

/*** remove/unstall those packages which are no longer required. which were installed/used/having-dependency to install another package but after that no longer required, you may use this command after any software installation ***/
<br>**sudo apt autoremove**

/*** To re-install Software Center(In left, there is orange bag with name 'Ubuntu Software'): ***/
<br>**sudo apt-get update**
<br>**sudo apt install software-center**

/*** some packages weren’t installed properly. To fix this problem: ***/
<br>**sudo apt-get autoclean**
<br>(clears out the local repository of retrieved package files, but unlike apt-get clean, it only removes package files that can no longer be downloaded, and are largely useless.)

/*** One of the most basic fixes to resolve dependencies problems is to run: ***/
<br>**sudo apt-get -f install**

/*** Apache server command: ***/
<br>**sudo service apache2 status**
<br>**sudo service apache2 start**
<br>**sudo service apache2 stop**
<br>**sudo service apache2 restart**

/*** MySQL server command: ***/
<br>**sudo service mysql status**
<br>**sudo service mysql start**
<br>**sudo service mysql stop**

/*** Get installed php version: ***/
<br>**php -v**

Note: For .md file on github, *Sentence between asterisk would be in italic*, **Sentence between two asterisk would be bold**,Sentence start with "hash with a space", would behave like h1 tag", Sentence starts with "Hyphen with a space like '- ' would behave like li element"
