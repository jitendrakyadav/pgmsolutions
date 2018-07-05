/**** Get help related to a linux command for ex. 'tail' ****/
tail --help

/**** Create new directory
Following will create both directories i.e. trainingapp directory along with it's parent directory jitendray ****/
mkdir -p /var/www/html/jitendray/trainingapp

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
