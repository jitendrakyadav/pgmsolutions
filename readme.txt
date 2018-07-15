/*** Linux Commands ***/

/**** Get help related to a linux command for ex. 'tail' ****/
tail --help

/**** Create a directory and any parents(-p argument) that don't already exist
Following will create both directories i.e. trainingapp directory along with it's parent directory jitendray ****/
mkdir -p /var/www/html/jitendray/trainingapp
sudo mkdir -p /var/www/html/jitendray/trainingapp

/*** Update a file or create a file with provided extension if it doesn't exist: ***/ 
//vim is different editor from vi and better while updating/editing a record/file 
sudo vim index.html

/**** Change owner from one to another ****/
sudo chown -R jitendray:www-data /var/www/html/jitendray    /* chown username:groupname directory */

/**** Get username using currently ****/
whoami

/**** Get groups for a username ****/
groups username     /* first word after : is your primary group */

/**** Change mode of a file/directory ****/
chmod -R 777 /var/www/html/2018/magento2/public_html/var
chmod -Rf 777 /var/www/html/2018/magento2/public_html/pub     /* R for recursively, f for forcefully */

/**** Copy a file xyz.php but with different name jitendray.php, means both file would have same content ****/
cp xyz.php jitendray.php

/**** move some files from one place to another  ****/
mv /home/jitendra/Downloads/* /var/www/html/2018/magento2/public_html/

/**** Rename a file xyz.txt by abc.txt  ****/
mv xyz.txt abc.txt

/**** Remove all files and directories recursively from a directory trainingapp ****/
rm -R /var/www/html/jitendray/trainingapp/*
rm -R .        /* remove recursively from current directory */

/**** Switch user from current to other for ex. 'jitendray' ****/
su jitendray

/**** View log file ****/
tail error.log               /* last 10 lines by default */
tail -f 15 error.log         /* last 15 lines, if file-content grows dynamically, would show dynamically latest 15 lines */
tail -n 15 error.log         /* last 15 lines, statically i.e. just opposite of above */
head error.log               /* first 10 lines by default */
head -n 15 error.log         /* first 15 lines */

/**** To know about OS on machine ****/
cat /etc/os-release

/**** To know about your machine IP ****/
ifconfig        /* Linux */
ipconfig        /* Dos */


/*** Ubuntu Commands ***/

Difference between apt and apt-get: 
apt is newer version of apt-get, introduced in 16.04 
//apt is a new package manager for Ubuntu just like composer for PHP 
//Type "apt --help" to get commands of apt and "apt-get --help" to get commands of apt-get

/*** Before install any new software(refresh available updates): ***/ 
sudo apt-get update

/*** Installs newer versions of the packages you have: ***/ 
sudo apt upgrade

/*** To uninstall Software Center(In left, there is orange bag with name 'Ubuntu Software'): ***/ 
sudo apt remove software-center

/*** remove/unstall those packages which are no longer required. which were installed/used/having-dependency to install another package but after that no longer required, you may use this command after any software installation ***/ 
sudo apt autoremove

/*** To re-install Software Center(In left, there is orange bag with name 'Ubuntu Software'): ***/ 
sudo apt-get update 
sudo apt install software-center

/*** some packages weren’t installed properly. To fix this problem: ***/ 
sudo apt-get autoclean 
(clears out the local repository of retrieved package files, but unlike apt-get clean, it only removes package files that can no longer be downloaded, and are largely useless.)

/*** One of the most basic fixes to resolve dependencies problems is to run: ***/ 
sudo apt-get -f install

/*** Apache server command: ***/ 
sudo service apache2 status 
sudo service apache2 start 
sudo service apache2 stop 
sudo service apache2 restart

/*** MySQL server command: ***/ 
sudo service mysql status 
sudo service mysql start 
sudo service mysql stop

/*** Get installed php version: ***/ 
php -v
