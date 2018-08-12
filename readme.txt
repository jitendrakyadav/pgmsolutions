/*** What is OAuth ***/
1. OAuth: open authorization
2. OAuth is an open standard for access delegation.
3. OAuth is not any authentication protocol.
4. OAuth is not any language or software, by installing which you can start your work.
5. OAuth is only a concept or (authorization) standards like PSR (PSR-0, PSR-2, PSR-4) i.e. PHP Standards Recommendations 
   or a set of rules that allow you to share your data that you hold within an application with another application 
   without revealing your user name and password that you hold within the first application with the second one.

It is commonly used as a way for internet users to grant websites or applications access to their information on other 
websites but without giving them the passwords. This mechanism is used by companies such as Amazon, Google, Facebook, Microsoft 
and Twitter to permit the users to share information about their accounts with third party applications or websites.

OAuth 2.0 Grant Types:
1. Authorization Code
2. Implicit
3. Password
4. Client Credentials
5. Device Code
6. Refresh Token

OAuth website: https://oauth.net/2/
Here go to heading "Code and Services" in footer and click on link "OAuth 2.0 Code and Services"
For creating OAuth 2 server: Go to "Server Libraries" > PHP > "PHP OAuth2 Server" and "Demo"
For detail, step by step instructions: https://bshaffer.github.io/oauth2-server-php-docs/cookbook/
Using OAuth 2 as client: Go to Client Libraries > PHP > (Here choose any PHP OAuth Library to Access Any OAuth API)
Already used library for client_credentials grant type: https://github.com/adoy/PHP-OAuth2
https://www.oauth.com/oauth2-servers/access-tokens/client-credentials/

Namespace concept came in PHP from 5.3 version (and autoloading concept in PHP 5.3+), so:
1. If there is a suitable library supported PHP 5.5/5.6 then we can use OAuth 2 client from PHP 5.5/5.6 as well, no need 
   essentially PHP 7 & no need of using PHP OAuth wrapper functions like OAuth::getAccessToken, OAuth::setToken, etc.
2. If there is a suitable library supported PHP 5.5/5.6 then we can create OAuth 2 server from PHP 5.5/5.6 as well, no need 
   essentially PHP 7.