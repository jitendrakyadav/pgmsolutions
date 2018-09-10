/*** Composer:https://getcomposer.org ***/
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

/*** Publish a package to Packagist ***/


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
	
	d. "files" section: If we want to require certain files explicitly on every request then you can use the files autoloading mechanism. This is useful if your package includes PHP functions(i.e. a php file having functions only) that cannot be autoloaded by PHP.
	Case Study: i.   Create a blank directory "filesAutoloadingExample" & go inside this directory.
		    ii.  Fire command "composer require pas/log".
		    iii. It created/generated following files/folders:
		 	 A. composer.json:
				{
    					"require": {
        					"psr/log": "^1.0"
    					}
				}
			 B. composer.lock
			 C. vendor/psr package
			 D. vendor/composer/(all autoload files)
			 E. vendor/autoload.php
		    iv.  create a file functions.php with content:
		    		<?php
				function factorial($n)
				{
    					if($n < 2) {
        					return 1;
    					} else {
        					return $n * factorial($n-1);
    					}
				}
		     v.   create another file index.php with content:
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
		     vi.  run command "php index.php"
		     vii. Got Response as per expectation i.e.: call to undefined function factorial() in index.php
		     viii.Modified/added-some-lines-in composer.json with content now as following:
		     		{
    					"require": {
        					"psr/log": "^1.0"
    					},
    					"autoload": {
	    					"files": ["functions.php"]
    					}
				}
		     x.   run command "composer dump-autoload"
		     xi.  What it does:
		     	  A. It updated all autoload files under vendor/composer directory and created a new file autoload_files.php here having some content like:
			  	return array(
    					'41da55927f7e15e2e05566a733ef4ad4' => $baseDir . '/functions.php',
				);
			  B. It updated vendor/autoload.php as well.
		     xii. run command "php index.php"
		     xiii.Got Response with no any error: I have got factorial of 6: 720
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
		      xiv. Get/Access all code/files mentioned here in directory filesAutoloadingExample kept in same branch.
	
	e. "exclude-from-classmap" section: It's not related with "psr-4" or "psr-0" or "files" section. It's only related with "classmap" section. It works just oppsite of "classmap" section. Means, suppose if you have added "library" folder in "classmap" section under "autoload" object in composer.json to map all claases under "library" directory recursively to map, but you don't want to map all classes of a particular directory suppose "Test" directory inside "library" directory then you need to mention that directory in this section i.e. "exclude-from-classmap" section.
	Case Study:
		i.   Let's go to directory "filesAutoloadingExample" as used in "files" section case-study.
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
    				"require": {
        				"psr/log": "^1.0"
    				},
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
    				"require": {
        				"psr/log": "^1.0"
    				},
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
		viii.This means "exclude-from-classmap" worked here and now library/User.php is accessible only(not library/Employee.php, library/library2/User2.php, library/library2/Employee2.php) from any other php file(like index.php) using composer's autoloading functionality.
