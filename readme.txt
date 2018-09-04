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
1. Creates composer.json & composer.lock files. Both files are always created/updated when a new package is installed(like "composer require symfony/process" as above).
2. Creates a vendor directory
3. Creates a directory vendor/symfony (i.e. vendor name)
4. Download vendor/symfony/process package (i.e. vendor symfony's package)
5. Creates vendor/composer directory having various autoload files like autoload_psr4.php, autoload_namespaces.php, autoload_classmap.php, etc. All these files present in composer directory, are always created/updated when a new package is installed(like "composer require symfony/process" as above). 
6. Creates vendor/autoload.php: For all dependencies(libraries) downloaded through composer in vendor directory, composer creates a file vendor/autoload.php in last(autoload.php, everytime created/updated, when a new package is installed); By including this single file in your code, you can use all composer-downloaded-library-classes present in vendor as following:
require vendor/autoload.php;

use Symfony\Component\Process\Pipes\UnixPipes;  
/** Actually, these namespaces are mapped to exact source-file going to use, in vendor/composer/autoload_psr4.php and other autoload-files present in same directory as this file. autoload_psr4.php is updated with reference from newly installed package > composer.json > "autoload" section > "psr-4" sub-section **/
/** Now you can access/create UnixPipes object by writing simply "new UnixPipes($x, $y,..)" as usual. **/
7. For any composer's package, you may get the full information from packagist.org. Just search in header search-box the package name like "psr/log" and you can get information about it like: installation-command, it's source on github i.e. github-url, what requires for it's installation, what it's purpose, etc.
8. Second way to get information about a composer's package(as above) is, just type a command on your terminal "composer show --all psr/log". This pulls information about "psr/log" from Packagist and display on your terminal.
9. Remember: "psr/log" is composer's package name only. This does not ensures you that you can get the package on github at url https://github.com/psr/log. composer's package may not be at github and if it is on github then source-url might be different. As in case of "psr/log", it's source-url is https://github.com/php-fig/log.git.

/* In-short, what happens when composer installs any package like above "composer require symfony/process" */
1. Package downloads in vendor directory having a directory with package's vendor name like for "symfony/process" in vendor/symfony/process directory.
2. Composer updates all autoload files present in vendor/composer directory.
3. Composer updates both composer.json & composer.lock files present in project's root-directory.
4. In last, composer updates vendor/autoload.php.
*/

4. composer search <keyword-you-want-to-search>
   composer search log
/* Composer lists all packages available on packagist.org for mentioned-keyword */

5. composer show --all <package-name>
   composer show --all psr/log
/* Composer shows all information about package like name, description, version, source on github i.e. github-url if hosted on github, etc. the same we can get on packagist.org by searching the package with it's name */

6. composer install
/* This command reads the composer.lock file from the current directory, processes it, and downloads and installs all the libraries and dependencies outlined in that file. If the file does not exist it will look for composer.json, creates composer.lock file with it's help and do the same. 
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
		i. Composer creates composer.lock file using composer.json as "install" command starts their work from composer.lock file.
		ii. Composer creates "vendor" directory, then package's vendor directory inside vendor i.e. "psr" and then download the package inside it. Means created directory structure is vendor/psr/log.
		iii. Composer creates vendor/composer directory and put all autoloading files inside it.
		iv. Create vendor/autoload.php file(including which any php file can use downloaded library classes by mentioning corresponding classes namespace only in php file)
*/

7. composer update [package-name] [package-name] [package-name].. 
   composer update symfony/process
/* package-name is optional. This command reads the composer.json file from the current directory, processes it, and updates, removes or installs all the dependencies. 
   Case Study:
   	a. create a blank directory with name "test".
	b. Go to test directory and create composer.json file with content:
	{
    		"require": {
        	"psr/log": "^1.0"
    		}
	}
	c. Use command "composer update"
	d. If nothing is present to update then what happened: This command behaves like "composer install" and done all those things which "composer install" command do.
If possible, don't update composer.json file at your own to install/remove a package, use "composer require" and "composer remove" command for the same and let composer modify composer.json and other related files. */

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
		i. Check if composer.lock file exists (if not, Composer itself creates it)
		ii.Read composer.lock file
		iii.Install the packages specified in the composer.lock file

When to install and when to update:
	a. "composer update" is mostly used in the 'development phase', to upgrade our project packages according to what we have specified in the composer.json file.
	b. "composer install" is primarily used in the 'deploying phase' to install our application on a production server or on a testing environment, using the same dependencies stored in the composer.lock file created by "composer update".

8. composer remove <package-name>
   composer remove symfony/process
/* Removes the package directory under vendor directory, updates - all autoload files under vendor/composer directory, composer.json & composer.lock files under root directory, autoload.php file under vendor directory. If a package is installed, removed and then again go for installation the same package then composer uses it's cache to install(means it does not download again from packagist.org i.e. github or any-other-package-hosting-site) */

9. composer clear-cache
/* Composer removes their local machine cache from where all these commands are fired. When you install any package, composer downloads it and stores the same in their cache after installation completes for further use. If you removed the package and want to install the same again, this time, composer would not download, but install the package from their cache. */

/*** Publish a package to Packagist ***/


/*** composer.json ***/
https://getcomposer.org/ > Documentation > The composer.json Schema

