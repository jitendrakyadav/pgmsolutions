/*** Composer:https://getcomposer.org [Cheat-Sheet: https://composer.json.jolicode.com/] ***/
1. Composer is a dependency manager or package manager in PHP that provides a standard format(composer.json) for managing dependencies of PHP software and required libraries.
2. Composer runs through the command line and installs dependencies (e.g. libraries) for an application.
3. It also provides autoload capabilities for libraries that makes usage of third-party code easy.
4. It also allows users to install PHP applications that are available on Packagist which is its main repository containing available packages.
5. Composer uses their commands with reference for Packagist:https://packagist.org/.
6. Packagist: It is the main/official repository for Composer which contains available packages to serve Composer.
7. Actually/In-fact all project/package/library files are physically resides on GitHub and Packagist only keeps short-information/references-of-github about these project/package/library requested by Composer.
8. When Composer fires any command, It hits to Packagist and then Packagist uses their reference-of-github and let Composer pull all physical files from GitHub. That means, when Composer fires command and expecting project/package/library from Packagist, Packagist does not give any project/package/library to Composer in return but It gives reference-of-github and tell Composer to download all those from github.
9. composer.json: Composer is a dependency manager for PHP. Composer allows developers to specify project dependencies in a composer.json file and then Composer automatically handles the rest(means Composer downloads all package/library as per mentioned in composer.json through packagist and which in turn uses github for their purpose).

/*** Composer commands(including autoloading concept): https://getcomposer.org/ > Documentation > Book > Command-line interface / Commands ***/
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
Dump-फेंकना ,डालना ,गिराना 
a. This command dumps(i.e. creates & stores) autoload file in vendor directory. 
b. Use this command always when you have added any new class or interface or trait, to make entries of these class/interface/trait to vendor/composer/autoload_classmap.php & in other files of same directory to enjoy composer's autoloading functionality. 
c. This command creates/modifies/affects only file/files of vendor/composer directory and vendor/autoload.php file.
d. -o => optimized (Optimizes PSR0 and PSR4 packages to be loaded with classmaps too, good for production.)
e. What it does exactly: This command looks into composer.json > "autoload" object of composer.json > "classmap" section and checks (This command works for other sections of "autoload" object as well like "psr-4", etc.):
	i. whether any new class-or-interface-or-traits-containing directory has been added, if yes, then makes maps of classname-to-it's-file-with-it's-full-path in vendor/composer/autoload_classmap.php and might be modify all other files present in same directory as well, for all those files whose directory mentioned under "classmap" section in composer.json.
	ii. whether any new class-or-interface-or-trait containing file has been added for already mentioned directories under "classmap" section in composer.json, if yes, then makes map-of-classname-to-it's-file-with-it's-full-path in vendor/composer/autoload_classmap.php and might be modify all other files present in same directory as well.
	    Now just add vendor/autoload.php in your newly created php file(might be present in project's root folder) and enjoy of composer's autoloading functionality by accessing all classes or interfaces or traits of all directories mentioned under "classmap" section in composer.json as following:
	require_once 'vendor/autoload.php';

	$obj = new XYZ();

Case Study: 
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
	   It does this so that this class-map-files mentioned in vendor/composer/autoload_classmap.php could be got through vendor/autoload.php, included in start.php to get self-included both files i.e. app/models/User.php & app/models/Employee.php, by writing the statement "require_once __DIR__.'/../vendor/autoload.php';" only.)
	s. Run command "php index.php" again
	t. Got the expected output i.e.:
		I am inside app/models/User.php
		I am inside app/models/Employee.php

	Remember here: composer.lock file is created/re-created when there presents object "require" or "require-dev" in composer.json. So here, composer.lock file is not created automatically.	

/** Difference between "composer dump-autoload" & "composer dump-autoload -o" **/
Case Study:
	a. Create a blank directory "composer" i.e. It's project root directory.
	b. Go to inside "composer" directory
	c. Create following files with their directories:
		i. app/models/User.php:
		   class User
		   {
		        public function __construct()
        		{	
                		echo "\nI am inside app/models/User.php";
        		}
		   }
		ii. app/models/modelstwo/Usertwo.php:
		    class Usertwo
		    {
        		public function __construct()
        		{
                		echo "\nI am inside app/models/modelstwo/Usertwo.php";
        		}
		    }	
		iii. app/models/modelstwo/Userthree.php:
		     class Userthree
		     {
        		public function __construct()
        		{
                		echo "\nI am inside app/models/modelstwo/Userthree.php";
        		}
		     }
		iv. app/controllers/Ctl.php:
		    namespace App\Controllers;

		    class Ctl
		    {
        		public function __construct()
        		{
                		echo "\nI am inside app/controllers/Ctl.php";
        		}
		    }
		v. app/controllers/controllerstwo/Ctltwo.php:
		   namespace App\Controllers\Controllerstwo;

		   class Ctltwo
		   {
        		public function __construct()
        		{
                		echo "\nI am inside app/controllers/controllerstwo/Ctltwo.php";
        		}
		   }
		vi. app/controllers/controllerstwo/Ctlthree.php:
		    namespace App\Controllers\Controllerstwo;

		    class Ctlthree
		    {
        		public function __construct()
        		{
                		echo "\nI am inside app/controllers/controllerstwo/Ctlthree.php";
        		}
		    }
		vii. app/start.php:
		     require_once __DIR__.'/../vendor/autoload.php';			
		viii. index.php:
		      require_once 'app/start.php';

		      $user  = new User();
		      $user2 = new Usertwo();
		      $user3 = new Userthree();

		      $ctl   = new App\Controllers\Ctl();
		      $ctl2  = new App\Controllers\Controllerstwo\Ctltwo();
		      $ctl3  = new App\Controllers\Controllerstwo\Ctlthree();
		ix. composer.json:
		    {
        		"autoload": {
                		"psr-4": {
                        		"App\\Controllers\\": "app/controllers"
                		},
                		"classmap": [
                        		"app/models"
                		]
        		}
		    }
	d. Fire command "php index.php"
	e. Got output: vendor/autoload.php not exist in app/start.php
	f. Fire command "composer dump-autoload" 
	g. It creates the whole vendor directory with autoload.php fie and vendor/composer directory with other autoload files like:
		i. vendor/composer/autoload_classmap.php with some content like:
			return array(
    				'User' => $baseDir . '/app/models/User.php',
    				'Userthree' => $baseDir . '/app/models/modelstwo/Userthree.php',
    				'Usertwo' => $baseDir . '/app/models/modelstwo/Usertwo.php',
			); 
		ii.vendor/composer/autoload_static.php with some content like:
			public static $classMap = array (
        			'User' => __DIR__ . '/../..' . '/app/models/User.php',
        			'Userthree' => __DIR__ . '/../..' . '/app/models/modelstwo/Userthree.php',
        			'Usertwo' => __DIR__ . '/../..' . '/app/models/modelstwo/Usertwo.php',
			); 
			public static $prefixDirsPsr4 = array (
        			'App\\Controllers\\' =>
        				array (
            					0 => __DIR__ . '/../..' . '/app/controllers',
        				),
    			);
		iii.vendor/composer/autoload_psr4.php with some content like:
			return array(
    				'App\\Controllers\\' => array($baseDir . '/app/controllers'),
			); 
		etc. as well.
	h. Fire command "php index.php" again
	i. Got output: App\Controllers\Controllerstwo\Ctltwo, App\Controllers\Controllerstwo\Ctlthree classes not found in index.php(while creating objects for these classes)
	   Remember: According to PSR-4 autoloading specifications(https://www.php-fig.org/psr/psr-4/):
		i. For autoloading, while specifying namespace for a class in a php file, always include all parent directories name with separator('\').
		ii. Directories name used in namespace are case-sensitive, means, use exactlly same directory name while specifying namespace for a class in a php file.
		iii. Why this "class not found" fatal error outputted here: 
			A. Look carefully in composer.json in "autoload" object under section "psr-4", here instruction given to look for namespace App\Controllers into app/controllers directory. 
			B. See, here "Controllers" in namespace is not same as directory name "controllers" but still control does not create any problem in index.php while creating object for class App\Controllers\Ctl. It is because, it's clearly mentioned in vendor/composer/autoload_psr4.php as obove that always use "app/controllers" directory for namespace "App\Controllers".
			C. Actually when "composer dump-autoload" runs then composer copy this "psr-4" section instruction from composer.json and put the same in vendor/composer/autoload_psr4.php and control always looks into vendor/composer/autoload_psr4.php file for any namespace instruction, not in composer.json while executing index.php.
			D. But while creating object for App\Controllers\Controllerstwo\Ctltwo & App\Controllers\Controllerstwo\Ctlthree in index.php: Actually control looks into vendor/composer/autoload_psr4.php for namespace instruction & finds only for "App\Controllers" to map to "app/controllers", now for namespace App\Controllers\Controllerstwo\Ctltwo control expect a directory app/controllers/Controllerstwo with filename Ctltwo.php inside it but actually there is directory "controllerstwo" instead of "Controllerstwo". This is the reason for fatal error.
	j. To remove the error:
		i. Either change your directory name from "controllerstwo" to "Controllerstwo" as namespace contains "Controllerstwo" not "controllerstwo".
		ii. or execute command "composer dump-autoload -o" instead of "composer dump-autoload": It add also classmap for every psr-4 namespace classes in following files:
			A. vendor/composer/autoload_classmap.php with some content like:
                           return array(
				'App\\Controllers\\Controllerstwo\\Ctlthree' => $baseDir . '/app/controllers/controllerstwo/Ctlthree.php',
    				'App\\Controllers\\Controllerstwo\\Ctltwo' => $baseDir . '/app/controllers/controllerstwo/Ctltwo.php',
    				'App\\Controllers\\Ctl' => $baseDir . '/app/controllers/Ctl.php',
                                'User' => $baseDir . '/app/models/User.php',
                                'Userthree' => $baseDir . '/app/models/modelstwo/Userthree.php',
                                'Usertwo' => $baseDir . '/app/models/modelstwo/Usertwo.php',
                           );
                	B. vendor/composer/autoload_static.php with some content like:
                           public static $classMap = array (
				'App\\Controllers\\Controllerstwo\\Ctlthree' => __DIR__ . '/../..' . '/app/controllers/controllerstwo/Ctlthree.php',
        			'App\\Controllers\\Controllerstwo\\Ctltwo' => __DIR__ . '/../..' . '/app/controllers/controllerstwo/Ctltwo.php',
        			'App\\Controllers\\Ctl' => __DIR__ . '/../..' . '/app/controllers/Ctl.php',
                                'User' => __DIR__ . '/../..' . '/app/models/User.php',
                                'Userthree' => __DIR__ . '/../..' . '/app/models/modelstwo/Userthree.php',
                                'Usertwo' => __DIR__ . '/../..' . '/app/models/modelstwo/Usertwo.php',
                           );
                           public static $prefixDirsPsr4 = array (
                                'App\\Controllers\\' =>
                                        array (
                                                0 => __DIR__ . '/../..' . '/app/controllers',
                                        ),
                           );
		control always looks in vendor/composer/autoload_classmap.php to search a file while accessing a class and then vendor/composer/autoload_psr4.php(for psr-4 namespace classes only). Here in vendor/composer/autoload_classmap.php file, control gets full path with filename for classes App\Controllers\Controllerstwo\Ctltwo & App\Controllers\Controllerstwo\Ctlthree, so now no any fatal error occurs in index.php while creating objects for these classes.     
	k. For reference: Look here in same directory the whole "composer" folder having all files/code mentioned as above.
	l. YouTube video to understand autoloading as explained above(reference): https://youtu.be/VGSerlMoIrY
	m. That's all; This is the whole concept of autoloading(for classs/interface/trait/and-other-similar-structure) in PHP which has been clearly explained under the current section i.e. composer command no.(12. "composer dump-autoload").
*/

13. composer validate
/* This command will check if our composer.json(i.e. project root directory's composer.json) is valid. It would tell us about syntax-error and suggest about mandatory fields/objects of composer.json. We should always run the validate command before commit our composer.json file and before tag a release. */

14. composer status -v    (-v => verbose)
/* If we often need to modify the code of our dependencies(i.e. like inside vendor directory) and they are installed from source, the status command presents us the list of files(like from vendor directory) in which we have made changes. */

15. composer init
/* When fired this command, it interactively ask you about composer.json fields/objects value, and after providing answer of all mandatory questions/fields/objects it would generate composer.json file for you. */

16. composer diagnose
/* If you think you found a bug, or something is behaving strangely, you might want to run the diagnose command to perform automated checks for many common problems. */


/*** composer.json: https://getcomposer.org/ > Documentation > Book > The composer.json Schema ***/
1. "autoload" object/field:
	a. "psr-4" section: PSR-4 is the recommended way since it offers greater ease of use (no need to regenerate the autoloader when you add classes). Because when you define, namespace mapped to a source-code directory, and later you add other directories having some source-code classes inside previously-defined source-code directory then namespace could be defined for these new defined source-code just by adding their directory name with backslash with previously defined namespace and no need to generate vendor/autoload.php again by "composer update/install" command.
	Example: Suppose you have defined your "psr-4" section as following:
		{
			"autoload": {
				"psr-4": {
					"Magento\\Setup\\": "setup/src/Magento/Setup/"
				}
			}
		}
	Suppose if there is a file "Exception.php" in "setup/src/Magento/Setup" directory then it's namespace would be "Magento\Setup" with class-name "Exception". Means "Exception" class can be accessed by any other php file by using 2 following methods:
	i. Just by mention it's full namespace in php file like:
		$exception = new Magento\Setup\Exception();
	ii. Mention "use namespace" in php file header and access just by writung only class name like:
		use Magento\Setup\Exception;

		$exception = new Exception();

	Now you create another directory "setup/src/Magento/Setup/Log" inside previously defined "setup/src/Magento/Setup" directory and create a class file suppose "setup/src/Magento/Setup/Log/Biglog.php" with claas name "Biglog" then this file namespace would be "Magento\Setup\Log" i.e. that could be got just by adding it's directory name with previously-defined namespace "Magento\Setup\"; execution-control would understand this automatically by connecting it with previous defined namespace-mapped-to-source-code-directory and hence no need to generate vendor/autoload.php again.
	All "psr-4" references(from composer.json in autoload object under psr-4 section) are combined during "composer install/update" command into a single key => value array which may be found in the generated file vendor/composer/autoload_psr4.php.
	For above composer.json example, there would be entry in vendor/composer/autoload_psr4.php as following:
		return array(
			'Magento\\Setup\\' => array($baseDir . '/setup/src/Magento/Setup')
		);
	Here, no any extra entry would be happen for new namespace "Magento\Setup\Log" as it's no any new namespace but only a child of previously defined namespace "Magento\Setup\".
	If you need to search for same prefix/namespace in multiple directories, you can specify them as following:
		{
    			"autoload": {
        			"psr-4": { 
					"Monolog\\": ["src/", "lib/"] 
				}
   			 }
		}
	If you want to have a directory where any namespace will be looked for, you can use an empty prefix/namespace like following:
		{
    			"autoload": {
        			"psr-4": { 
					"": "src/" 
				}
    			}
		}
	If php source file is also located in the root of the package then you might define your namespace as following:
		{
    			"autoload": {
        			"psr-4": {
            				"Monolog\\": "src/",
            				"Vendor\\Namespace\\": ""
        			}
    			}
		}
		

	b. "psr-0" section: Under the "psr-0" section, you define a mapping from namespaces to paths, relative to the package root(as in "psr-4"). Note that this also supports the PEAR-style non-namespaced convention(like Zend_, Zend_Acl, etc.). All "psr-0" references(from composer.json in autoload object under psr-0 section) are combined during "composer install/update" command into a single key => value array which may be found in the generated file vendor/composer/autoload_namespaces.php.
	Example:
		{
    			"autoload": {
        			"psr-0": {
            				"Monolog\\": "src/",
            				"Vendor\\Namespace\\": "src/",
            				"Vendor_Namespace_": "src/"
        			}				
    			}
		}
	vendor/composer/autoload_namespaces.php entries:
		return array(
    			'Zend_' => array($vendorDir . '/magento/zendframework1/library'),
			'Prophecy\\' => array($vendorDir . '/phpspec/prophecy/src'),
			'MagentoHackathon\\Composer\\Magento' => array($vendorDir . '/magento/magento-composer-installer/src'),
			'' => array($baseDir . '/app/code'),
		);
		Here as from above:
		i.  in "/magento/zendframework1/library" directory, there would be a directory with name "Zend"
		ii. in "/phpspec/prophecy/src" directory, there would be a directory with name "Prophecy"
		iii.in "/magento/magento-composer-installer/src" there would be a directory with name "MagentoHackathon", inside it another directory "Composer" and also inside it another directory with name "Magento".
		iv. For any namespace, control would look into "/app/code" directory essentially.

	c. "classmap" section: This section has been clearly explained in above section "Composer commands". We can explain this section in-short in following points:
		i. All "classmap" references(from composer.json in autoload object under classmap section) are combined during "composer install/update" command into a single key => value array which may be found in the generated file vendor/composer/autoload_classmap.php.
		ii. This map is built by scanning for classes in all .php and .inc files in the given directories/files.
		iii. We can use the classmap generation support to define autoloading for all libraries that do not follow PSR-0/4.
		iv. To configure this, we specify all directories or files to search for classes as following:
			{
    				"autoload": {
        				"classmap": ["src/", "lib/", "Something.php"]
    				}
			}
	
	d. "files" section: If we want to require certain files explicitly on every request then you can use the files autoloading mechanism. This is useful if your package includes PHP functions(i.e. a php file having functions only) that can not be autoloaded by PHP.
	Case Study: 
		i.   Create a blank directory "filesAutoloading" & go inside this directory.
		ii.  create a file functions.php with content:
			<?php
			function factorial($n)
			{
    				if($n < 2) {
        				return 1;
    				} else {
        				return $n * factorial($n-1);
    				}
			}
		iii. create another file index.php with content:
			<?php
			require_once 'vendor/autoload.php';
			class Resource
			{
    				public function getResource($n)
    				{
        				return factorial($n);
    				}
			}
			$object = new Resource();
			echo 'I have got factorial of 6: '.$object->getResource(6);
		iv.  run command "php index.php"
		v.   Got Response as per expectation i.e.: call to undefined function factorial() in index.php
		vi.  Created composer.json with content as following:
			{
    				"autoload": {
	    				"files": ["functions.php"]
    				}
			}
		vii. run command "composer dump-autoload"
		viii.What it does:
			A. It created vendor/composer directory with all autoload files in which one is vendor/composer/autoload_files.php having some content like:
			  	return array(
    					'41da55927f7e15e2e05566a733ef4ad4' => $baseDir . '/functions.php',
				);
			B. It created vendor/autoload.php as well.
		ix.  run command "php index.php"
		x.   Got Response with no any error: I have got factorial of 6: 720
		     What happened now actually: composer's autoloading actually included file functions.php in index.php i.e. we can assume index.php treated as it has code-content like following instead of as mentioned above in index.php:
			<?php
			require_once 'functions.php';

			class Resource
			{
    				public function getResource($n)
    				{
        				return factorial($n);
    				}
			}
			$object = new Resource();
			echo 'I have got factorial of 6: '.$object->getResource(6);
		xi.  Get/Access all code/files mentioned here in directory filesAutoloading kept in same branch.
	
	e. "exclude-from-classmap" section: It's not related with "psr-4" or "psr-0" or "files" section. It's only related with "classmap" section. It works just oppsite of "classmap" section. Means, suppose if you have added "library" folder in "classmap" section under "autoload" object in composer.json to map all claases under "library" directory recursively to map, but you don't want to map all classes of a particular directory suppose "Test" directory inside "library" directory then you need to mention that directory in this section i.e. "exclude-from-classmap" section.
	Case Study:
		i.   Let's go to directory "filesAutoloading" as used in "files" section case-study.
		ii.  Add some files/folders as following:
			A. library/User.php
				class User
				{
					public function __construct()
					{
						echo "\nI am inside library/User.php";
					}
				}
			B. library/Employee.php
				class Employee
				{
					public function __construct()
					{
						echo "\nI am inside library/Employee.php";
					}
				}
			C. library/library2/User2.php
				class User2
				{
					public function __construct()
					{
						echo "\nI am inside library/library2/User2.php";
					}
				}
			D. library/library2/Employee2.php
				class Employee2
				{
					public function __construct()
					{
						echo "\nI am inside library/library2/Employee2.php";
					}
				}
		iii. Modify your composer.json as following:
			{
				"autoload": {
	    				"files": ["functions.php"],
            				"classmap": ["library"]
    				}
			}
		iv.  Look into files vendor/composer/autoload_classmap.php:
			return array(
			);
		v.   run command "composer dump-autoload" and look into file vendor/composer/autoload_classmap.php again:
			return array(
    				'Employee' => $baseDir . '/library/Employee.php',
    				'Employee2' => $baseDir . '/library/library2/Employee2.php',
    				'User' => $baseDir . '/library/User.php',
    				'User2' => $baseDir . '/library/library2/User2.php',
			);
		vi.  Add "exclude-from-classmap" section in composer.json as following:
			{
    				"autoload": {
	    				"files": ["functions.php"],
            				"classmap": ["library"],
            				"exclude-from-classmap": ["library/library2", "library/Employee.php"]
    				}		
			}
		vii. run command "composer dump-autoload" and look into vendor/composer/autoload_classmap.php:
			return array(
    				'User' => $baseDir . '/library/User.php',
			);
		viii.This means "exclude-from-classmap" worked here and now library/User.php is accessible only(not library/Employee.php, library/library2/Employee2.php, library/library2/User2.php) from any other php file(like index.php) using composer's autoloading functionality(as previously in "files" section in index.php).

2. "autoload-dev" object/field (root-only): 
	a. This is identical to the "autoload" object.
	b. Difference from "autoload" object is that - this section allows us to define autoload rules for development purposes only.
	c. "composer dump-autoload" creates/updates vendor/composer/(all autoload files) and vendor/autoload.php for both object i.e. "autoload" and "autoload-dev", but we can force composer to ignore "autoload-dev" field as following:
		composer dump-autoload --no-dev
	d. Classes needed to run the test suite(might be unit-test suite) should not be included in the main autoload rules to avoid polluting the autoloader in production(as we need not to autoload test-classes on production and unwanted/unneeded autoloading of classes would increase response-time on production) and when other people use your package as a dependency(other people might not be want/need to use your package's test-suite). Therefore, it's a good idea to rely on a dedicated path for your unit tests and to add it within the "autoload-dev" field.
		{
    			"autoload": {
        			"psr-4": { "MyLibrary\\": "src/" }
    			},
    			"autoload-dev": {
        			"psr-4": { "MyLibrary\\Tests\\": "tests/" }
    			}
		}
	e. Case Study:
		i.    Create a blank directory "filesAutoloading" and go to inside it.
		ii.   Create some files/folders as following:
			A. library/User.php
				class User
				{
					public function __construct()
					{
						echo "\nI am inside library/User.php";
					}
				}
			B. library/Employee.php
				class Employee
				{
					public function __construct()
					{
						echo "\nI am inside library/Employee.php";
					}
				}
			C. library/library2/User2.php
				class User2
				{
					public function __construct()
					{
						echo "\nI am inside library/library2/User2.php";
					}
				}
			D. library/library2/Employee2.php
				class Employee2
				{
					public function __construct()
					{
						echo "\nI am inside library/library2/Employee2.php";
					}
				}
		iii.  Create composer.json as following:
			{
    				"autoload": {
					"classmap": ["library/library2"]
    				},
    				"autoload-dev": {
					"classmap": ["library/User.php", "library/Employee.php"]
    				}
			}
		iv.   run command "composer dump-autoload --no-dev".
		v.    This command would create vendor/composer/(all autoload files) and vendor/autoload.php. Now look into vendor/composer/autoload_classmap.php:
			return array(
    				'Employee2' => $baseDir . '/library/library2/Employee2.php',
    		    		'User2' => $baseDir . '/library/library2/User2.php',
			);
		vi.   That means, as per expectation, only "autoload" field classes are autoloaded.
		vii.  run command "composer dump-autoload" and look into vendor/composer/autoload_classmap.php again:
			return array(
    				'Employee' => $baseDir . '/library/Employee.php',
    				'Employee2' => $baseDir . '/library/library2/Employee2.php',
    				'User' => $baseDir . '/library/User.php',
    				'User2' => $baseDir . '/library/library2/User2.php',
			);
		viii. This means, as per expectation, this time both fields classes i.e. "autoload" & "autoload-dev", are autoloaded as there "--no-dev" part is absent from command "composer dump-autoload".

3. "require" object/field: Lists packages required by this package(i.e. current package; whose composer.json's "required" field we are talking currently).
	{
		"require": {
			"psr/log": "1.0.2"
		}
	}
   The package will not be installed(mentioned under "require" field) unless requirements for that package can be met. 
   Means, as in above example, our package requirement is to download/contain package "psr/log" having version 1.0.2 but if this version of package having/mentioned PHP-7.2 as a requirement in their composer.json's "require" field and our system/machine/environment has PHP-7.0 then composer would not be able to download this package i.e. "psr/log" for your package.
   what is meant by caret(^) and tilde(~) used with version-no: These could be explained by following example: Reference: https://getcomposer.org/doc/articles/versions.md#next-significant-release-operators
   	{
		"require": {
    			"vendor/package": "1.3.2", // exactly 1.3.2

    			// >, <, >=, <= | specify upper / lower bounds
    			"vendor/package": ">=1.3.2", // anything above or equal to 1.3.2
    			"vendor/package": "<1.3.2", // anything below 1.3.2

    			// * | wildcard
    			"vendor/package": "1.3.*", // >=1.3.0 <1.4.0

    			// ~ | allows last digit specified to go up
    			"vendor/package": "~1.3.2", // >=1.3.2 <1.4.0
    			"vendor/package": "~1.3", // >=1.3.0 <2.0.0

    			// ^ | doesn't allow breaking changes (major version fixed - following semver)
    			"vendor/package": "^1.3.2", // >=1.3.2 <2.0.0
    			"vendor/package": "^0.3.2", // >=0.3.2 <0.4.0 // except if major version is 0
		}
	}
	semver => Semantic Versioning => What is semantic versioning ? => Given a version number MAJOR.MINOR.PATCH, increment the: MAJOR version when you make incompatible API changes, MINOR version when you add functionality in a backwards-compatible manner, and PATCH version when you make backwards-compatible bug fixes.

4. "require-dev" object/field (root-only): Lists packages required for developing this package(i.e. current package; whose composer.json's "required" field we are talking currently), or running tests, etc.
	{
		"require": {
			"psr/log": "1.0.2"
		},
		"require-dev": {
        		"phpunit/phpunit": "~6.2.0"
		}
	}
	The dev requirements of the root package(i.e. current package; whose composer.json's "required" field we are talking currently) are installed by default(means "composer install" installs all dependencies mentioned under "require" object as well as under "require-dev" object for root-package only, it does not installs root-package's dependency's composer.json's "require-dev" packages). 
	Both "composer install" & "composer update" commands support "--no-dev" option that prevents dev-dependencies from being installed.
	Case Study:
		a. Create a blank directory "requireExp" and go inside this directory.
		b. create file composer.json as following:
			{
				"require": {
					"psr/log": "1.0.2"
				}
			}
		c. run command "composer install"
		d. This commands created some files/folders as following:
			i.    Downloaded "psr/log" package in vendor/psr/log
			ii.   Generated all autoload files under vendor/composer directory
			iii.  Created composer.lock file using composer.json
			iv.   Created vendor/autoload.php file
		e. Modify composer.json(i.e. add "require-dev" object) as following:
			{
				"require": {
					"psr/log": "1.0.2"
				},
				"require-dev": {
        				"phpunit/phpunit": "~6.2.0"
				}
			}
		f. run command "composer update"
		g. This command does/affects following:
			i.    It downloads dev-dependencies for root package only(i.e. packages listed under "require-dev") means it downloads package "phpunit/phpunit" and it's main-dependencies only(i.e. "require" packages only not "require-dev" packages) and this main-dependency's main-dependencies only and so on.
			Example: This command downloaded "phpunit/phpunit" package and it's dependencies like "phpunit/php-code-coverage", "phpunit/php-timer", "sebastian/comparator", "phpspec/prophecy" etc. but not downloaded phpspec/prophecy's dev-dependency's i.e. package "phpspec/phpspec". This means:
				A. A root-package's dev-dependencies can be downloaded by firing command "composer install/update".
				B. root package's dev-dependency's dev-dependencies could not be downloaded, only main-dependencies(i.e. "require" field) could be downloaded and so on i.e. it's true recursively.
				C. Even root package's dev-dependencies could be prevented to be downloaded by using command "composer install/update --no-dev".
				D. This command updates vendor/composer/(all autoload files), composer.lock and vendor/autoload.php as usual.

5. "replace" object/field: Best Reference: http://www.darwinbiler.com/how-does-the-replace-property-work-in-composer/
   Let's understand this concept in following points:
   	a. I have an application called "My App".
	b. "My App" requires two packages as dependency, namely "original/library" and "other/package".
	c. "other/package" has dependency on "original/library".
	d. The maintainer of "original/library" is not updating it anymore, and there is a lot of bugs on it.
	e. You want to fix the issues on "original/library" but they are not accepting your Pull Requests.
	f. You forked the "original/library" instead, in a package called "yourfork/library".
	g. You published the package "yourfork/library" on packagist.org as Packagist allows forked-repository as well.
	h. You specify in your "My App" project to use "yourfork/library".
	
	composer.json might look like as following:
	a. "My App" composer.json:
		{
			"require": {
				"other/package": "x.y.z",
				"yourfork/library": "x.y.z"
			}
		}
	b. "yourfork/library" composer.json:
		{
			"name": "yourfork/library"
		}
	c. "original/library" composer.json:
		{
			"name": "original/library"
		}
	d. "other/package" composer.json:
		{
			"name": "other/package",
			"require": {
				"original/library": "x.y.z"
			}
		}
	Now, the problem is, "other/package" has dependency on "original/library". Which results into having both copies loaded in your app! This is not good, since the buggy package ("original/library") is still loaded and can break your application.
	There has something to be done, so that whenever there is a need to use "original/library", Composer knows that it should "replace it" by your fork, which is "yourfork/library".
	Solution is - enter the "replace" object in your "yourfork/library" package, so that Composer knows that it can serve as a replacement for "original/library", whenever that package is being required.
	So, modify "yourfork/library" composer.json as following:
		{
			"name": "yourfork/library",
			"replace": {
				"original/library": "x.y.z"
			}
		}
	Now. even though you haven't "told" directly the "other/package" to stop using the "original/library", Composer will not load the "original/library" anymore, since you told him that it can be replaced by "yourfork/library".

	This is also useful for packages that contain sub-packages, for example the main symfony/symfony package contains all the Symfony Components which are also available as individual packages. If you require the main package it will automatically fulfill any requirement of one of the individual components, since it replaces them.
	Caution is advised when using replace for the sub-package purpose explained above. You should then typically only replace using "self.version" as a version constraint, to make sure the main package only replaces the sub-packages of that exact version, and not any other version, which would be incorrect.
	Open "packagist.org" and search "symfony/symfony", you can see here at bottom-right all replaced-packages list for package "symfony/symfony". This means, if your application has mentioned this package i.e. "symfony/symfony" in their composer.json as dependency i.e. under "require" field and "symfony/asset" as well which is in replace-list of "symfony/symfony" package(that means "symfony/asset" is also present inside "symfony/symfony" package) then only "symfony/asset" that exists inside "symfony/symfony" package would be loaded by composer's autolod and not separate package "symfony/asset".
	For best-understanding, read suggested URL, given in start of this topic.

    Case Study: a. There are 2 packages available on packagist.org:
			A. symfony/asset
			B. symfony/symfony
		   symfony/asset is listed in "replace" list of symfony/symfony package that means "symfony/asset" is also present inside "symfony/symfony" package.
		b. create a blank directory "replaceExample" and go inside that directory.
		c. run command "composer require symfony/asset".
		d. It creates/downloads:
			A. composer.json:
				{
					"require": {
						"symfony/asset": "^3.4"
					}
				}
			B. vendor/symfony/asset package
			C. vendor/composer/(all autoload files)
			D. vendor/autolad.php
			E. composer.lock
		e. run command "composer require symfony/symfony"
		f. vendor/symfony/asset package is disappeared/removed. symfony/symfony package is installed and all it's dependency are installed as well.
		g. composer.json is now:
			{
				"require": {
					"symfony/asset": "^3.4",
					"symfony/symfony": "^3.4"
				}
			}

		Now consider a second case:
		a. create a blank directory "replaceExample" and go inside that directory.
		b. run command "composer require symfony/symfony".  
		c. It creates/downloads:
			A. composer.json:
				{
					"require": {
						"symfony/symfony": "^3.4"
					}
				}
			B. vendor/symfony/symfony package and all dependencies of symfony/symfony, but no any package like vendor/symfony/asset; might be symfony/asset present in symfony/symfony with another name.
			C. vendor/composer/(all autoload files)
			D. vendor/autolad.php
			E. composer.lock
		d. run command "composer require symfony/asset".
		e. There displays a message "Nothing to install or update" and no any package created/installed there, like vendor/symfony/asset.
		f. composer.json is now:
			{
				"require": {
					"symfony/symfony": "^3.4",
					"symfony/asset: "^3.4"
				}
			}

6. "conflict" object/field: This object of composer.json, lists those packages which conflict with current version of your package. These packages, listed here, would not be allowed to be installed together with your package.
   Note that when specifying ranges like <1.0 >=1.1 for any package in "conflict" object, this means listed package version less than 1.0 and equal or newer than 1.1 would conflict with current version of your package, so would not be allowed anywhere to be installed the listed package containing mentioned version with current version of your package.
   Your package's composer.json might be look like:
	{
		"conflict": {
			"any-vendor/any-package": "<1.0 >=1.1",
			"any-vendor2/any-package2": "1.0.*"
		}
	}

7. "repositories" object/field (root-only): By default Composer only uses the packagist repository. By specifying repositories you can get packages from elsewhere.
	{
		"repositories": [
        		{
            			"type": "composer",
            			"url": "https://repo.magento.com/"
        		}
    		]
	}
    I have found this in magento-zip-downloaded-with-sample-data-from-magento-site-with-version-2.2.5 composer.json.
    To view/read in more detail, visit: https://getcomposer.org/doc/04-schema.md#repositories

8. "scripts" object/field (root-only): Composer allows you to hook into various parts of the installation process through the use of scripts.
   To view/read in more detail, visit: https://getcomposer.org/doc/04-schema.md#scripts
   You can view the cheat-sheet(whose URL mentioned in first-line of this page) for the same as well.

9. "extra" object/field: This object of composer.json, is used to provide/supply some-data to "scripts" object.
   To view/read in more detail, visit: https://getcomposer.org/doc/04-schema.md#extra

10."name" object/field: This field contains the name of your package. It consists of vendor name and project name, separated by "/". Example:
	a. monolog/monolog
	b. igorw/event-source
   The name can contain any character, including white spaces, and it's case insensitive (foo/bar and Foo/Bar are considered the same package). In order to simplify its installation, it's recommended to define a short and lowercase name that doesn't include non-alphanumeric characters or white spaces. It's a required field for published packages.

11."description" object/field: This field contains a short description of your package. Usually this is one line long. It's also a required field for published packages.

12."version" object/field: This field contains the version of your package. In most cases, this is not required and should be omitted. This must follow the format of X.Y.Z or vX.Y.Z with an optional suffix of -dev, -patch (-p), -alpha (-a), -beta (-b) or -RC. The patch, alpha, beta and RC suffixes can also be followed by a number.
   RC => A release candidate (RC), also known as "going silver", is a beta version with potential to be a final product, which is ready to release unless significant bugs emerge; [https://en.wikipedia.org/wiki/Software_release_life_cycle].
   Example: 
	a. 1.0.0
   	b. 1.0.2
	c. 1.1.0
	d. 0.2.5
	e. 1.0.0-dev
	f. 1.0.0-alpha3
	g. 1.0.0-beta2
	h. 1.0.0-RC5
	i. v2.0.4-p1
   To view/read in more detail, visit: https://getcomposer.org/doc/04-schema.md#version

13."type" object/field: This field contains the information of your package-type. 
   Out of the box, Composer supports four types:
   	a. library: This is the default. It will simply copy the files to vendor.
	b. project: This denotes a project rather than a library. For example application shells like https://github.com/symfony/symfony-standard or full fledged applications distributed as packages.
	c. metapackage: An empty package that contains requirements and will trigger their installation, but contains no files and will not write anything to the filesystem.
	d. composer-plugin: A package of type composer-plugin may provide an installer for other packages that have a custom type. 
   Use/add this field in your composer.json only if your package-type is other than "library".
   To view/read in more detail, visit: https://getcomposer.org/doc/04-schema.md#type

14."license" object/field: The license of the package can be either a string or an array of strings.
   The recommended notation for the most common licenses is (alphabetical):
   Example:
   	a. Apache-2.0
	b. BSD-4-Clause
	c. GPL-3.0-only / GPL-3.0-or-later
	d. LGPL-3.0-only / LGPL-3.0-or-later
	e. MIT
   In composer.json, might be as followings:
   	{
    		"license": "MIT"
	}
	{
    		"license": [
       			"LGPL-2.1-only",
       			"GPL-3.0-or-later"
    		]
	}
	{
    		"license": "(LGPL-2.1-only or GPL-3.0-or-later)"
	}
   To view/read in more detail, visit: https://getcomposer.org/doc/04-schema.md#license

15."minimum-stability" object/field (root-only): This field decides, to which stability-level of packages you(your-package) want to download/install(remember dependencies/packages-need-to-install are mentioned under "require" & "require-dev" object/field). Available options (in order of stability) are dev, alpha, beta, RC, and stable; here "stable" is default.
   All versions of each package are checked for stability, and those that are less stable than the minimum-stability setting will be ignored when resolving your project dependencies. 
   It works/applies/applicable on/for your root-package's dependency only because your root-package's dependency's dependency minimum-stability is decided by your root-package's dependency's composer.json's minimum-stability field setting not the root-package's composer.json's minimum-stability field setting.
   	{
		"minimum-stability": "beta"
	}
   Note that we can also specify stability requirements on a per-package basis using stability flags in the version constraints that you specify in a "require" field as following:
   	{
    		"require": {
        		"monolog/monolog": "1.0.*@beta",
        		"acme/foo": "@dev"
    		}
	}
   To view/read in more detail, visit: https://getcomposer.org/doc/04-schema.md#minimum-stability


/*** Create and publish a package to Packagist ***/
Using GitHub(github.com), Packagist(packagist.org) and Composer one can contribute with PHP community by creating packages.
Composer is a package manager for PHP. We can use packages the community developed and we can contribute with our packages too. Here, we will see, how to create a project/package, install Composer inside it("install composer inside it" means just to create composer.json file for the package) and send to Packagist, from where other developers can use it inside their projects.
1. Creating a package: 
	a. Create a blabk hello-world directory & go to inside it.
	b. We can keep our source-code files here but advised to create a directory "hello-world/src" and put our code there.
	c. It makes our source-code organized, easier to understand and easier to maintain as well.
	d. Create a file "hello-world/src/HelloWorld/SayHello.php":
		<?php 
		namespace HelloWorld;

		class SayHello
		{
    			public static function world()
    			{
        			return 'Hello World, Composer!';
    			}
		}
	e. Now our project/package hello-world is ready(having just a single file "hello-world/src/HelloWorld/SayHello.php").
2. Install composer inside project/package:
	a. It means just to create composer.json file for our project/package in root-directory.
	b. Create composer.json manually or let composer create it by running command "composer init"
	c. Answer the questions which composer asks in interactive mode:
		i.   Package name: <vendor-name>/<package-name>    (for me it's: jitendrayy/hello-world)
		ii.  Description: My first Composer project
		iii. Author: <your-name> <your-mail-id>  (for me it's: Jitendra Yadav <jitendray@cybage.com>, but here some bug in composer, due to this reason it's not accepting it's own format, so just press Enter key with blank and let composer accept/keep their suggested value, later we would modify composer.json file)
		iv.  Minimum Stability: dev
		v.   Package Type: library
		vi.  License: just press Enter key with blank
		vii. Would you like to define your dependencies: no
		viii.Would you like to define your dev dependencies: no
		ix.  Confirm the json content created by composer by pressing Enter key with "yes"
		x.   Composer created composer.json file for you based on your provided input.
			{
    				"name": "jitendrayy/hello-world",
    				"description": "My first Composer project",
    				"type": "library",
    				"authors": [
        				{
            					"name": "jitendrayy",
            					"email": "jitendray@cybage.com"
        				}
    				],
    				"minimum-stability": "dev",
    				"require": {}
			}
		xi.  Now we have "composer.json" file saved in our root-directory. It's almost ready but we must do some changes:
			{
    				"name": "jitendrayy/hello-world",
    				"description": "My first Composer project",
    				"type": "library",
    				"authors": [
        				{
            					"name": "Jitendra Yadav",
            					"email": "jitendray@cybage.com"
        				}
    				],
    				"minimum-stability": "dev",
    				"require": {
					"php": ">=5.3.0"
				},
				"autoload": {
					"psr-0": {
						"HelloWorld\\": "src/"	
					}
				}
			}
		     Here we have modified composer.json as following:
		     	A. modify author name from "jitendrayy"(Composer's suggested value) to "Jitendra Yadav"
			B. Added under "require" object/field - PHP 5.3 as minimum requirement
			C. Added "autoload" object/field: Tell Composer to autoload(using psr-0) all files with "HelloWorld" namespace that are inside "src" directory.
3. Testing our package: 
   a. At this stage, we have files/folders as following:
	hello-world
	hello-world/src
	hello-world/src/HelloWorld
	hello-world/src/HelloWorld/SayHello.php
	hello-world/composer.json
   b. Go to inside your package's root-directory i.e. hello-world/ and run command "composer dump-autoload" as there is no any package needs to download(only classes-autoloading creation needed here) as mentioned in composer.json otherwise "composer install".
   c. It creates files/folders as following:
	hello-world/vendor
	hello-world/vendor/composer
	hello-world/vendor/composer/(many autoload files - like autoload_namespaces.php, autoload_psr4.php, etc.)
	hello-world/vendor/autoload.php
	hello-world/composer.lock
   d. Create another file hello-world/index.php:
   	<?php
	require_once 'vendor/autoload.php';

	echo HelloWorld\SayHello::world();
   e. run command "php index.php"
   f. Got output as expected: Hello World, Composer!
   g. Testing is successful. Now rever-back/bring/keep your-package to it's previous-stage i.e. just before testing.
   h. Delete whole "vendor" directory and composer.lock file.
4. Publish our package to Packagist(packagist.org)
   a. Create a public repository with name "helloworld" on GitHub(github.com) using your github-account.
   b. Go to inside your package i.e. hello-world:
	i.   run command "git init"
	ii.  run command "git remote add origin https://github.com/<your-github-user-name>/helloworld.git"
	iii. run command "git add ." or add one-by-one all files to escape adding un-wanted files like environment files
	iv.  run command 'git commit -m "First commit"'
	v.   run command "git push origin master"
   c. Your package's all files are now present in your github repository "helloworld".
   d. Go to Packagist i.e. open packagist.org in your browser and login to your packagist-account.
   e. For me, my packagist credentials: username/email-goto.jitendra@gmail.com & password as jitendra.research's password.
   f. Click on "Submit" link present in header-section.
   g. Here in text-box under "Repository URL", put your github-package URL:
   	https://github.com/<your-github-user-name>/helloworld
      and click on "Check" button.
   h. Packagist will check your project/package and return the project/package name. If it’s correct accept it.
   i. It's done. Now your package is available on packagist.org to search(with name as Packagist suggested in just previous-step) and download/install to use for any developer in their project.
