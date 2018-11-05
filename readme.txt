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
sudo service mysql restart

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

/* What if several virtual hosts are created for various applications and someone wants to access your particular application through IP address */



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

/*** "grep" command: This command searches file/files to match a given pattern and prints the matching lines containing the pattern. ***/
1. Help & Manual:
	grep --help
	man grep
2. Syntax: 
	grep [OPTIONS] PATTERN FILE
3. Here PATTERN & FILE both might be some regular-expression to provide matching-string & file-names respectively.
4. FILE => *, means grep would search all files of current directory; and if "-r" option is also used along with this, grep would search recursively all files as well as all folder's files present in current directory.
	a. FILE => xyz.txt like as following
		grep jitu xyz.txt
	then grep print only lines(not the name of file xyz.txt) containing the PATTERN "jitu" in xyz.txt.
	b. FILE => my* like as following
		grep jitu my*
	If there present only one pattern-matched file like myfile1.txt in current directory then output would be same as in just previous section (a) i.e. grep would print only lines containing the PATTERN "jitu", not the file name.
	suppose there present 3 files like myfile1.txt, myfile2.php & myfile3.txt in current directory; now for same command, grep would print all lines containing the PATTERN "jitu" along with their file-names. 
5. Popular OPTIONS:
	-H => print file-name always even if there is file-name mentioned in command
	-r => search recursively i.e. search all files as well as all folder's files present in current directory
	-i => ignore case distinctions
	-n => print line number with output lines of file
	

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

/* ---------------------------------------------------------------------------------------------------------------------- */
/*** Create an user in mysql ***/ 
1. All created-users & their privileges data are stored in "user" table under "mysql" database.
2. Some mysql server versions restrict to use a password like having min 8 characters with atleast one capital-letter, one small-letter, one special-character, one digit. 
3. Firstly, you would need to login to your mysql database server & then run following command. 
CREATE USER '<username>'@'localhost' IDENTIFIED BY '<password>';
CREATE USER 'jitendray'@'localhost' IDENTIFIED BY 'Jite_ndra8';

/* Create a database */
CREATE DATABASE <db-name>;						
CREATE DATABASE test_db;

/* Difference between keywords DATABASE & SCHEMA */
In MySQL, physically, a schema is synonymous with a database. You can substitute the keyword SCHEMA instead of DATABASE in MySQL SQL syntax, for example using CREATE SCHEMA instead of CREATE DATABASE. Some other database draw a distinction. For example, in Oracle Database, a schema represents only a part of a database: the tables and other objects owned by a single user.

/* Grant all privileges to <username> for <db-name>: Remember, <username> can do each & every operation on their attached database, even can delete/drop their database <db-name> as well, but can't create a new database. */
GRANT ALL PRIVILEGES ON <db-name>.* TO '<username>'@'localhost';
GRANT ALL PRIVILEGES ON test_db.* TO 'jitendray'@'localhost';

/* Provide privileges on specific table of database: Remember, if test_db has 3 tables - tbl1, tbl2, tbl3 but you have provided all-privileges for only 2 tables like tbl1, tbl2 as following, then after login, user jitendray would be able to see only these 2 tables tbl1 & tbl2, tbl3 would not be visible i.e. would be hidden for him. */
GRANT ALL PRIVILEGES ON test_db.tbl1 TO 'jitendray'@'localhost';
GRANT ALL PRIVILEGES ON test_db.tbl2 TO 'jitendray'@'localhost';

/* Grant/Provide only SHOW VIEW privileges */ 
GRANT SHOW VIEW ON test_db.tbl3 TO 'jitendray'@'localhost';
/* Definitely tbl3 would be visible for jitendray, but he can't use DESC/DESCRIBE (to view table structure) & SELECT (to view table's data) for tbl3. */
 
/* Grant SELECT privilege only */ 
GRANT SELECT ON test_db.tbl3 TO 'jitendray'@'localhost';
/* You can use DESC/DESCRIBE & SELECT statements for tbl3 now. But remember, you can't use INSERT, UPDATE, DELETE, etc. for table tbl3 */

/* Provide privileges on all databases, present on database-server */
GRANT ALL PRIVILEGES ON *.* TO 'jitendray'@'localhost';

/* Provide limited privileges */ 
GRANT SELECT, INSERT, UPDATE, DELETE, ALTER, REFERENCES ON test_db.* TO 'jitendray'@'localhost';
/* Permissible Static Privileges for GRANT and REVOKE: Look on web-page https://dev.mysql.com/doc/refman/8.0/en/grant.html under section "Privileges Supported by MySQL" */

/* Remove/Revoke privileges table by table */ 
Following command would work if you had granted privileges for this table on table-level in past. Means like if you had provided privileges the whole db in one go in past for example my_jitu_db.* and now you are revoking privileges on table-level i.e. table by table then this command would not work and show you error. */
REVOKE ALL PRIVILEGES ON my_jitu_db.tbl3 FROM 'jitendray'@'localhost';

/* Remove/Revoke privileges in one go */ 
Remember the same things as described in just previous command i.e. revoke privileges in same manner as you had granted in past otherwise error occurs i.e. remove/revoke privileges on bulk level as in following command if you had created privileges on bulk level like my_jitu_db.* and remove/revoke privileges on table level as in previous command if you had created privileges on table level in past like my_jitu_db.tbl3 */
REVOKE ALL PRIVILEGES ON my_jitu_db.* FROM 'jitendray'@'localhost';

/* Refresh privileges: 
When we grant some privileges to a user, running the command "flush privileges" will reload the grant tables in the "mysql" database enabling the changes to take effect without reloading or restarting mysql service.
Following "mysql" database tables contain grant information:
a. "user": User accounts, global privileges, and other non-privilege columns
b. "db": Database-level privileges
c. "tables_priv": Table-level privileges
d. "columns_priv": Column-level privileges
e. "procs_priv": Stored procedure and function privileges
f. "proxies_priv": Proxy-user privileges 
*/
FLUSH PRIVILEGES;
/* Privileges assigned through GRANT option (as above) do not need FLUSH PRIVILEGES to take effect - MySQL server will notice these changes and reload the grant tables immediately. */

/* Now exit from mysql & restart it (Look how restart or stop/start mysql server at line no. 48). Try/Start login with newly created <username> to access the attached database <db-name> (To get/read/understand some basic mysql unix-shell/linux commands, look in branch "mysql_concepts_and_commands" at page no. 7) */

/* Get all users with their host-name on mysql-server: Here "mysql" => db-name, "user" => table-name */
SELECT user, host FROM mysql.user;

/* Delete/Drop an user from mysql-server: Remember, it doesn't affect user's attached databases, those would remain un-changed. */
DROP USER '<username>'@'<host-name-or-ip-address-for-which-user-was-created>';
DROP USER 'jitendray'@'localhost';

/* Delete/Drop a database */
DROP DATABASE [IF EXISTS] database_name;
DROP DATABASE test_db;			//If test_db does not exist, MySQL will issue an error
DROP DATABASE IF EXISTS test_db;	//If test_db does not exist, MySQL terminates the statement without issuing any error.

Note: It is best practise to keep database and web-server separately i.e. keep database-server and web-server on separate machine i.e. on different IPs. If it is followed, user can't access their database using CLI as from web-server/application-server they can't use command like "mysql -h <host-name> -u <username> -p" as there is not installed MySQL server; and they can't access database server directly using CLI as well, as they have not provided/created any operating-system's user credential to enter into database server and then using their database's credential to access their database. So there remains only one way for user to access their database i.e. use any database GUI tool like MySQL Workbench, SQLyog, etc. Reference: http://www.dbta.com/Editorial/News-Flashes/5-Best-Practices-for-Securing-Databases-101930.aspx
/* ---------------------------------------------------------------------------------------------------------------------- */

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
The top command allows users to monitor processes and system resource usage on Linux. It is interactive(that means at run time it accepts input and at the same time provide/display output/result), and you can browse through the list of processes, kill a process, and so on. Open manual for "top" command i.e. "man top" to know more.
Reference: 1. https://www.booleanworld.com/guide-linux-top-command/
	   2. https://youtu.be/rloSW2TGGjU => "top" command & it's sub-commands usages

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
	This section shows statistics regarding the processes running on your system. The "total" value is simply the total number of processes. For example, in above provided data, there are 248 processes running. To understand the rest of the values, we need a little bit of background on how the Linux kernel handles processes.
	The CPU is idle(means having no-work at that time) when a process performs I/O (like suppose there is a process/program which requires some number as input in it's execution interactive mode to provide factorial of that number as output), so operating-systems switch to executing other processes during this time. In addition, the OS allows a given process to execute for a very small amount of time, and then it switches over to another process. This is how operating-systems appear/work as if they were in "multitasking" state/mode. Doing all this requires us to keep track of the "state" of a process. In Linux, a process may be in of these states:
		i.   Runnable (R): A process in this state is either executing on the CPU, or it is present on the run queue, ready to be executed.
		ii.  Interruptible(i.e. make a break in the continuity of a process) sleep (D): Processes in this state are waiting for an event to complete to get again their turn to be processed by CPU; as it is interrupted last time due to CPU's multitasking mode.
		iii. Uninterruptible sleep (S): In this case, a process is waiting for an I/O operation to complete. In this case program-execution consumes time to take manual input and therefore in between CPU goes to another process (in this case CPU does not interrupt the process execution itself but the waiting-time for manual-input during process/program execution is responsible that's why CPU jumps to another process to save/make-productive their time) to execute and when program get their manual input, CPU returns back to the program to process the same for required output.
		iv.  Stopped (T): These processes have been stopped by a job control or might be by site-administrator manually due to the program/process becomes un-responsive.
		v.   Zombie (Z): To understand what a zombie process is and what causes zombie processes to appear, you’ll need to understand a bit about how processes work on Linux.
		A process may create a number of child processes. When a process dies on Linux, it isn’t all removed from memory immediately — its process descriptor stays in memory (the process descriptor only takes a tiny amount of memory). The process's status becomes EXIT_ZOMBIE and the process's parent is notified that its child process has died. The parent process is then supposed to execute the wait() system call to read the dead process's exit status and other information. This allows the parent process to get information from the dead process. After wait() is called, the zombie process is completely removed from memory by parent process.
		This normally happens very quickly, so you won't see zombie processes accumulating on your system. However, if a parent process isn't programmed properly and never calls wait(), its zombie children will stick around in memory until they're cleaned up.
	Processes in the D and S states are shown in "sleeping", and those in the T state are shown in "stopped". The number of zombies are shown as the "zombie" value and obviously processes in R state are shown as running.
	If we want to show "Threads" here instead of "Tasks", just press capital "H". All threads of a process share its virtual address space and system resources. If we want to switch back to the process/task view, press "H" again. 
	c. Third row: This row shows the percentage of CPU time spent on various tasks and looks like as following:
		%Cpu(s):  0.1 us,  0.1 sy,  0.0 ni, 99.8 id,  0.0 wa,  0.0 hi,  0.0 si,  0.0 st
		i.   "us" value: The "us" value is the time CPU spends executing processes/programs in userspace.
		ii.  "sy" value: The "sy" value is the time CPU spends executing processes/programs in kernelspace.
		Reference: https://youtu.be/sUw32fUZgNk => What is exactly userspace, kernel & kernelspace
		Userspace:	
			A. It is the space where user do their work.
			B. Example: viewing a file
			C. It has private VAS => Virtual Address Space.
			D. Userspace has limited access/privileges or we might say it's access is to it's space only and no any access outside of it.
		Kernel & Kernelspace (kernel-1.png, kernel-2.png): 
			A. Kernel is the connection medium between software & hardware. 
			B. In easy language, you might say it's like a bridge which connects two villages situated on 2 different edges of a river. 
			C. It is the central module of any operating-system. 
			D. It controls CPU usage, memory usage, tasks execution scheduling, etc. It controls peripheral devices like keyboard, mouse, etc. as well.   
			E. It has their space where it works without any user interruption, called kernelspace.
			F. It has single VAS => Virtual Address Space.
			G. Any program moves between userspace and kernelspace till the execution completes.
			H. Example: when user wants to open a file then this file-opening process initially in userspace as user requires for it then it enters into kernelspace and kernel do their work here like having communication with memory(hardware) and decides how much memory needs to allocate this process, then again it returns back to userspace to serve to the user i.e. file content viewable on the screen. 
			I. As it is central/core part of OS it has access of userspace as well.
		iii. "ni" value: Linux uses a "nice" value to determine the priority of a process. A process with a high "nice" value gets a low priority. Similarly, processes with a lower "nice" gets higher priority. The default "nice" value can be changed. A process with higher priority(i.e. lower nice value) would get more time of CPU for it's execution so that it could finished/completed earlier. The time spent on executing processes with a manually set "nice" appear as the ni value.
		iv.  "id" value: It shows the time for which CPU remains idle(i.e. no work). Most operating systems put the CPU on a power saving mode when it is idle.
		v.   "wa" value: It is the time the CPU spends waiting for I/O to complete(like suppose there is a process/program which requires some number as input in it's execution interactive mode to provide factorial of that number as output, so CPU waits until it get the number from user to process further).
		Scheduling Algorithms: To decide which process to execute first and which process to execute last to achieve maximum CPU utilisation, operating system has following scheduling algorithms for CPU:
			A. First Come First Serve(FCFS) Scheduling
			B. Shortest-Job-First(SJF) Scheduling
			C. Priority Scheduling
			D. Round Robin(RR) Scheduling
			E. Multilevel Queue Scheduling
			F. Multilevel Feedback Queue Scheduling
		Remember, scheduling algorithms keep on changing every moment by OS, based on circuminstances at that moment. CPU scheduling algorithms decision might take place under the following four circumstances:
			A. When a process switches from the running state to the waiting state(for I/O request)
			B. When a process switches from the running state to the ready state (for example, when an interrupt occurs).
			C. When a process switches from the waiting state to the ready state(for example, completion of I/O).
			D. When a process terminates.			
		In circumstances 1 and 4, a new process(if one exists in the ready queue) is selected by CPU for execution. Suppose if there is only one process having I/O request then firstly CPU waits to get input by user if it consumes more time then CPU becomes idle and process goes under waiting mode, after process getting input from user, goes in ready state and then CPU comes in execution state and executes the process. 
		vi.  "hi" => Hardware Interrupts & "si" => Software Interrupts value: The time spent on handling hardware and software interrupts are given by hi and si respectively. 
		Interrupts are signals to the processor about an event that requires immediate attention. The processor responds by suspending its current activities, saving its state, and executing a function called an interrupt handler (or an interrupt service routine, ISR) to deal with the event. This interruption is temporary and after the interrupt handler finishes, the processor resumes normal activities.
		Hardware interrupts are typically used by peripherals to tell the system about events, such as a keypress on a keyboard. Hardware interrupts are asynchronous. The act of initiating a hardware interrupt is referred to as an interrupt request (IRQ).
		A software interrupt is caused by an exceptional condition. For example, a divide-by-zero exception will be thrown if the processor's arithmetic logic unit is commanded to divide a number by zero as this instruction is an error and impossible. The operating system will catch this exception, and can decide what to do about it: usually aborting the process and displaying an error message.
		Each interrupt has its own interrupt handler. The number of hardware interrupts is limited (as peripheral devices like keyboard & mouse etc. are limited and hence they can fire limited interruptions) by the number of interrupt request (IRQ) to the processor, but there may be hundreds of different software interrupts. Interrupts are a commonly used technique for computer multitasking, especially in real-time computing.
		vii. "st" value: Steal time is the percentage of time a virtual CPU waits for a real CPU while the hypervisor is servicing another virtual processor.
		In a virtualized environment, a part of the CPU resources are given to each virtual machine (VM) (Actually not only CPU but other resources like RAM, Harddisk, etc. are also divided into parts not really but virtually and assigned these resource-parts to these virtual machines while creating these VMs by base/physical machine). The OS detects when it has work to do, but it cannot perform them because the CPU is busy on some other VM. The amount of time lost in this way is the "steal time", shown as "st".
		Virtualization: It refers to the act of creating a virtual (rather than actual) version of something. In computing, for example: virtual host, virtual machine, etc. 
		Hardware virtualization or platform virtualization refers to the creation of a virtual machine(Reference: https://youtu.be/bC534nTUYwA => What is virtualization exactly) that acts like a real computer with a separate operating system. For example, a computer that is running Microsoft Windows may host/create a virtual machine that looks like a computer with the Ubuntu Linux operating system; Ubuntu-based software can be run on the virtual machine.
		In hardware virtualization, the host machine is the actual machine on which the virtualization takes place, and the guest machine is the virtual machine. The words host and guest are used to distinguish the software that runs on the physical machine from the software that runs on the virtual machine (A software like notepad++ if available on host machine or on one virtual machine would not be available on another virtual machine, you would be install the same i.e. notepad++ there as well to use in that virtual machine, means any virtual machine would behave like a different computer/platform/machine and seems like not related in any way to the host machine or another virtual machine). The software that creates a virtual machine on the host hardware is called a hypervisor or Virtual Machine Monitor/Software. There are many hypervisors available in market like VMware, VirtualBox, etc.
	d. Fourth & Fifth row: These rows shows the information regarding memory usage of the system and looks like as following:
		KiB Mem :  8041232 total,  1612456 free,  3038196 used,  3390580 buff/cache
		KiB Swap: 16507900 total, 16507900 free,        0 used.  4184248 avail Mem
	The lines marked "Mem" and "Swap" show information about RAM and swap space respectively. Here Swap is actually virtual memory, well described in 4th point of below section named "Important points". 
	As we naturally expect, the "total", "free" and "used" values have their usual meanings. The "avail mem" value is the amount of memory that can be allocated to processes without causing more swapping. Like here, suppose to execute a program, processor needed 5 GB > 4.184248 GB swap memory then might be possible this row could update itself to increase their total Swap memory which is currently 16.507900 GB. 
	"buff/cache" are same as well described in 3rd & 5th points of below section named "Important points".
	References: 
		1. https://youtu.be/Rman7ORGbrg => What is RAM(Random Access Memory), DRAM(Dynamic RAM), SD RAM(Synchronous DRAM), SDR SD RAM(Single Data Rate SD RAM), DDR SD RAM(Double Data Rate SD RAM), SRAM(Static RAM)
		2. https://youtu.be/KzCS_revsPQ and https://youtu.be/5IjcTUgpHX4 => Cache Memory
		3. https://youtu.be/T2tsPO4b3E0 => Cache Mapping
		4. https://youtu.be/PB7vcUfmyCg => Various memories including Cache, Flash, Virtual, Buffer
		5. Memory hierarchy => memories_in_a_computer.jpg
	Important points about memories: Memories are of two types. First are those, used for processing like RAM, Buffer, Cache, Registers (Example: Suppose you starts your computer after some time and open notepad but actually what happens - notepad software is stored in hard-disk so processor/CPU brings notepad from hard-disk to RAM so that it can process further instructions, means like suppose now you type "M" on notepad then what happens - kernel receive instruction from keyboard and instruct processor to write the same on notepad, now processor search the notepad file which it finds in RAM and execute/process their instruction i.e. write the character "M" in notepad file); and second which are used for data(like we might say softwares, applications, many type of files, etc.) storage like hard-disk.
		1. Secondary memory or ROM i.e. read-only memory is slowest memory having most space. Unlike main memory (RAM), ROM retains its contents even when the computer is turned off. ROM is referred to as being non-volatile(volatile => tending to vary/change often). Processor uses this to store their data.
		2. RAM i.e. random-access memory is called primary memory or main memory. It is faster and having fewer space as compared to sceondary memory. It is refered as read-write memory. It is volatile(volatile => tending to vary/change often). Processor/CPU uses this to store their instructions and execute/process the same. It is of 2 types:
			a. Dynamic RAM: 
				i.   It uses 1 capacitor & 1 transistor to store singlr bit of memory/data.
				ii.  It needs frequent recharge to store data as it is.
				iii. So it consumes more power as compared with "Static RAM".
				iv.  It's slower than "Static RAM".
				V.   It is of 2 types:
					A. clock disabled
					B. clock enabled i.e. Synchronous Dynamic RAM. It's of 2 types:
						a. Single Data Rate i.e. SDR SD RAM which was used in Intel Celeron & Pentium processors.
						b. Double Data Rate i.e. DDR SD RAM. It has different generations like DDR1, DDR2, DDR3, DDR4. DDR4 is the latest & fastest DDR SD RAM in DDR generation/series and is used in latest Intel processors like i5 & i7.
			b. Static RAM: 
				i.   It uses 1 flip-flop & 4 to 6 transistors to store single bit of memory/data i.e. more space to store same amount of data as compared to Dynamic RAM that's why it is costlier than Dynamic RAM. 
				ii.  It stores the data statically i.e. can store same data continuously till computer/machine/server power off occurs.
				iii. It doesn't require frequent recharge that means it consumes less power.
				iv.  It's faster than Dynamic RAM and is used as cache memory.
		3. Buffer: A physical location in memory(RAM) where processor stores some data at temporary basis like for 30 or 50 mins so that if processor again needs the same data to use it takes from here. It lost on computer power off.
		4. Virtual memory: When RAM is full and processor needs more, then processor uses some limited space of hard-disk as RAM, this limited space is called virtual-memory. For example: suppose processor needs 2.5 GB RAM to execute a process/program but their available only 2 GB of RAM in computer, so in this case processor uses 1 GB extra as virtual memory to fulfill their requirement and after execution completes, processor instantly releases this virtual memory. As accessing disks i.e. hard-disk are slow, relying too much on virtual memory can harm system performance.
		5. Cache: Static RAM is used as cache memory. It might contain space from 2MB upto 12MB. It's of 3 types L1, L2, L3 referred as Level 1, Level 2 & Level 3. L1 is inbuilt with processor, L2 might be inside processor or outside of processor and L3 is out of processor.
		6. Registers: It comes inbuilt with processor and is the fastest memory that processor uses in computer. As it has very less space and contains only most frequently used data addresses that present in cache. It's uses negligible by processor so let's not discuss more about it.

2. Task Area: The lower half section has many columns with data. The data in both sections(i.e. current section & upper half section) refreshes after every specific time-duration, by default it's 3 seconds. Let's observe all columns one by one:
	a. PID: It is the process ID, an unique positive integer that identifies a process/task.
	b. USER: It is the "effective" username (which maps to an user ID) of the user who started the process/task.
	c. PR & NI: "NI" shows the nice value of a process and is an user-space concept. "PR" shows the scheduling priority of the process from the perspective of the kernel and is the process’s actual priority. 
	   Nice value affects the priority of a normal process.
	   NI value ranges from -20 to 19  (Here -20 => highest priority, 19 => lowest priority, 0 is default nice value)
	   PR = 20 + NI = 20 + (-20 to 19) = 0 to 39   (For normal processes)
	   Thus if we change NI value of a normal process on runtime, PR value also changes accordingly.
	   Example: Suppose for a process NI=0 and PR=20; if we change NI=-5 then PR would be changed to (20-5) i.e. 15.
	   If there is showing "rt" under PR for a process(here it's real-time process), this means it's showing "real time" scheduling priority and it's can't be changed manually i.e. we can change NI value for the process but it's PR value "rt" would be unchanged.  
	   Summarize:
		Nice value NI is a user-space concept and priority PR is the process's actual priority that is used by Linux kernel. In linux system, priorities are from 0 to 139 in which 0 to 99 for real time processes(i.e. having value "rt" under PR) and 100 to 139 for users(i.e. user-space processes). Nice value range is -20 to +19 where -20 is highest, 0 default and +19 is lowest. Relation between nice value and priority is:
	   PR = 20 + NI
	   so, the value of PR = 20 + (-20 to +19) is 0 to 39 that maps 100 to 139.
	   For a process(i.e. normal/user-space process), having NI=-20 & PR=0, is the highest priority and NI=-19, -18, ..0, 1, ..19 with PR=1, 2, ..20, 21, ..39 is lower and lower priority respectively. Here remember from just above statement, PR=0 to 39 means ideally 100 to 139.
	d. VIRT: It is total amount of virtual memory (i.e. swap in summary area) used by the process/task.
	e. RES: It stands for resident size, which is an accurate representation of how much actual physical memory a process is consuming. In other words, It is non-swapped physical memory (i.e. RAM or Mem in summary area) used by the process/task. 
	f. SHR: It indicates how much of the VIRT size is actually sharable (memory or libraries). In the case of libraries, it does not necessarily mean that the entire library is resident. For example, if a program only uses a few functions in a library, the whole library is mapped and will be counted in VIRT and SHR, but only the parts of the library file containing the functions being used will actually be loaded in and be counted under RES.
	g. S: It shows the process state in single-letter form. Above 1(b)-i,ii,iii,iv,v well describes the various states of a process/task.
	h. %CPU: It is percentage of CPU used by the process/task.
	i. %MEM: It is percentage of RAM used by the process/task.
	j. TIME+: It is total time of activity of the process/task.
	k. COMMAND: It shows name of the process/task. Like if you fire command "ls -l" it would show here as "bash".

"top" sub-commands: "top" command is one of the most frequently used commands in our daily system administrative jobs. "top" command displays processor activity of our Linux box and also displays tasks managed by kernel in real-time. It'll show how processor and memory are being used, and other information like running processes/tasks. This may help us to take correct action.
While "top" command is running and showing information for summary-area & task-area, we can use following sub-commands to get more:
1. Get help: when you press "h", it shows help for interactive commands. Use "Esc" or "q" to get back.
2. Display specific user process: when you press "u", in interactive mode it would tell you to provide username as input (leave blank for all-users); you might select any from "USER" column & input the same. Then it will list only those processes/tasks started by provided username.
3. "top -u <username>": Same just as above. Difference is that you can instruct "top" directly to list only "<username>" processes/tasks while it starts running.
4. Highlight & Bold running process/task: Press "z" and/or "b" option in running top command will display running process in color and/or bold which may help you to identified running process easily.
5. Shows absolute path of processes/tasks: Press "c" option in running top command, it will display absolute path of running process/task.
6. Change Delay or Set "Screen Refresh Interval": By default screen refresh interval is 3.0 seconds, same could be changed by pressing "d" option in running top command.
7. Kill running process/task: You can kill a process by pressing "k" and then by supplying PID of the process which you want to kill & then an "Enter" button press. For Example: like in Windows - (Ctrl + Alt + Delete) => Task Manager => Choose Process/Task => End task.
8. Sorting the process list:
	"M" to sort by memory usage
	"P" to sort by CPU usage
	"N" to sort by process ID ie. PID
	"T" to sort by running time
When you press above characters, top displays all results in descending order. However, you can switch to ascending order by pressing "R". Again pressing "R" would bring back you in descending order again.
9. Renice a Process: We can use "r" option (after pressing r, in interactive mode it would tell you to provide process-id & nice-value) to change the priority of the process, also called Renice. Remember only superuser or root user can renice/change/reset nice value i.e. NI and hence PR value(i.e. actual priority) for a process. 
	Here we are changing priority of a running process, but if we want, we can set priority of a process while starting the process. 
	Example: Suppose an user wanted to compress a large file, but don't want to slow down other processes, then he might run the following command:
	nice -n 19 zip -r magento.zip Magento-CE-2.2.6_sample_data-2018-09-07-02-28-42
	sudo nice -n 19 zip -r magento.zip Magento-CE-2.2.6_sample_data-2018-09-07-02-28-42
10. Show only specific number of processes: Press "n" and then provide the number of processes/tasks you want to list only in interactive mode; Remember zero to show default no of processes.
11. Show all column names which could be displayed: While "top" is running, press small "f", it would show all available columns, here starred columns represent the columns whose are currently set as columns to show under "Task" area i.e. the lower-half area.
	a. Adding a new column: To do this, press "f" which will show you all available columns list, now navigate to the row which contains the column name which you want to add, for example navigate to "RUSER" and press space-bar to select the highlighted option. Once you hit space-bar, the highlighted option adds a star "*" before the column-name, that means it has been selected/set to show as column in task-area. To go back to the home screen of top, press "Esc". So now you can see, a new column with "RUSER" has appeared as the last column.
	b. Removing an existing column: Follow exactly the same steps as in just previous section (a). Just navigate to the column which you want to remove then press space-bar from your keyboard.
12. Save "top" command results: To save the running "top" command results output to a file top-output.txt, use following command:
	top -n 1 -b > top-output.txt
13. Filtering through processes: If you have a lot of processes to work with, a simple sort won't work well enough. In such a situation, you can use top's filtering to focus on a few processes. To activate this mode, press "o"/"O", a prompt appears inside top, and you can type a filter expression here as followings:
	COMMAND=top
	!COMMAND=top
	%CPU>0.0
	%CPU>3.0
You can add more and more filters one by one using the same process; here in this case, all previous filters would be preserved. To remove all filters, just press "=".
14. Forest view: Sometimes, we may want to see the child-parent hierarchy of processes. You can see this with the forest view, by pressing "v"/"V" while top is running. Again by pressing "v"/"V", you may return to default view again. I can tell from the screenshot forest-view-1.png & forest-view-2.png, the "systemd" process was the first one to start up on the system. It has started processes such as "sshd", which in turn has created other sshd processes, and so on.
15. Changing the default look of CPU and memory statistics: If you are mostly at home in a GUI environment, you might not like top's default way of showing CPU and memory statistics(default-view-top-home-screen.png). You can press "t" and "m" to change the style of CPU and memory statistics. If you press "t" or "m" repeatedly it cycles through two different types of progress bars(modified-view-top-home-screen.png). If you press the key for a third time, the progress bar is hidden. If you press the key again, it brings back the default.
16. Exit "top" command: Press "q" for the same. If it doesn't work, use "Ctrl + c" as last option.
