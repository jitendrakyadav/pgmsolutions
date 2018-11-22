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
		# To keep and track apache error log project-wise is more beneficial instead of keeping all applications/projects 
		# apache error log in a single file keep, so above apache error log path might keep as following:
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

/* ====================================================================================================================== */

/*** Linux Commands ***/

/*** Get help related to a linux command for ex. 'tail' ***/
man tail         /* manual 'tail' */
tail --help

/*** winpty ***/
1. winpty is a windows software package providing an interface similar to Unix/Linux for communicating with windows programs.
2. Case Study: In my window machine, i run command "mysql -u root -p" on MS-DOS, it works fine but when i run this on Git Bash, it doesn't work. Then i added "winpty" as prefix with this command like "winpty mysql -u root -p", it recognizes the "mysql" keyword and works fine.  

/*** Go to just previous directory in hierarchy ***/
cd ..

/*** Return to just previous directory where you were present in past ***/
cd -   /* i.e. "cd dash"; "dash" symbol => also referred as "hyphen" or "subtract" or "negative" or "minus" sign */

/*** Short command to move into their home directory ***/
"cd ~" or "cd"	/* Now you would find yourself in directory /home/jitendra for me as I had logined with username 'jitendra' */

/*** Create a directory and any parents(-p argument) that don't already exist. Following will create both directories i.e. trainingapp directory along with it's parent directory jitendray ***/
mkdir -p /var/www/html/jitendray/trainingapp
sudo mkdir -p /var/www/html/jitendray/trainingapp

/*** Listing files/folders ***/
ls      /* List files/folders (only files/folders name) of current directory */
ll      /* ll => an alias of "ls -l"; lists all files/folders (with -l => long-description like file/folder's owner-name, group-name, last updation date-time) of current directory */
ll -a   /* "ll -a" => an alias of "ls -la"; -a => all => This option is used to list hidden files/folders as well; it list all files/folders with it's long-description of current directory and hidden files/folders as well. */
ll /var/www/html/2018/test       /* Lists all files/folders of test directory */
ll -a /var/www/html/2018/test    /* Lists all files/folders of test directory including hidden files as well */
ll -at /var/www/html/2018/test   /* -t => sort by modification time, newest first */
ll myfile*			 /* It lists only those files/folders whose name starts with "myfile" having depth=1

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

/*** "wc" command: This command prints total no. of lines, words, byte counts for a file or files ***/
1. Help & Manual:
	wc --help
	man wc
2. Syntax:
	wc [OPTION] [FILE]	
3. Options:
	-l => prints the total no. of lines in file 
	-w => prints the total no. of words in file
	-c => prints the byte count
	-m => prints the character counts
	-L => prints the total no. of characters for longest line of the file
4. Example: wc myfile1.txt
   Output:   2   2  14 myfile1.txt	(i.e. total-no-of-lines total-no-of-words byte-count file-name)
   Example: wc *
   Output:   7  10  76 info.txt
	     2   2  14 myfile1.txt
	     8  19 104 myfile2.php
	     4   5  36 myfile3.txt
	    21  36 230 total
   Example: wc -l info.txt
   Output:  7 info.txt
   Example: wc -w info.txt
   Output:  10 info.txt
   Example: wc -c info.txt
   Output:  76 info.txt
   Example: wc -m info.txt
   Output:  76 info.txt
   Example: wc -L info.txt
   Output:  17 info.txt

/*** "grep" command: This command searches file/files to match a given pattern and prints the matching lines containing the pattern. ***/
1. Help & Manual:
	grep --help
	man grep
2. Syntax: 
	grep [OPTIONS] PATTERN FILE
	Remember: any string which you provide as PATTERN here, grep adds wildcard character * as prefix & suffix with search-string and then starts their command execution. Means for search-string "hi", grep would go for search with string "*hi*" instead of "hi". Wildcard character is a kind of placeholder, represented by a single character; it is often used in searches so that full-name need not be write there. In grep manual i.e. "man grep", we can see all wildcard characters with their functionality-explanation under section "Repetition".
3. Here PATTERN & FILE both might be some regular-expression to provide matching-string & file-names respectively.
4. FILE => *, means grep would search all files of current directory; and if "-r" option is also used along with this, grep would search recursively i.e. it would search all files as well as all folder, sub-folder's files present in current directory.
	Let's create a directory "grep" & 4 files info.txt, myfile1.txt, myfile2.php, myfile3.txt inside it with some content. Let's use these files to understand the grep commands/concept: 
	a. FILE => myfile1.txt like as following
		Example: grep "Hi" myfile3.txt
		Output: Hi Jitendra
		Example: grep "te.*dr" myfile3.txt
		Output: Hi Jitendra
		Example: grep "te.\+dr" myfile3.txt
		Output: Hi Jitendra
	i.e. grep prints only lines(not the name of file myfile3.txt) containing the PATTERN "Hi" in myfile3.txt.
	b. FILE => my* like as following
		Example: grep "Hi" my*
		Output: myfile2.php:Hi Ramesh
			myfile3.txt:Hi Jitendra
	If there presents only one pattern-matched file like myfile3.txt in current directory then output would be same as in just previous point (a) i.e. grep would print only lines containing the PATTERN "Hi", not the file name. In this case "-H" option could be effective.
	suppose there are 3 files like myfile1.txt, myfile2.php & myfile3.txt in current directory; now for same command, grep would print all lines containing the PATTERN "Hi" along with their file-names. 
5. Popular OPTIONS:
	i.   -i => ignore case
		Example: grep -i "Hi" *
		Output: info.txt:Hi Ajay
			myfile2.php:hiren and
			myfile2.php:hi vijay
			myfile2.php:Hi Ramesh
			myfile3.txt:Hi Jitendra
	ii.  -n => print line number with output lines of file
		Example: grep -in "Hi" my*
		Output: myfile2.php:2:hiren and
			myfile2.php:4:hi vijay
			myfile2.php:6:Hi Ramesh
			myfile3.txt:4:Hi Jitendra
	iii. -r => search recursively i.e. search all files as well as all folder, sub-folder's files present in current directory
	iv.  -w => match only whole words, not part of words; like "Hi" is a whole word, while "Himanshu" contains Hi as well but only as a part of a word, not as a whole word.
		Example: grep -iw "Hi" my*
		Output: myfile2.php:hi vijay
			myfile2.php:Hi Ramesh
			myfile3.txt:Hi Jitendra
		Note: As compared to previous point (i) Example, it excluded the match "hiren and" from myfile2.php
	v.   -c => print only count of matching lines per FILE.
		Example: grep -ic "Hi" my*
		Output: myfile1.txt:0
			myfile2.php:3
			myfile3.txt:1
	vi.  -m => stop after NUM (lines of) matches (not NUM no. of matches)
		Example: grep "a" myfile3.txti
		//Note here: 1st line has 1 match, 2nd line => 2 matches, 3rd line => 1 match, 4th line => 2 matches	
		Output: India
			Pakistan
			Hi Jitendra
			Srilanka
		Example: grep -m 3 "a" myfile3.txt
		Output: India
			Pakistan
			Hi Jitendra
	vii. -o => print only the part of a line matching PATTERN; like for command "grep Hi my*", PATTERN Hi would match from word "Himanshu", but print only Hi instead of showing the whole line containing the PATTERN "Hi". Remember, it prints all occurrences of match, even if suppose there are 3 occurrences in a single line then it would show/print all 3 occurrences of a sinle line in 3 separate lines i.e. per-occurrence per-line.
		Example: grep -io "Hi" my*
		Output: myfile2.php:hi
			myfile2.php:hi
			myfile2.php:Hi
			myfile3.txt:Hi
		Example: grep -o "a" info.txt
		Output: It would print 14 times "a" in 14 separate lines as following:
			a
			a
			a
			......same on 14 lines as info.txt has 14 occurrences of "a" in 7 total lines.
		Example: grep -o "a" info.txt | wc -l
		Output: 14
		Explanation: "|" symbol is used here to give/provide the result/output of first command to second command as input. First command produces 14 lines, each line with just a single character "a"; it works as a file-input to second command which counts the total no. of lines in dynamic inputted file and print the same. Actually, both commands collectively work and provide the total no. of occurrences(not just no. of lines having occurrences) of a PATTERN in a file/files.
	viii.-l => print only name of FILEs containing matches, not the lines having the matches
		Example: grep -il "Hi" my*
		Output: myfile2.php
			myfile3.txt
	ix.  -L => print only name of FILEs, containing no matches
		Example: grep -iL "Hi" my*
		Output: myfile1.txt
	x.   -A NUM => prints NUM lines after matching line
		Example: grep -A 2 "Hi" myfile2.php
		Output: Hi Ramesh
			It's a rainy day.
			Weather is very pleasant.
		Example: grep -A 2 "Cybage" -i myfile2.php
		Output: cybage
			hi vijay
			kalyani nagar
	xi.  -B NUM => prints NUM lines before matching line
		Example: grep -B 2 "Hi" myfile2.php
		Output: hi vijay
			kalyani nagar
			Hi Ramesh
	xii. -C NUM => prints NUM lines before & after matching line
		Example: grep -C 2 "Hi" myfile2.php
		Output: hi vijay
			kalyani nagar
			Hi Ramesh
			It's a rainy day.
			Weather is very pleasant.
	xiii.-H => print file-name always even if there is file-name mentioned in command
		Example: grep -H "Hi" myfile3.txt
		Output: myfile3.txt:Hi Jitendra
	xiv. -v => invert-match i.e. select non-matching lines
		Example: grep "hi" myfile2.php
		Output: hiren and
			hi vijay
		Example: grep -v "hi" myfile2.php
		Output: mere gaon
			cybage
			kalyani nagar
			Hi Ramesh
			It's a rainy day.
			Weather is very pleasant.

/*** Run/Execute a php file from CLI ***/
php test.php
/d/xampp/php/php.exe test.php	/* In Windows OS, if environment variable is not set. To set environment variable for PHP look into branch php_concepts_and_programming at Page No. 133 */

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

/*** Get all groups of a user ***/
groups <username>     /* first word after : is your primary group */

/*** Get all users of a group ***/
grep -in "<group-name>" /etc/group	/* Here you can see <group-name> & then it's all users with comma separated */     

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

/*** Create a new group in Linux ***/
groupadd <group-name>	/* For manual: "man groupadd", For help: "groupadd --help" */
groupadd mygroup
sudo groupadd mygroup
/* Verify whether group "mygroup" created or not */
cat /etc/group		/* This is the file where all groups are recorded; check here, newly created group is present or not */

/*** Delete group in Linux ***/
groupdel <group-name>	/* For manual: "man groupdel", For help: "groupdel --help" */
groupdel mygroup
sudo groupdel mygroup

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
/*** 
Permissions in Linux 
Reference: 1. https://www.geeksforgeeks.org/permissions-in-linux/	(Permissions in Linux)
	   2. https://youtu.be/Uw6ZWG20wGU 				(Explain File Permissions in Linux)
***/
Linux is a multi-user operating system, so it has security to prevent people from accessing each other’s confidential files.
When we use command "ll" or "ls -l", we get file/directory listing in following descriptive/detail/long format:
-rw-rw-r-- 1 jitendray jitendray   36 Nov  5 14:23 myfile3.txt

1. 1st column: -rw-rw-r--
	a. The first character might be as following:
		"-" => it's a regular file
		"d" => it's a directory
		"l" => it's a soft-link/symbolic-link/symlink
	b. Understanding the security permissions: Let's think about the next 9 characters i.e. 3 sets of 3 characters (see below). Each of the 3 "rwx" characters refers to a different operation we can perform on the file.
		---     ---     ---
		rwx     rwx     rwx
		owner   group   others
		
		i.   "Read, write, execute and –": These are permission types, used in linux.
			"r" => means user can "read" the file’s content
			"w" => means user can write/modify the file's content
			"x" => means user can "execute" the file. This permission is given only if the file is a program.
			If any of the "rwx" characters is replaced by a "-", this means, that permission has been revoked/dismissed. "rwx" indicates => full permission; "---" indicates => fully denied
		Case Study: On a file test.php, i did many kind of permission changes and observed followings:
			"--x" => If you haven't read permission, It is useless. As without read permission, you can't execute a php file.
			"-w-" => If you haven't read permission, It is useless. As without read permission, you can't change/modify a php file.
			"-wx" => If you haven't read permission, both write & execute permissions are useless. As without read permission, you can't change/modify as well as execute the php file.
			"r-x" => You can read content of the PHP file & execute the same but can't change/modify it's content.
			"rw-" => You can read content of the PHP file & change/modify the same obviously. But surprisingly, i was able to execute as well the PHP file although i haven't access for it. I don't know what is the reason behind it, might be due to read permission; but it is shocking fact for me & still i am searching reason of it.
			"r--" => You can read content of the PHP file but can't change/modify the same obviously. But surprisingly, i was able to execute the PHP file although i haven't access for it. I don't know what is the reason behind it, might be due to read permission; but it is shocking fact for me & still i am searching reason of it.
		Case Study for a directory: Permission for a directory is applied only on that directory, not on the files/folders already present/exist inside that directory, as already present files/folders inside the directory obey their own permissions alloted to them. Here "r" is used for listing the directory, "w" for creating new file/folder inside the directory and "x" for entering to the directory. 
			--- => means fully denied i.e. you can't list directory like using "ls -l" & can't enter to directory like using "cd <directory-name>" as well as you can't create new file/directory inside the directory. 
			r-- => means you can list the directory partially i.e. using "ls -l", you can see only file/folder names inside it, not other informations related to these files/folders like file-size, permission, owner/group, etc. and neither you can't enter to directory like using "cd <directory-name>" nor create new file/directory inside the directory like using "touch <directory-name>/<new-file-name>", "mkdir <directory-name>/<new-directory-name>". 
			--x => you can enter to the directory but you can't list the directory & you can't create new file/directory inside the directory.
			-w- => useless without execute permission & equivalent to --- i.e. you can't list the directory, you can't enter to the directory as well as you can't create any new file/folder inside the directory. 
			-wx => you can't list the directory i.e. you can't know how many and which files/folders exist inside the directory, but you can enter to directory & create new file/directory as well inside the directory.
			rw- => useless without execute permission and equivalent to r-- i.e. still you can only partially list the directory but can't enter to the directory & can't create new file/directory inside the directory.
			r-x => means you can list the directory like using "ls -l" and enter to directory as well like using "cd <directory-name>". But you can't create new file/directory inside the directory.
			rwx => means full permission i.e. you can list, enter to directory & create new file/directory inside the directory as well.
		ii.  "Owner, group and others": For permission distribution, linux caregorises users in these 3 types.
			"owner"  => owner permissions apply only to the owner of the file/directory
			"group"  => group permissions apply only to the group(i.e. on the users which are in that group) that has been assigned for that particular file/directory 
			"others" => others permissions apply to all other users on the system i.e. all those users of linux server/computer/machine/operating-system which are neither owner nor in the group of file/directory.
			Remember, all the above three permissions i.e. "owner", "group" & "others", never interfere to one another and works separately/independently without affecting to one another. Both "www-data" and "root" are pre-existing user & group as well and used by web servers like Apache, Nginx, etc. in Ubuntu by default for their normal operations. So system-administrator should not use these pre-existing users & groups for their newly-created files or applications and should not allow any newly created user as well to use these pre-existing users and group (which are reserved for some web-server level files & for their operations); if needed, system-administrator should create new group & user to fulfil their requirement.
		iii. Reading the security permissions: Let's observe the above myfile3.txt long description.
			For example, consider that the owner's permissions for some files is "rw-" as the first three characters. This means that the owner of the file i.e. "jitendray" can "read" it(look at its contents) and "write" it(modify its contents) but can't execute it because it is not a program; it is a text file.
			If "r-x" is the second set of 3 characters, it means that the members/users of the group "jitendray" can only read and execute the files.
			The final three characters show the permissions allowed to anyone who has a UserID on this Linux system which is neither the owner nor present in the group of that file/directory. Let's assume we have the permission like "r--". This means other users of our Linux system would be able to read the contents of file but neither able to modify the contents of file nor execute it.
		iv.  Changing security permissions: 
			File Mode	Octal or Numeric
			---		0
			--x		1
			-w-		2
			-wx		3
			r--		4
			r-x		5
			rw-		6
			rwx		7
			
			From above list, you could easily know that, for:
			read only 		=> octal value is 4	
			write only 		=> octal value is 2
			execute only 		=> octal value is 1
			read & write only	=> sum of read & write octal values i.e. 4+2=6
			read & execute only	=> sum of read & execute octal values i.e. 4+1=5
			write & execute only	=> sum of write & execute octal values i.e. 2+1=3
			read, write & execute	=> sum of read, write & execute octal values i.e. 4+2+1=7
		
		Example: Suppose for a file xyz.php, you want to change permission for owner => rwx => i.e. octal value 7, group => rw- i.e. octal value 6, others => r-- i.e. octal value 4; so you would need to run following command:
			chmod 764 xyz.php
		Suppose for the same file, you want to change permission for owner => rwx => i.e. octal value 7, group => rwx i.e. octal value 7, others => rwx i.e. octal value 7; means you want to give full permission for file xyz.php, so you would need to run following command:
			chmod 777 xyz.php
		Example: Change permission of a directory
			chmod -R 777 /var/www/html/2018/magento2/public_html/var
			chmod -Rf 777 /var/www/html/2018/magento2/public_html/pub	/* R for recursively, f for forcefully */
		v.   Precendence of permissions: 
			Descending order of precedence: owner, group, others. 
			This means if you login to a linux system(i.e. operating-system) and for a file/directory you are owner as well as you are also a member/user of group of that file/directory then due to higher precendence of "owner" permission, owner-permission would be applicable/effective for you in this case, never group permission. Suppose for this file/directory, you are not owner but you are a member/user of group of this file/directory then due to higher precendence of "group" permission, group-permission would be applicable/effective for you rather than "others" permission for this file/directory. Suppose for this file/directory, you are neither owner nor a member/user of group of this file/directory then the lowest precedence i.e. "others" permission would be applicable/effective for you.
2. 2nd column: 1
	Reference: 1. https://youtu.be/Eduo7WsJp20	(Hard link Vs Soft link Part-1)	
		   2. https://youtu.be/OVZMlOT6L-4	(Hard link Vs Soft link Part-2)	  
	Type example: type_example.png
	
	a. Hard Link: Creating a hard link has the effect of giving one file multiple-names (multiple-names might be in different directories with different names) all of which independently connect to the same data on the disk, none of which depends on any of the others. If the file is opened by any one of its names, and changes are made to its content, then these changes will also be visible when the file is opened by an alternative name.
	Example(creating hard link): ln main.txt main_hard_link.txt
	ln => command to create the link; main.txt => the actual-file name with it's path for which you want to create hard-link; main_hard_link.txt => hard-link name with it's path
	Run command "ll -i"	
	(Here, -i => to show inode ID column as well. Remember, each file and directory in Linux has a unique inode ID alloted them from inode table; in following directory listing, 1st column shows inode IDs.)
	790823 -rw-rw-r-- 3 jitendra jitendra    8 Nov 11 17:49 main_hard_link2.txt
	790823 -rw-rw-r-- 3 jitendra jitendra    8 Nov 11 17:49 main_hard_link.txt
	790823 -rw-rw-r-- 3 jitendra jitendra    8 Nov 11 17:49 main.txt	
	Important points:
		1. You can create as many hard-link for a file as you want.
		2. Suppose there are a file and it's 2 hard-links then to delete any one of the 3 would not affect the others 2 i.e. they would remain un-changed/un-deleted.  
		3. Modification in any one of 3, would reflect in others 2 as well. Like if you change permission or owner or content of main_hard_link.txt then the exactly same permission or owner or content(hence last-modified-date-time) changes would be reflected in other two files main.txt & main_hard_link2.txt as well. 
			A. I have changed permission for main_hard_link.txt from 664 to 666 & got same permission changes occured automatically for others 2 as well, as following.
				790823 -rw-rw-rw- 3 jitendra jitendra    8 Nov 11 17:49 main_hard_link2.txt
        			790823 -rw-rw-rw- 3 jitendra jitendra    8 Nov 11 17:49 main_hard_link.txt
        			790823 -rw-rw-rw- 3 jitendra jitendra    8 Nov 11 17:49 main.txt
			B. I have changed owner/group for main_hard_link.txt from jitendra:jitendra to jitendra:priyanka & got same owner/group changes occured automatically for others 2 as well, as following.  
				790823 -rw-rw-r-- 3 jitendra priyanka    8 Nov 11 17:49 main_hard_link2.txt
        			790823 -rw-rw-r-- 3 jitendra priyanka    8 Nov 11 17:49 main_hard_link.txt
        			790823 -rw-rw-r-- 3 jitendra priyanka    8 Nov 11 17:49 main.txt
			C. I have added content "Hi" in a new-line for main_hard_link.txt & this time got same updated content, same new file size 11 Byte and new updated date-time "Nov 19 19:57" automatically for others 2 as well, as following.  
				790823 -rw-rw-r-- 3 jitendra jitendra    11 Nov 19 19:57 main_hard_link2.txt
        			790823 -rw-rw-r-- 3 jitendra jitendra    11 Nov 19 19:57 main_hard_link.txt
        			790823 -rw-rw-r-- 3 jitendra jitendra    11 Nov 19 19:57 main.txt 
		4. All 3 would have same inode ID, same hard-link count, same permission, same owner/group & even same last modified date-time. 
	Usage/Benefit: We can create backup of any file/files of our application/project by creating hard-link of them on server at some secure place. 

	b. Soft Link or Symbolic Link or Symlink (or Shortcut): It's a symbolic copy(not actual) of a file. So when you modify the symlink, in actual you have been modifying the actual/main file for which this symlink has been created. After modification, if you run command "ll", you can easily see that last-modified-time for actual/main file has been changed, but remains unchanged for symlink.
	Example(creating symlink): ln -s main.txt main_soft_link.txt
	ln => command to create the link; -s => option to create soft-link; main.txt => the actual-file name with it's path for which you want to create symlink; main_soft_link.txt => symlink name with it's path
	Run command "ll -i"	
	(Here, -i => to show inode ID column as well. Remember, each file and directory in Linux has a unique inode ID alloted them from inode table; in following directory listing, 1st column shows inode IDs.)
	788572 lrwxrwxrwx 1 jitendra jitendra    8 Nov 11 17:41 main_soft_link.txt -> main.txt
	790823 -rw-rw-r-- 2 jitendra jitendra   34 Nov 11 17:40 main.txt	
	Important points:
		1. You can create as many symlink for a file as you want.
		2. Deleting symlinks would not affect actual/main file.
		3. Deleting actual/main file would make useless it's symlinks i.e. try to access content of symlinks(like "cat main_soft_link.txt") then, would produce "No such file or directory" error. But if you re-create the actual/main file with the same name, symlinks started working again.
		4. The actual/main file and it's all symlinks have different inode IDs.
	Usages/Benefit: 
		1. We can keep some important files in a single directory anywhere on server at some secure place and could create symlinks for those files in our application's various directories wherever they needed. 
		2. To make link for files, we use "ln" command; to copy files we use "cp" command. The main advantage on symlink is access permission. If you want to change permission or owner or content of all symlinks of a file main.txt (as from above listed files main.txt & main_soft_link.txt) just change permission or owner or content of original file main.txt, all it's symlinks would be changed automatically. On the other hand with copies, you will have to find all the copies first and then change permission or owner or content one by one.
		3. Here, even if you change permission or owner or content of main_soft_link.txt; after execute "ll" command to see modified files list, you can see the permission or owner or last-modified-time(due to content changes) of main file main.txt has been changed while main_soft_link.txt looks exactly same either permission 777 or owner or last-modified-time. 
		4. Symlink provides ease of management and saves disk space.
	
	For a file => This number is the hardlink count of the file. 
	When a new file created, by default it shows it's hard-link count=1 as it is, in fact, itself works as link for the actual file (like in Linux GUI, when you make double-click on file-symbol, it opens the actual file for you). 	

	For a directory => This number is actually the number of directory entries for that directory.
	Historically, the first Unix filesystem, created two entries in every directory: . pointing to the directory itself, and .. pointing to its parent(use command "ll -a" or "ls -la" to see these entries). This provided an easy way to travel across the filesystem, both for applications and for the OS itself.
	Thus each directory has a link count of 2+n where n is the number of subdirectories. The links are the entry for that directory in its parent(in Linux GUI when you see a "directory" symbol & make double click on it you have benn brought to inside this directory, that means, it's also a entry-point for the directory), the directory's own . entry, and the .. entry in each subdirectory(actually the entry .. inside the sub-directory of a directory points to the directory).
	Example: Following is the content of the subtree rooted at /parent, all directories:
	/parent
	/parent/dir
	/parent/dir/sub1
	/parent/dir/sub2
	/parent/dir/sub3	
	Then directory "dir" has a link count of 5: the dir entry in /parent (i.e. /parent/dir), the . entry in /parent/dir, and the three .. entries in each of /parent/dir/sub1, /parent/dir/sub2 and /parent/dir/sub3. Since /parent/dir/sub1 has no sub-directory, it's link count is 2 (the sub1 entry in /parent/dir and the . entry in /parent/dir/sub1).
	Remember, for directory "sub1", "dir" is the current directory and "parent" is the parent directory.
	The root directory, which doesn't have a "proper" parent or no parent, the root directory contains a .. entry pointing to itself. This way it, too, has a link count of 2 plus the number of subdirectories, the 2 being "." and "..".
	Later filesystems have started to keep track of parent directories in memory and usually don't need . and .. to exist. Most filesystems still report a link count of 2+n for directories regardless of whether . and .. entries exist, but there are exceptions, for example Btrfs filesystem doesn't do this.
	
3. 3rd column: jitendray
	It shows owner(i.e. a kind of user) of the file. In this case, owner's userID is "jitendray".
4. 4th column: jitendray
	It shows group(containing some users) assigned for the file/directory.
5. 5th column: 36
	It shows size of the file in bytes.
6. 6th column: Nov  5 14:23
	It shows the date and time the file was last modified.
7. 7th column: myfile3.txt
	It shows, of course, the filename. 
/* ---------------------------------------------------------------------------------------------------------------------- */

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

/*** "cat" command: Concatenate files and print the combined content of file/files as output ***/
1. Help & Manual:
	cat --help
	man cat
2. Syntax:
	cat [OPTION] [FILE]
3. Examples (use grep-directory files):
	a. cat myfile1.txt	//Display whole content of myfile1.txt
	Output:
		ramesh
                suresh
	b. cat -n myfile1.txt delimiter.txt info.txt		
	Output: //Display combined content of myfile1.txt, delimiter.txt, info.txt with -n => --number => number all output lines
		1  ramesh
     		2  suresh
     		3  -----------------------------------------------------------------------------------------
     		4  radheshyam tiwari
     		5  Madhya Pradesh
     		6  Bihar
     		7  Uttaranchal
     		8  Chattishgarh
     		9  Hi Ajay
    	       10  Goa		

/*** To know about OS on machine ***/
cat /etc/os-release

/*** "echo" command: Display a line of text. Use command "man echo" to know more about this Linux command ***/
> xyz.txt
//This command inputs blank content to file xyz.txt or in other word it removes/deletes the whole content of xyz.txt
echo "Hi, Good Morning!" > xyz.txt
//This command removes the whole content of xyz.txt and inputs/add string "Hi, Good Morning!" to file xyz.txt at it's first line
echo "Hi, Good Morning!" >> xyz.txt
//This command preserves the whole content of xyz.txt and add the string "Hi, Good Morning!" to xyz.txt at it's last line

/*** "diff" command: Compare files line by line ***/
I have created a directory "diff" with some files within it to understand the diff command/concept.
1. Help & Manual:
        diff --help
        man diff
2. Syntax:
        diff [OPTION] FILES
3. Important OPTIONs: Remember, if same line no. of 2 files has "|" symbol between them while comparing 2 files side by side, it means that particular line in both files, are not identical.
	-y => output in two columns side-by-side	
	-i => ignore case differences in file contents
	-b => ignore changes in the amount of white space	
	/* Suppose there is already 1 space between 2 words and now it becomes 2 or 3 i.e. more than 1 or suppose there is already 4 spaces between 2 words and now it remains 1 space; then -b ignores these changes. */
	Example: diff -iby f1.txt spaceChangesOnlyWithf1.txt 
	-w => ignore all white space
	/* It ignores as in option "-b" as well as the spaces newly emerged between 2 characters or any other space changes */
	Example: diff -iwy f1.txt spaceChangesOnlyWithf1.txt
	-s => report when two files are identical/same
	Example: diff -iys f1.txt identicaltof1.txt

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

/* ---------------------------------------------------------------------------------------------------------------------- */
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
/* ---------------------------------------------------------------------------------------------------------------------- */

/*** Difference between Unix and Linux ***/
Unix: 
1. It's much older operating-system.
2. It's paid. 
3. Now a days, based on Unix, Mac OS is the most using operating-system.
Linux: 
1. Originally Unix was copied/cloned and then customized/developed some different features and functionalities to form a new operating-system that could be free; later this operating-system was called/named Linux. 
2. So, we might say that Linux is a Unix like operating-system and that's why there is much similarities between the two operating-systems in form of commands, features, etc.
3. It's an open-source i.e. free; only some special versions are paid but still lesser price than windows-os license. 
4. It is true that now a days, Linux is more popular and widely used rather than Unix. Ubuntu, CentOS, Fedora, Android etc. are some examples of operating-system based on Linux.
5. Reference:
	a. Look on field "OS family" at right-side section on Linux wikipedia page: https://en.wikipedia.org/wiki/Linux
	b. https://youtu.be/pETr6ix5rZ0	(Linux history, how it came into existence & it's historical connection with Unix)
	c. https://youtu.be/q-1lD8ypgZM	(Differences between Unix & Linux)
