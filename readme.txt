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

/*** To open terminal/cli ***/
Ctrl + Alt + t

/*** To lock your machine ***/
Ctrl + Alt + l

/*** Clear the terminal/screen ***/
clear

/*** Apache server command: ***/ 
sudo service apache2 status 
sudo service apache2 start 
sudo service apache2 stop 
sudo service apache2 restart

/*** MySQL server command: ***/ 
sudo service mysql status 
sudo service mysql start 
sudo service mysql stop

/*** What is DNS => Domain Name System ***/
1. DNS is how domain names are translated into IP addresses, and DNS also controls email delivery. DNS is what allows you to use your web browser to find web sites as well as send and receive email.
2. DNS makes it possible for us to use easy to remember domain names in place of complex IP addresses (gracechurch.com instead of 209.61.148.168).
3. DNS is sort of like the white pages directory of the internet - when you enter a domain name into your internet browser, DNS does the directory lookup to find out which server that domain is pointed to and what it's IP address is and then it responds by displaying the site you requested.
Note: "White pages" meaning => The white pages is a listing of telephone subscribers in a telephone directory.

/*** Bypass DNS ***/
1. Create your virtual-host with server-name/domain-name defined and the directory to which it would point. [use branch: create_virtual_host_in_ubuntu_16.04]
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



/*** Linux Commands ***/

/*** Get help related to a linux command for ex. 'tail' ***/
man tail         /* manual 'tail' */
tail --help

/*** Go to just previous directory in hierarchy ***/
cd ..

/*** Return to just previous directory where you are present in past ***/
cd -   /* i.e. "cd dash"; "dash" symbol => also referred as "hyphen" or "subtract" or "negative" or "minus" sign */

/*** Short command to move into their home directory ***/
cd ~       /* Now you would find yourself in directory /home/jitendra for me as I had logined with username 'jitendra' */

/*** Create a directory and any parents(-p argument) that don't already exist. Following will create both directories i.e. trainingapp directory along with it's parent directory jitendray ***/
mkdir -p /var/www/html/jitendray/trainingapp
sudo mkdir -p /var/www/html/jitendray/trainingapp

/*** Listing files/folders ***/
ls      /* List files/folders (only files/folders name) of current directory */
ll      /* ll => an alias of "ls -l"; lists all files/folders (with detaile like file/folder's owner-name, group-name, creation/updation date-time) of current directory*/
ll -a   /* "ll -a" => an alias of "ls -la"; -a => This option is used to list hidden files/folders as well; it list all files/folders with it's details of current directory and hidden files/folders as well. */
ll /var/www/html/2018/test     /* Lists all files/folders of test directory */
ll -a /var/www/html/2018/test  /* Lists all files/folders of test directory including hidden files as well */

/*** To see all folders/files in current directory  ***/
find .
find xyz     /* xyz => any directory name; To see all files/folders of a directory. */

/*** "vim" editor: vim is different editor from vi and better while updating/editing a record/file. Remember, everytime whenever your file is open and you want some/any operation on your file i.e. you want to fire any command like "G" to reach end of file then always your file must be in "read" only mode. ***/
/* 1. Update a file or create a file (with provided extension) if it doesn't exist */
vim index.html
sudo vim index.html
/* 2. Reach end of a file i.e. arrive last line of file */
G   
/* i.e. type only capital G while you are in "read" only mode i.e. you are not in "insert" mode. By default, file opens in "read" only mode; to go with "insert" mode just type "i" i.e small i and return back to "read" only mode just press "Esc" button */
/* 3. Reach start/first-line of file: Remember you must be in "read" only mode. */
gg
/* 4. Reach to a particular line no: Remember you must be in "read" only mode. */
Esc + "type line no" + Shift + g
/* 5. Remove/erase the current line */
dd
/* 6. Remove all-lines or whole-content of file */
gg    /* First of all, go to first line */
dG    /* Then type "dG" i.e. delete upto the last line */
/* 7. Copy some text from one line in opened file and paste the same on another line */
Select some text using your mouse when your file is open & you are in "read" only mode, go to "insert" mode and right-click your mouse where your pointer is blinking and select paste.
/* 8. Close file & save changes */
Esc + (Shift + :) + wq   /* wq => write and quit */
/* 9. Close file and un-save changes */
Esc + (Shift + :) + q!
/* Search any text/word in a file */

/* Remove the whole/all content of a file without open the same */
> test.txt

/*** Run/Execute a php file from CLI ***/
php test.php
/d/xampp/php/php.exe test.php   /* In Windows OS, if environment variable is not set. To set environment variable for PHP look into branch php_concepts_and_programming at Page No. 133 */

/*** Unzip a zip file inside current directory ***/
unzip /home/jitendra/Downloads/Magento-CE-2.2.5_sample_data-2018-06-26-09-35-44.zip
/* Suppose you are currently in /var/www/html/2018 directory then above command would unzip file Magento-CE-2.2.5_sample_data-2018-06-26-09-35-44.zip from /home/jitendra/Downloads directory to your current directory i.e. /var/www/html/2018 */

/* Unzip a zip file inside mg226 directory i.e.: 
	a. you are currently in some-path/A directory 
	b. you have a zip-file in some-other-path/B directory like Downloads directory 
	c. you want it unziped to some-different-path/mg226 directory */
unzip /home/jitendra/Downloads/Magento-CE-2.2.5_sample_data-2018-06-26-09-35-44.zip -d /var/www/html/2018/mg226 

Note: Best practice is to create a blank directory & then unzip any zip file inside this blank directory(and if it unzipped inside a stand-alone directory then move this directory to your current-directory or to another-directory as per your requirement & delete this newly created blank directory) because you don't know unzipping would bring files scattered in current-directory or would bring all files inside a stand-alone directory and keep the current-directory clean. 

/*** Zip a recursive directory  ***/
zip -r hello.zip hi      /* Here zipped a directory 'hi' with another name 'hello', when you run 'unzip hello.zip', you will get a directory 'hi' with all files recursively existing inside it as there was 'hi' while zipping dirctory */
zip hello 1.txt 2.txt 3.txt        /* created a hello.zip file having files 1.txt, 2.txt, 3.txt:  when unzipping hello.zip, parellel to hello.zip, we would get 1.txt, 2.txt, 3.txt without any wrapper folder */

/*** Get username using currently ***/
whoami

/*** Get groups for a username ***/
groups <username>     /* first word after : is your primary group */

/*** Create user in ubuntu 16.04: For detail browse https://www.digitalocean.com/community/tutorials/how-to-add-and-delete-users-on-ubuntu-16-04 or look here into how-to-add-and-delete-users-on-ubuntu-16-04.png  ***/
adduser <newuser>            /* If you are logined with 'root' user  */
sudo adduser <newuser>       /* If you are logined with other than root user but that user is in sudo group */

/*** Grant a user sudo privileges: firstly use 'groups <username>' command all groups of user, if it is already in sudo group, then don't need fire following command. By default, a user is in a group that has the same name as user's username ***/
usermod -aG sudo <newuser>
sudo usermod -aG sudo <newuser>     /* -aG: add into group */

/*** Remove sudo privileges of a user ***/
gpasswd -d <username> sudo
sudo gpasswd -d <username> sudo

/*** Provide sudo privileges to a user by just editing sudoers file i.e. /etc/sudoers (means no need to run above command) ***/
sudo visudo         /* and add '<username>    ALL=(ALL:ALL) ALL' just below line 'root    ALL=(ALL:ALL) ALL'  */

/*** Delete a user ***/
deluser <username>            /* If you are root user */
sudo deluser <username>       /* If you are other than root user, having sudo group */
deluser --remove-home <username>          /* Delete the user's home directory as well when the user is deleted for ex: /home/jitu */
sudo deluser --remove-home <username>

/*** Change owner from one to another ***/
sudo chown -R jitendray:www-data /var/www/html/jitendray    /* chown username:groupname directory */

/*** Change mode of a file/directory ***/
chmod -R 777 /var/www/html/2018/magento2/public_html/var
chmod -Rf 777 /var/www/html/2018/magento2/public_html/pub     /* R for recursively, f for forcefully */

/*** Copy a file xyz.php but with different name jitendray.php, means both file would have same content ***/
cp xyz.php jitendray.php
/* Copy each & every file/folder of one directory to another directory */
cp /var/www/html/2018/ci226/* /var/www/html/2018/other_instance/public/
cp ci226/* other_instance/public/     /* Relative paths are allowed as well */

/*** Move some files from one place to another  ***/
mv /home/jitendra/Downloads/* /var/www/html/2018/magento2/public_html/
/* Move each & every files of Downloads directory to current-directory */
mv /home/jitendra/Downloads/* .
/* Move each & every files of current directory to test directory */
mv ./* /var/www/html/2018/test/
mv ./* ../../test/  /* You might use relative-path as well */

/*** Rename a file xyz.txt by abc.txt  ***/
mv xyz.txt abc.txt

/*** Remove all files and folders recursively from a directory trainingapp, but not the directory trainingapp ***/
rm -R /var/www/html/jitendray/trainingapp/*
/* remove all files/folders recursively from current directory, but not the current directory */
rm -R ./*
/* Remove all files/folders recursively from a directory trainingapp including the directory trainingapp itself as well */
rm -R /var/www/html/jitendray/trainingapp

/*** Switch user from current to other for ex. 'jitendray' ***/
su jitendray

/*** Login as root user(or login with another user, just replace 'root' by any other <username>) ***/
ssh root@<server-ip-address>
su root      /* If you are already logined with another user  */

/*** View log file ***/
tail error.log               /* last 10 lines by default */
tail -f 15 error.log         /* last 15 lines, if file-content grows dynamically, would show dynamically latest 15 lines */
tail -n 15 error.log         /* last 15 lines, statically i.e. just opposite of above */
head error.log               /* first 10 lines by default */
head -n 15 error.log         /* first 15 lines */

/*** To know about OS on machine ***/
cat /etc/os-release

/*** To know about your machine IP ***/
ifconfig        /* Linux */
ipconfig        /* Dos */

/*** Get installed php version: ***/ 
php -v
