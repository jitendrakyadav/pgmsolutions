/*** What is OAuth ***/

1. OAuth: open authorization
2. OAuth is an open standard for access delegation.
3. OAuth is not any authentication protocol.
4. OAuth is not any language or software, by installing which you can start your work.
5. OAuth is only a concept or (authorization) standards like PSR (PHP Standards Recommendations: PSR-0, PSR-2, PSR-4, etc.) or a set of rules that allow you to share your data (that you hold within an application) with another application without revealing your user name and password with the second application (i.e. any 3rd party application) that you hold within the first application.

It is commonly used as a way for internet users to grant websites or applications access to their information on other 
websites but without giving them the passwords. This mechanism is used by companies such as Amazon, Google, Facebook, Microsoft 
and Twitter to permit the users to share information about their accounts with third party applications or websites.

OAuth 2.0 Grant Types: (There are 2 versions available of OAuth; OAuth 1 & OAuth 2)
1. Authorization Code
2. Implicit
3. Password
4. Client Credentials
5. Device Code
6. Refresh Token

OAuth website: https://oauth.net/2/: To know about all grant-types-request and their parameters need to send to get response, go to section "OAuth 2.0 Core" > "OAuth 2.0 Grant Types" and click on any grant-type link to get information in detail about that particular grant-type. For ex. click on hyperlink "Client Credentials" and on another page again click on "Client Credentials (oauth.com)".

Here go to heading "Code and Services" in footer and click on link "OAuth 2.0 Code and Services"
For creating OAuth 2 server: Go to "Server Libraries" > PHP > "PHP OAuth2 Server" and "Demo"
For creating OAuth 2 server, step by step instructions: https://bshaffer.github.io/oauth2-server-php-docs/cookbook/
Using OAuth 2 as client: Go to Client Libraries > PHP > (Here choose any PHP OAuth Library to Access Any OAuth API)

Already used library for client_credentials grant type: https://github.com/adoy/PHP-OAuth2
Note: create a file like index.php as here (and put this file parallel to PHP-OAuth2/src/OAuth2/Client.php) and comment some lines in PHP-OAuth2/src/OAuth2/Client.php > "private function executeRequest" as following:
      case self::HTTP_METHOD_GET:
            /*if (is_array($parameters) && count($parameters) > 0) {
                $url .= '?' . http_build_query($parameters, null, '&');
            } elseif ($parameters) {
                $url .= '?' . $parameters;
            }*/
            break;

https://www.oauth.com/oauth2-servers/access-tokens/client-credentials/

Curl request ex: Here is how can you make curl http request to get token through CLI:
curl -k --data "client_id=XXXXXXX&client_secret=XXXXXXXXXX&scope=read&grant_type=client_credentials" -X POST https://XYZ.com/connect/token
/* 
-k: allow insecure mode http as well with secure mode https  
--data: data whch you are going to submit to a URL i.e. a web-page
-X: emphasize to provide a request type GET, POST, PUT, etc.
You might make above curl request by using PHP wrapper function as well in a php program, which internally uses curl's libcurl library as our above command do
For more detaile, use command "curl --help"
*/

Namespace concept came in PHP from 5.3 version (and autoloading concept in PHP 5.3+), so:
1. If there is a suitable library(ultimately any library internally uses curl http/https request to get token & output-response) supported PHP 5.5/5.6 then we can use OAuth 2 client from PHP 5.5/5.6 as well, no need essentially PHP 7 & no need of using PHP OAuth wrapper functions like OAuth::getAccessToken, OAuth::setToken, etc.(Clearly mentioned here: https://oauth.net/2/ > Code and Services > OAuth 2.0 Code and Services > Client Libraries > PHP > "league/oauth2-client"[click this]: OAuth 2.0 Client from the League of Extraordinary Packages: i.e. https://github.com/thephpleague/oauth2-client look here in README.md file under "Requirements" section).
2. If there is a suitable library(ultimately any library internally uses curl http/https request to get token & output-response) supported PHP 5.5/5.6 then we can create OAuth 2 server from PHP 5.5/5.6 as well, no need essentially PHP 7(Clearly mentioned here in 3rd line: https://bshaffer.github.io/oauth2-server-php-docs/ under Requirements section).
