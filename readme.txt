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
ll /var/www/html/2018/test       /* Lists all files/folders of test directory */
ll -a /var/www/html/2018/test    /* Lists all files/folders of test directory including hidden files as well */
ll -at /var/www/html/2018/test   /* -t => sort by modification time, newest first */

/*** Copy a file xyz.php but with different name jitendray.php, means both file would have same content ***/
cp xyz.php jitendray.php
/* Copy each & every file/folder recursively of one directory to another directory. Here only files/folders from/inside "ci226" would be copied not "ci226". Here if you don't use option "-R" then only files of "ci226" would be copied not folders. */
cp -R /var/www/html/2018/ci226/* /var/www/html/2018/other_instance/public/
/* Copy all files/folders from/inside "ci226" directory but not directory "ci226" to another directory "public". As following, relative paths are allowed as well. */
cp -R ci226/* other_instance/public/
cp -R ../code/* ../../myBkp/
/* Copy all files/folders of current directory to another directory */
cp -R ./* other_instance/public/
cp -R ./* ../../public/media/
/* Copy each & every file/folder of "Downloads" directory to current-directory */
cp /home/jitendra/Downloads/* ./
cp ~/Downloads/* ./
/* Copy a whole directory with it's all files/folders to/inside another directory. Like after following command execution, you can access source-code of app/code directory from app/myBkp/code as well. */
cp -R app/code app/myBkp/

/*** Rename a file xyz.txt by abc.txt ***/
mv xyz.txt abc.txt
/* Move all files/folders recursively of one directory to another directory. Here only files/folders from/inside "Downloads" would be moved not "Downloads". Here, need not to use option "-R" (so don't use "-R" with "mv" command), "*" character alone is sufficient to work exactly the same task which "-R" does in "cp" command as above. */
mv /home/jitendra/Downloads/* /var/www/html/2018/magento2/public_html/
/* Move all files/folders from/inside "ci226" directory but not directory "ci226" to another directory "public". As following, relative paths are allowed as well. */
mv ci226/* other_instance/public/
mv ../code/* ../../myBkp/
/* Move all files/folders of current directory to another directory */
mv ./* other_instance/public/
mv ./* ../../public/media/
/* Move each & every file/folder of "Downloads" directory to current-directory */
mv /home/jitendra/Downloads/* ./
mv ~/Downloads/* ./
/* Move a whole directory with it's all files/folders to/inside another directory. Like after following command execution, you would be unable to access source-code of "app/code" directory i.e. then it would be available from "app/myBkp/code" */
mv app/code app/myBkp/

/*** Remove all files/folders recursively from/inside directory trainingapp, but not the directory trainingapp ***/
rm -R /var/www/html/jitendray/trainingapp/*
/* remove all files/folders from current directory, but not the current directory */
rm -R ./*
/* Remove a whole directory like "trainingapp" with all it's files/folders */
rm -R /var/www/html/jitendray/trainingapp

/*** "vim" editor: vim is different editor from vi and better while updating/editing a record/file. Remember, everytime whenever your file is open and you want some/any operation on your file i.e. you want to fire any command like "G" to reach end of file then always your file must be in "read" only mode. ***/
/* 1.Update a file or create a file (with provided extension) if it doesn't exist */
	vim index.html
	sudo vim index.html
/* 2.Reach end of a file i.e. arrive last line of file */
	G   
/* i.e. type only capital G while you are in "read" only mode i.e. you are not in "insert" mode. By default, file opens in "read" only mode; to go with "insert" mode just type "i" i.e small i and return back to "read" only mode just press "Esc" button */
/* 3.Reach start/first-line of file: Remember you must be in "read" only mode. */
	gg
/* 4.Reach to a particular line no: Remember you must be in "read" only mode. */
	Esc + "type line no" + Shift + g
/* 5.Remove/erase the current line */
	dd
/* 6.Remove all-lines or whole-content of file */
	gg    /* First of all, go to first line */
	dG    /* Then type "dG" i.e. delete upto the last line */
/* 7.copy and paste current line  */
	Esc + yy
	Esc + 5yy
	Esc + 7yy
/* 
a. yy => stands for "yank", we have actually copied the current line to the vim buffer(A buffer is a data area shared by hardware devices or program processes that operate at different speeds or with different sets of priorities), which is similar to the operating system's clipboard(A clipboard is a temporary storage area for data that the user wants to copy from one place to another). 
b. 5yy => would copy the 5 lines from the current cursor position line.
c. 7yy => would copy the 7 lines from the current cursor position line.  
d. Now move your cursor where you want to paste this copied line. Remember your are in read-only mode(If you like, you might go in insert mode by typing "i", create some space or blank lines, move your cursor there and again return back to read-only mode by pressing keyboard button "Esc"); Then type following: 
*/
	p    (small "p" => It would paste the copied line just next to the current cursor position line)
	P    (capital "P" => It would paste the copied line just previous to the current cursor position line)
Note: above p/P command would not affect already present next/previous lines although it would create their own fresh line with copied content.
/* 8.Select a particular section, then copy & paste the same */
	Esc + (Go to the starting poing of the section which you want to copy) + v + (Remember: small "v" => it brings vim editor into visual mode and visual mode is used for one and only to select some portion of your editor. move your cursor left, right, up and down through keybord button till the time when you reach end-point of your section, you would notice that background of this selected section has been darken, means those portion are selected now) + y + (move your cursor where you want to paste this copied portion. Remember your are in read-only mode now not in visual mode, actually after "yank" vim editor brings himself from visual mode to read-only mode) + p/P
Note: small "p" => paste the copied section just after the current cursor position character; capital "P" => paste the copied section just before the current curser position character.
/* 9.cut and paste current line */
Same thing and exactly same concept as used in above Point-7, just only replace "yy" by "dd". "dd" actually deletes the current line, but places it in vim buffer, so we can easily paste it somewhere else.
/* 10.Select a particular section, then cut & paste the same */
Same thing and exactly same concept as used in above Point-8, just only replace "y" by "d". "d" actually deletes the selected portion, but places it in vim buffer, so we can easily paste it somewhere else.
/* 11.Undo & Redo */
	u    		(small "u" => for changes undo or rollback)
	Ctrl + r	(for redo)
/* 12.Close file & save changes */
	Esc + (Shift + :) + wq   /* wq => write and quit */
/* 13.Close file and un-save changes */
	Esc + (Shift + :) + q!
vim's last line mode: Whenever you do:
	Esc + Shift + :
Then whatever you type in vim, would appear on the last line of the editor window. Hence the name "last line mode".
Just before the last line, you might see your file name with it's absolute path, file-opening data & time and at right corner of the same line you can view the exact line-no, character-no at which currently your cursor is blinking. It also shows percentage of page according to your current cursor position.
/* 14.Search any text/word in a file: To search a word: */
	Esc + / + (then type the word you want to search) + Enter
	Esc + Shift + ? + (then type the word you want to search) + Enter
Now you cursor is at first location out of the all locations where your searching-word is present. Use:
	a. n => i.e. small "n" to go to the next location of the searching-word
	b. * => i.e. star symbol to go to the next location of the searching-word in forward direction
	c. # => i.e. hash symbol to go to the next location of the searching-word in backward direction
If your exact search-word is not found then vim might suggest you some similar word to search. 
Example: search "he" but there is no any exact word "he" then after press "Enter" button, your cursor might reach to a location with word "hello" and after pressing "n" character it brings you next "hello" word location i.e. in place of "he" it would start locating/searching "hello" word. 
If vim does not found either the exact word or similar-word then it shows message like "Pattern not found".
/* 15.Make your search case-insensitive; Remember, default-search mode is case-sensitive */
	Esc + Shift + :set ignorecase + Enter      (set search to case-insensitive mode. it's scope is till the file is open)
	Esc + Shift + :set noignorecase + Enter    (returns back to default-search mode)
Note: After closing the file or re-open the file, default-search mode i.e. case-sensitive mode is set automatically.

/*** Remove the whole/all content of a file without open the same ***/
> test.txt

/*** "find" command: Search for files/directories in a directory hierarchy ***/
find					(To see all directories/files from/inside current directory)
find ./					(This is either way to write the above command)		
find .					(This is either way to write the above command)
find xyz				(To see all files/directories of a directory, named "xyz")     
find ./ -name "*world"			(search files/directories from/inside current directory having name - starting with n number of characters where n >= 0 followed by "world")
find ./ -type d -name "*world"		(search/show d => directory only from current directory having name - starting with n number of characters where n >= 0 followed by "world")
find ./ -type f -name "file1.php"	(search -type f => file in current directory => ./ with -name => name file1.php)
find ./ -type f -name "fi*"		(search files starting with characters "fi" followed by n number of characters where n >= 0)
find ./ -type f -iname "fi*"		(search files in -i => case-insensitive manner i.e search a file start with "fi"/"Fi"/"fI"/"FI" followed by n number of characters where n >= 0)
find ./ -type f -name "*fi*"		(search files having 2 characters "fi" starting & ending with n number of characters where n >= 0)
find ./ -type f -name "*.php"		(search files with n numbers of characters followed by ".php")
find ./ -type f -not -iname "*.php"	(search/show all files of a directory excluding only - with n numbers of characters followed by ".php" in case-insensitive manner)
find /etc -type f -iname "*.conf"	(search files starting with n number of characters where n >= 0 followed by ".conf" in case-insensitive manner)
find /etc -maxdepth 1 -type f -iname "*.conf"	(search files having depth upto 1. Depth of a file is measured by depth of directories inside which file is located i.e. directory inside directory. Example: Here all matched/searched files found inside /etc directory, would have depth 1, if found inside /etc/xyz directory then for those files depth would be 2, if inside /etc/xyz/xyz2 then for those files depth would be 3, and so on. Here if -maxdepth is set 3 then those files would be searched here which has depth 3 as well as depth 1 and 2)
find /etc -size +10k			(search files in directory "/etc" having size more than 1KB) 
find /etc -size -1k			(search files in directory "/etc" having size less than 1KB) 
find ~/Downloads -size +10M		(search files in directory "~/Downloads" having size more than 10 MB)
find ~/Downloads -size -10M		(search files in directory "~/Downloads" having size less than 10 MB)

/*** "locate" command: This command is used to search any file/directory throughout the system/machine/server. ***/
While "find" is no doubt one of the most popular as well as powerful command for file searching in Linux, it's not fast enough for situations where in you need instantaneous results. If you want to search a file throughout your system/machine/server through CLI and speed is the top most priority, then there's another command that you would like to use: "locate".
The reason "locate" is so fast is because it doesn't read the file system for the searched file or directory, it actually refers a database (called mlocate database and prepared/updated by command "updatedb") to find what user is looking, and based on that search, produces its output. 
While this is a good approach, it has it's drawbacks as well. The main issue is that, after every new file/directory is created on the system, you need to update the tool's database for it to work correctly. Otherwise, "locate" command would not be able to find files/directories that are created after the last database update.
/* 1.Refresh mlocate database */
	sudo updatedb
/* 2.Search a file/directory */
	locate <file/directory-name>
	locate test.php
	locate test
Note: Here "locate" converts your file/directory name as following automatically to extend their search criteria:
	"test.php" => "*test.php*"
	"test" => "*test*"
/* 3.Search for exact file/directory name i.e. we don't want to let "locate" add * symbol to start & end of our searched-word. Like for searching "testfile" we don't want "locate" modify it as "*testfile*", for it we will have to use "-r" option i.e. regular expression. To view all "locate" options use command "locate --help" or for more information about "locate" use command "man locate": */
	locate -r /testfile$		(r => regexp)
	locate -c -r /testfile$		(It would show only no. of results. "-c -r" and "-cr" are same)	
	locate -cr /testfile$		(It would show only no. of results.) 
/* 4.Limit search queries to a specific number */
	locate test.txt -n 10      (would list only first 10 results)
/* 5.Display the total number of matching results only */
	locate -c test.php	(c => count)     
/* 6.Search the file in case-insensitive manner */
	locate -i test.php	(i => ignore-case)
/* 7.Display only those files which are physically present in your system/machine/server; because it might be a case that your searched file/directory has been deleted after the last mlocate database update then normal "locate" command would still show that deleted file/directory in their result but with following command having option "-e" would force to "locate" to check physical existance of the files/directories before display: */
	locate -e test.php	(e => existing)
	locate -ie test.php     ("-ie" and "-i -e" are same)
	locate -i -e test.php
/* 8.Get statistics/information about mlocate database */
	locate -S	(capital "S" => statistics)
/* 9.Suppress error messages: sometime unnecessary messages are displayed like "you have not permission for these directories to search as you are not a super-user". To hide these type of messages, use "-q" option */
	locate -q test.php
/* 10.Choose/Use a new mlocate database(not the default one) for search */
	locate -d <new-mlocate-db-path> <file/directory-name>	(d => database DBPATH)
	locate -d /var/lib/mlocate/mlocate-new.db test.php 

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

/*** View current date/time with time-zone on your machine/system/server ***/
date

/*** View calendar of current-month on your machine/system/server ***/
cal
cal 2018	(Displays calendar of whole year)     

/*** List users who are currently online/active on system/server ***/
w

/*** "touch" command: using this, we can create 0 kb multiple files i.e. with blank content in one go ***/
touch hello.php test.php app/readme.txt app/etc/env.php app/etc/config.php

/*** Show current working directory ***/
pwd

/*** Show history of commands fired previously by the current-user within their environment ***/
history

/*** "top" command ***/
The top command allows users to monitor processes and system resource usage on Linux. It is interactive(that means at run time it accepts input and at the same time provide/display output/result), and you can browse through the list of processes, kill a process, and so on. 
Reference: 1. https://www.booleanworld.com/guide-linux-top-command/
	   2. https://youtu.be/rloSW2TGGjU

We can divide "top" screen in two parts. The upper half(i.e. the summary area) of the output contains statistics on processes and resource usage, while the lower half contains a list of the currently running processes. We can use the arrow keys and Page Up/Down keys to browse through the list. If we want to quit, simply press "q".
1. Summary Area: It has 5 rows. Let's go for one by one:
	a. First row: This row looks like something as following:
		top - 23:47:02 up 90 days 15:26,  2 users,  load average: 0.49, 0.46, 0.45
	It shows current time in hour:minute:second. Secondly it shows system's up-time i.e. from how much time machine/system/server has been started or in other words, from how much time machine/system/server has not been shutdown/power-off. Here shows machine has been started 90 days 15 hours & 26 minutes back. It also shows there are 2 users currently active/online on system. 
	Thirdly it shows "load average". This section represents the average "load" over one, five and fifteen minutes. "Load" is a measure of the amount of computational work a system performs. On Linux, the load is the number of processes in the R and S states at any given moment. The "load average" value gives you a relative measure of how long you must wait for things to get done.
	Let us consider a few examples to understand this concept. On a single core system(i.e. having only one processor/CPU), a load average of 0.4 means the system is doing only 40% of work it can do. A load average of 1 means that the system is exactly at it's capacity. A system with a load average of 2.12 means that it is overloaded by 112% more work than it can handle.
	On a multi-core system(i.e. having more than one processor/CPU), we should first divide the load average with the number of CPU cores to get a similar measure.
	b. Second row: This row has "Tasks" and looks like as following: 
		Tasks: 248 total,   1 running, 247 sleeping,   0 stopped,   0 zombie
	
