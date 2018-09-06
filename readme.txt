/*** Composer:https://getcomposer.org ***/
1. Composer is a dependency manager or package manager in PHP that provides a standard format(composer.json) for managing dependencies of PHP software and required libraries.
2. Composer runs through the command line and installs dependencies (e.g. libraries) for an application.
3. It also provides autoload capabilities for libraries that makes usage of third-party code easy.
4. It also allows users to install PHP applications that are available on Packagist which is its main repository containing available packages.
5. Composer uses their commands with reference for Packagist:https://packagist.org/.
6. Packagist: It is the main repository for Composer which contains available packages to serve Composer.
7. Actually/In-fact all project/package/library files are physically resides on GitHub and Packagist only keeps short-information/references-of-github about these project/package/library requested by Composer.
8. When Composer fires any command, It hits to Packagist and then Packagist uses their reference-of-github and let Composer pull all physical files from GitHub. That means, when Composer fires command and expecting project/package/library from Packagist, Packagist does not give any project/package/library to Composer in return but It gives reference-of-github and tell Composer to download all those from github.
9. composer.json: Composer is a dependency manager for PHP. Composer allows developers to specify project dependencies in a composer.json file and then Composer automatically handles the rest(means Composer downloads all package/library as per mentioned in composer.json through packagist and which in turn uses github for their purpose).

/*** Composer commands ***/
1. composer
/* Show usage, options and all available commands */

2. composer --help <command-name>
   composer --help list

3. composer require <package-name> [package-version]
   composer require symfony/process
   composer require symfony/process v3.4
   composer require symfony/process 3.4
   composer require symfony/process 3.4.*
/*
Here v3.4 or 3.4 are same. 
Don't use package-version, then composer installs max/highest suitable/possible version according to your environment.
package-version is optional.
Fired this command in a blank(projects's root) directory & observed following points:

It will download and install package "symfony/process" for you:
a. Creates composer.json & composer.lock files. Both files are always created/updated when a new package is installed(like "composer require symfony/process" as above).
b. Creates a vendor directory
c. Creates a directory vendor/symfony (i.e. vendor name)
d. Download vendor/symfony/process package (i.e. vendor symfony's package)
e. Creates vendor/composer directory having various autoload files like autoload_psr4.php, autoload_namespaces.php, autoload_classmap.php, etc. All these files present in composer directory, are always created/updated when a new package is installed(like "composer require symfony/process" as above). 
f. Creates vendor/autoload.php: For all dependencies(libraries) downloaded through composer in vendor directory, composer creates a file vendor/autoload.php in last(autoload.php, everytime created/updated, when a new package is installed); By including this single file in your code, you can use all composer-downloaded-library-classes present in vendor as following:
require vendor/autoload.php;

use Symfony\Component\Process\Pipes\UnixPipes;  
	i. Actually, these namespaces are mapped to exact source-file going to use, in vendor/composer/autoload_psr4.php and other autoload-files present in same directory as this file. autoload_psr4.php is updated with reference from newly installed package > composer.json > "autoload" section > "psr-4" sub-section.
	ii.Now you can access/create UnixPipes object by writing simply "new UnixPipes($x, $y,..)" as usual.
g. For any composer's package, you may get the full information from packagist.org. Just search in header search-box the package name like "psr/log" and you can get information about it like: installation-command, it's source on github i.e. github-url, what requires for it's installation, what it's purpose, etc.
h. Second way to get information about a composer's package(as above) is, just type a command on your terminal "composer show --all psr/log". This pulls information about "psr/log" from Packagist and display on your terminal.
i. Remember: "psr/log" is composer's package name only. This does not ensures you that you can get the package on github at url https://github.com/psr/log. composer's package may not be at github and if it is on github then source-url might be different. As in case of "psr/log", it's source-url is https://github.com/php-fig/log.git.

/* In-short, what happens when composer installs any package like above "composer require symfony/process" */
a. Package downloads in vendor directory having a directory with package's vendor name like for "symfony/process" in vendor/symfony/process directory.
b. Composer updates all autoload files present in vendor/composer directory.
c. Composer updates both composer.json & composer.lock files present in project's root-directory.
d. In last, composer updates vendor/autoload.php.
*/

4. composer search <keyword-you-want-to-search>
   composer search log
/* Composer lists all packages available on packagist.org for mentioned-keyword */

5. composer show --all <package-name>
   composer show --all psr/log
/* Composer shows all information about package like name, description, version, source on github i.e. github-url if hosted on github, etc. the same we can get on packagist.org by searching the package with it's name */

6. composer install
/* 
This command reads the composer.lock file from the current directory, processes it, and downloads and installs all the libraries and dependencies outlined in that file. If the file does not exist it will look for composer.json and do the same(i.e. reads composer.json file & do the installation process); in this process, in last, it also creates composer.lock file using composer.json file so that next-time "install" command can use composer.lock instead of composer.json. 
   Case Study:
   	a. create a blank directory with name "test".
	b. Go to test directory and create composer.json file with content:
	{
    		"require": {
        	"psr/log": "^1.0"
    		}
	}
	c. Use command "composer install"
	d. What happened: 
		i. Composer looks for composer.lock file, but finds that it is missing, so it reads composer.json file and starts their installation process.
		ii. Composer creates "vendor" directory, then package's vendor directory inside vendor i.e. "psr" and then download the package inside it. Means created directory structure is vendor/psr/log.
		iii. Composer creates vendor/composer directory and put all autoloading files inside it.
		iv. Composer create vendor/autoload.php file(including which any php file can use downloaded library classes, just by mentioning corresponding classes-namespace in php file)
		v. In-last, Composer creates composer.lock file using composer.json so that next-time "install" command can use composer.lock instead of composer.json.
*/

7. composer update [package-name] [package-name] [package-name].. 
   composer update symfony/process
/* 
package-name is optional. 
This command reads the composer.json file from the current directory, processes it, and updates, removes or installs all the dependencies. 
   Case Study:
   	a. create a blank directory with name "test".
	b. Go to test directory and create composer.json file with content:
	{
    		"require": {
        	"psr/log": "^1.0"
    		}
	}
	c. Use command "composer update"
	d. If nothing is present to update then what happened: This command behaves like "composer install" and done all those things which "composer install" command do i.e. explained in 6(d) as above.
	e. Deleted manually "composer.lock" file.
	f. Use again command "composer update".
	g. Now what happens where all dependencies are already downloaded just few minutes ago & there is nothing remains to do with this command: This command tries to do update all dependencies/previously-downloaded-packages but all are updated already then it finds "composer.lock" file is missing so it re-creates the same using composer.json file.

If possible, don't update composer.json file at your own to install/remove a package, use "composer require" and "composer remove" command for the same and let composer modify composer.json and other related files.

/* Difference between "composer update" & "composer install" */
composer update:
	"composer update" will update your depencencies as they are specified in composer.json
	For example, if you require this package as a dependency:
	"mockery/mockery": "0.9.*",
	and you have actually installed the 0.9.1 version of the package, running composer update will cause an upgrade of this package (for example to 0.9.2, if it's already been released)
	in detail composer update will:
		i. Read composer.json
		ii.Remove installed packages that are no more required in composer.json
		iii.Check the availability of the latest versions of your required packages
		iv.Install the latest versions of your packages
		v. Update composer.lock to store the installed packages version

composer install:
	"composer install" will not update anything; it will just install all the dependencies as specified in the  composer.lock file.
	In detail:
		i. Check if composer.lock file exists (if not, use composer.json to start their process of installation)
		ii.Install the packages specified in the composer.json file
		iii.Creates composer.lock file using composer.json so that next-time "install" command can use composer.lock instead of composer.json. Example: https://github.com/magento/magento2 contains already composer.lock(and obviously composer.json), so after "git clone" when you use "composer install", Composer would use composer.lock to install all dependencies here.  

When to install and when to update:
	a. "composer update" is mostly used in the 'development phase', to upgrade our project packages according to what we have specified in the composer.json file.
	b. "composer install" is primarily used in the 'deployment phase' to install our application on a production server or on a testing environment, using the same dependencies stored in the composer.lock file created by "composer update".
*/

8. composer remove <package-name>
   composer remove symfony/process
/* Removes the package directory under vendor directory, updates - all autoload files under vendor/composer directory, composer.json & composer.lock files under root directory, autoload.php file under vendor directory. If a package is installed, removed and then again go for installation the same package then composer uses it's cache to install(means it does not download again from packagist.org i.e. github or any-other-package-hosting-site) */

9. composer clear-cache
/* Composer removes their local machine cache from where all these commands are fired. When you install any package, composer downloads it and stores the same in their cache after installation completes for further use. If you removed the package and want to install the same again, this time, composer would not download, but install the package from their cache. */

10. composer create-project <package-name> <directory-path-in-which-you-want-to-install> [version]
/* 
a. This command creates a new project from a given package into a new directory. In other words, It does 2 things - first, downloads your repository and second it installs all dependencies using composer.lock file on same time. Means just fire this command and then start set-up it's db and others by firing URL like http://localhost/magento2 in your browser as usual.
b. We can use this command to bootstrap/create new projects or setup a clean version-controlled installation for developers of our project.
c. We can also specify the version with the package name using = or : as separator.
   composer create-project vendor/project:version target-directory   
   /** Reference of information: "composer --help create-project" command **/
d. This command is combindly equivalent to following 6 commands(if you are doing your set-up using any private repository like client's github private repository, need not to use steps iii, iv, and v. But if you are doing your set-up using any public-repository like magento/community-edition i.e. also available on packagist.org then follow all steps from i to vi):
	i. Suppose a package is not published on packagist.org(for ex: client private github repository/package/project): To setup the project at our local machine, firstly we will use "git clone" command.
	ii. "git checkout" to reach to our required version at our local machine.
	iii. delete ".git" directory as we have achieved all files/directories for required version.
	iv. use "git init"
	v. use "git remote add origin" to connect to our fresh github remote repository URL.
	vi. use "composer install" while you are in project's root directory, to install all dependencies/packages.
*/
    composer create-project magento/community-edition magento2
/* magento/community-edition is the package name available on packagist.org for magento 2 & for onward versions(from packagist.org, we can see the source-url i.e. github url for the same, it is: https://github.com/magento/magento2), magento2 is the directory-name in which you want to install, version-no.-not-provided-here: in my opinion, actually a good practise, then composer downloads the highest-version of the package for which your environment is elligible. */
    composer create-project laravel/laravel laravel
/* laravel/laravel is the package name available on packagist.org for laravel(from packagist.org, we can see the source-url i.e. github url for the same, it is: https://github.com/laravel/laravel), laravel is the directory-name in which you want to install, version-no.-not-provided-here: in my opinion, actually a good practise, then composer downloads the highest-version of the package for which your environment is elligible. */

11. composer self-update
    composer self-update [options] [--] [<version>]  
/* In more detail, optionally you can supply the version to update to. "composer self-update" command checks getcomposer.org for newer versions of composer and if found, installs the latest. */

12. composer dump-autoload -o
    composer dump-autoload [options]
/*
This command dumps(i.e. creates & stores) autoload file in vendor directory. Use this command always when you have added any new class or interface or trait, to make entries of these class/interface/trait to vendor/composer/autoload_classmap.php & in other files of same directory to enjoy composer's autoloading functionality.
-o => optimized (Optimizes PSR0 and PSR4 packages to be loaded with classmaps too, good for production.)
What it does exactly: This command looks into composer.json > "autoload" object of composer.json > "classmap" section and checks:
a. whether any new class-or-interface-or-traits-containing directory has been added, if yes, then makes maps of classname-to-it's-file-with-it's-full-path in vendor/composer/autoload_classmap.php and might be modify all other files present in same directory as well, for all those files whose directory mentioned under "classmap" section in composer.json.
2. whether any new class-or-interface-or-trait containing file has been added for already mentioned directories under "classmap" section in composer.json, if yes, then makes map-of-classname-to-it's-file-with-it's-full-path in vendor/composer/autoload_classmap.php and might be modify all other files present in same directory as well.
Now just add vendor/autoload.php in your newly created php file present in project's root folder and enjoy of composer's autoloading functionality by accessing all classes or interfaces or traits of all directories mentioned under "classmap" section in composer.json as following:
require_once 'vendor/autoload.php';

$obj = new XYZ();

Cae Study: 
	a. Go to inside a blank directory i.e. project's root directory
	b. create a file with directories app/models/User.php with content:
		class User
		{
    			public function __construct()
    			{
        			echo "I am inside app/models/User.php";
    			}
		}
	c. create a file app/start.php with content:
		require_once 'models/User.php';
	d. create index.php in root directory with content:
		require 'app/start.php';

		$userObj = new User();
	e. Run command "php index.php"
	f. Got output as we were expecting i.e.: I am inside app/models/User.php
	g. In older days, this coding style was ok but now a days, It would be funny to make coding like this. Now it's time to use composer's autoloading which everyone uses in present time for the same.
	h. create a file composer.json in root directory with content:
		{
    			"autoload": {
				"classmap": [
					"app/models"
				]			    
    			}
		}
	i. Fire command "composer self-update" and then "composer dump-autoload -o"
	j. It creates vendor directory, vendor/composer directory & many autoload files inside it like autoload_classmap.php having some part of content like:
		return array(
    			'User' => $baseDir . '/app/models/User.php'
    		);
	k. It also creates one more file i.e. vendor/autoload.php
	l. Modify start.php with following content:
		require_once __DIR__.'/../vendor/autoload.php';
	m. Run command "php index.php" again
	n. Got same outout as previously i.e.: I am inside app/models/User.php
	o. Create another file app/models/Employee.php with content:
		class Employee
		{
    			public function __construct()
    			{
        			echo "\nI am inside app/models/Employee.php";
    			}
		}
	p. Modify index.php with following content:
		require 'app/start.php';

		$userObj = new User();
		$employeeObj = new Employee();
	q. Run command "php index.php" and got fatal error "Employee class not found"
	r. Run command "composer dump-autoload -o"  (what it does: It modify vendor/composer/autoload_classmap.php file to add 1 more line there as following:
		return array(
    			'User' => $baseDir . '/app/models/User.php',
			'Employee' => $baseDir . '/app/models/Employee.php'
    		);
	   It also obviously modifies all other files in same directory and vendor/autoload.php as well.
	   It does this so that this class-map-files mentioned in vendor/composer/autoload_classmap.php could be got through vendor/autoload.php, included in start.php to get self-included both files i.e. app/models/User.php & app/models/Employee.php only by writing the statement "require_once __DIR__.'/../vendor/autoload.php';" only.)
	s. Run command "php index.php" again
	t. Got the expected output i.e.:
		I am inside app/models/User.php
		I am inside app/models/Employee.php

	Remember here: composer.lock file is created/re-created when there presents object "require" or "require-dev" in composer.json. So here, composer.lock file is not created automatically.	
*/

/*** Publish a package to Packagist ***/


/*** composer.json ***/
https://getcomposer.org/ > Documentation > The composer.json Schema

