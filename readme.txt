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
composer require symfony/process    
/* It will download and install package "symfony/process" for you 
1. creates composer.json & composer.lock files
2. creates a vendor directory
3. creates a directory vendor/symfony (i.e. vendor name)
4. Download vendor/symfony/process package (i.e. vendor symfony's package)
5. creates vendor/composer directory having various autoload files like autoload_psr4.php, autoload_namespaces.php, autoload_classmap.php, etc. 
6. creates vendor/autoload.php
*/

/*** Publish a package to Packagist ***/


/*** composer.json ***/
https://getcomposer.org/ > Documentation > The composer.json Schema

