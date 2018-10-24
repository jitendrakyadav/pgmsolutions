/*** cURL: Client URL; Website: https://curl.haxx.se/; YouTube tutorial video: https://youtu.be/7XUibDYw4mc ***/

1. Curl is a command line tool and library("libcurl", a library created by Daniel Stenberg)
2. It allows you to connect and communicate to many different types of servers with many different types of protocols like HTTP, HTTPS, FTP, Gopher, Telnet, DICT, FILE, LDAP, SMTP, etc. 
3. It is used for transferring(upload & download) data/files to and from server. 
4. It is used in command lines(CLI) as well as in scripts(For ex: PHP script through libcurl library) to transfer data.
5. It is a great tool for testing REST APIs.
6. But most preferable tool for developers to test REST API is Postman.
7. It works as HTTP client, means through curl you can make HTTP GET & POST request to a web-server same as from browser.
8. A browser like chrome is also an HTTP client as it is able to make GET & POST request through their url/web-form to a web-server.
9. Browser is also work as FTP client as you can access your server-directory-files using it. Just fire ftp://<your-ip-address> for ex: ftp://107.189.161.150 from your browser and put your ftp-username and password in pop-up and hence now you can access your server-files from browser itself. Actually browser provides here your server-files as web-page.
10. Another famous HTTP client is Postman. From here, you can make various type of requests like GET, POST, PUT, DELETE, etc. 

/*** curl help command: it provides you all options for curl ***/
curl --help

/*** curl manual ***/
curl --manual

/*** A website that provides fake online REST API for testing and prototyping: http://jsonplaceholder.typicode.com/. We can test here GET, POST, PUT, DELETE API requests. ***/
/* A curl GET request to show 100 posts */
curl http://jsonplaceholder.typicode.com/posts 
/* A curl GET request to show 1 post with id=3 */           
curl http://jsonplaceholder.typicode.com/posts/3
/* While using HTTPS protocol, allows HTTP as well on the same time. To give this instruction to your curl, just use -k or --insecure option while making curl request */
curl -k https://XXX.com 
curl --insecure https://XXX.com 
/* A curl GET request to show 1 post with id=3; "-v" flag includes more words/sentences along with response to explain the same in more detail; verbose = using or containing too many words */           
curl -v http://jsonplaceholder.typicode.com/posts/3
/* It includes header information as well to show along with post-data */         
curl -i http://jsonplaceholder.typicode.com/posts/3 
      
/* It shows only header information & excludes post-data */
curl --head http://jsonplaceholder.typicode.com/posts/3   
or
curl -I http://jsonplaceholder.typicode.com/posts/3
   
/* It gets all 100 posts data and output/put into a newly created file post-data.txt in current directory */    
curl -o post-data.txt http://jsonplaceholder.typicode.com/posts  
/* It gets all 100 posts data and output/put into a newly created file posts(i.e. last part of URL; with no extension) in current directory */
curl -O http://jsonplaceholder.typicode.com/posts

/* It makes a HTTP POST request; "-X" option to provide a request type */
curl --data "title=Hello&body=Hello World" -X POST http://jsonplaceholder.typicode.com/posts 

/* A PUT request to update record for id=3; here in place of "--data", we can use "-d", means "--data"="-d" */
curl --data "title=Hello" -X PUT http://jsonplaceholder.typicode.com/posts/3 

/* A DELETE request to delete record with id=3 */
curl -X DELETE http://jsonplaceholder.typicode.com/posts/3 

/*** Using some complicated HTTP POST request ***/
curl --data "employee_id=123456789&card_number=123456789" -X POST http://127.0.0.1:9091/api/validateCard
/* Provide input data as json */
curl --data '{"employee_id":"1234"}' -X POST http://127.0.0.1:9091/api/validateCard
/* Add header option as well */
curl --header "Content-Type: application/json" --data '{"employee_id":"1234"}' -X POST http://127.0.0.1:9091/api/validateCard

/*** Go to web-page, right click on image and choose "Copy image address" and put here in command. It will download 2LDiENb.png file into current directory ***/         
curl -O https://i.imgur.com/2LDiENb.png
                     
/*** Here wrar560.exe will be downloaded with the same name ***/
curl -O https://www.rarlab.com/rar/wrar560.exe
/* Rename the file which you want to download, now wrar560.exe will be downloaded as application.exe */
curl -o application https://www.rarlab.com/rar/wrar560.exe
               
/*** Here what web-server provides for this URL(means same[content] as browser provides for this URL through web-server), created & stored in page.html. Remember, curl downloads file or output data which web-server provides for that given URL (as here used HTTP/HTTPS protocol) ***/
curl -o page.html http://blog.ajindra.com/php/what-is-soap/  

/*** Weather forecast information for a city ***/
curl wttr.in/delhi

/*** If an URL needs credential to access, then use following ***/
curl -u username:password http://XXXXXX.com/XXXX

/*** -L flag is used to follow the redirection; http://google.com redirects to it's www version i.e. https://www.google.com ***/
curl -L http://google.com

/*** Upload file/files to server through ftp protocol using curl ***/                                  
curl -u jitendraLDD:123456! -T test.txt ftp://letsdodevelopment.com
curl -u jitendraLDD:123456! -T "{test.txt,test2.txt}" ftp://letsdodevelopment.com
/* -T => Transfer file to destination; "jitendraLDD" is ftp-username, "123456!" is ftp-password and "letsdodevelopment.com" is ftp-host-name */

/*** Download a file from server through ftp protocol using curl ***/
curl -u jitendraLDD:123456! -O ftp://letsdodevelopment.com/index.php
/* Here "jitendraLDD" is ftp-username, "123456!" is ftp-password and "letsdodevelopment.com" is ftp-host-name */

/*** Get your public-ip-address: ip address provided by your ISP(internet service provider), not your local address ***/
curl ifconfig.me/ip

/* -------------------------------------------------------------------------------------------------- */

/*** PHP uses cURL ***/
PHP supports libcurl, a library created by Daniel Stenberg, that allows you to connect and communicate to many different types of servers with many different types of protocols.
libcurl currently supports the http, https, ftp, gopher, telnet, dict, file, and ldap protocols.
libcurl also supports HTTPS certificates, HTTP POST, HTTP PUT, FTP uploading (this can also be done with PHP's ftp extension that provides many ftp functions, for ex: ftp_put(), ftp_fput(), etc. in PHP), HTTP form based upload, proxies, cookies, and user+password authentication.

/* Example 1: using cURL in PHP */
/* some HTTPS/HTTP URL; HTTPS recommended; But if you supply HTTP URL here don't forgot to set CURLOPT_SSL_VERIFYPEER and CURLOPT_SSL_VERIFYHOST as FALSE. */
$url            = 'https://XXXXXX.com/XXXX';
/* For security, curl does HTTPS securely by default. Just make sure you do not disable certificate verification with CURLOPT_SSL_VERIFYPEER and CURLOPT_SSL_VERIFYHOST */

/* Initialize a cURL session: returns a cURL handle for use with other functions */
$ch             = curl_init($url);
$data_string    = json_encode($data);  //$data is an array having input data

/* Set options for cURL session: Look all these constants(like CURLOPT_CUSTOMREQUEST) detail in http://php.net/manual/en/function.curl-setopt.php i.e. under curl_setopt() manual. */
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
/* CURLOPT_RETURNTRANSFER: TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it directly. */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'Accept-Language: application/json'));
/* When you request a URL, you can sometimes be redirected to some other URL. In PHP it would be done with: header('Location: http://example.com/'); This directive instructs CURL to load that URL(means redirected URL) instead of the original one. There's normally no good reason to disable it. */
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
/* It is the maximum amount of time in seconds that is allowed to make the connection to the server(curl_init()). It can be set to 0 to disable this limit, but this is inadvisable in a production environment. */
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
/* It is the maximum amount of time in seconds to which a curl session consumes for total execution: i.e. make cURL connection to server(curl_init()), send input request to server and receive response from server(curl_exec()). It can be set to 0 to disable this limit for ex: when downloading a large file from server but this is inadvisable in a production environment. Thus CURLOPT_CONNECTTIMEOUT is only a part/segment of CURLOPT_TIMEOUT. */
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
/* It is equivalent to set header "Accept-Encoding:" (as Key/Value section under Headers in Postman). It supports encoding-values "identity", "deflate", and "gzip" for CURLOPT_ENCODING. If value of CURLOPT_ENCODING is set as empty string i.e. "" It sends a clear message for server that requester/http-client is ok to receive response in any one encoding-form of the 3 supported encodings. */
curl_setopt($ch, CURLOPT_ENCODING, "");
/* It is set TRUE to automatically set the Referer: field in requests where it follows a Location: redirect. Look CURLOPT_FOLLOWLOCATION and CURLOPT_MAXREDIRS comments as well to clear your concept for this option.*/
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
/* The maximum amount of HTTP redirections to follow if CURLOPT_FOLLOWLOCATION is set as TRUE. Suppose your curl requesting to a URL for response, but that redirects to another URL for response and this URL again finally redirects to another URL for response - here, means this type of redirection. */
curl_setopt($ch, CURLOPT_MAXREDIRS, 15);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

/* Execute cURL: It returns the result on success, FALSE on failure */
$response_json = curl_exec($ch);
/* Close cURL session */
curl_close($ch);
$response_array = json_decode($response_json, TRUE);
/* -------------------------------------------------------------------------------------------------- */
/* Example 2: using cURL in PHP */
/* Initialize a cURL session: returns a cURL handle for use with other functions */
$ch             = curl_init();
/* some HTTPS/HTTP URL; HTTPS recommended; But if you supply HTTP URL here don't forgot to set CURLOPT_SSL_VERIFYPEER and CURLOPT_SSL_VERIFYHOST as FALSE. */
$url            = 'http://XXXXXX.com/XXXX?id=456';
/* For security, curl does HTTPS securely by default. Just make sure you do not disable certificate verification with CURLOPT_SSL_VERIFYPEER and CURLOPT_SSL_VERIFYHOST */

/* Set options for cURL session: Look all these constants(like CURLOPT_CUSTOMREQUEST) detail in http://php.net/manual/en/function.curl-setopt.php i.e. under curl_setopt() manual. */
curl_setopt($ch, CURLOPT_URL, $url);
/* CURLOPT_RETURNTRANSFER: TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it directly. */
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('client-id:XXXXXXXX'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
/* When you request a URL, you can sometimes be redirected to some other URL. In PHP it would be done with: header('Location: http://example.com/'); This directive instructs CURL to load that URL(means redirected URL) instead of the original one. There's normally no good reason to disable it. */
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
/* FALSE to stop cURL from verifying the peer's certificate; Having value TRUE by default. */
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
/*
 * Value 1 to check the existence of a common name in the SSL peer certificate. 
 * 2 to check the existence of a common name and also verify that it matches the hostname provided.
 * 0 to not check the names.
 * In production environments the value of this option should be kept at 2 (default value).
 * This option has been removed in cURL version 7.28.1
 */
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

/* Execute cURL: It returns the result on success, FALSE on failure */
$response_json  = curl_exec($ch);
/**
 * Return a string containing the last error for the current session
 * 
 * Example:
 * $ch = curl_init('http://404.php.net/');
 * curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 * if(curl_exec($ch) === FALSE) {
 *     echo 'Curl error: ' . curl_error($ch);
 * } else {
 *     echo 'Operation completed without any errors';
 * }
 * curl_close($ch);
 * 
 * int curl_errno(resource $ch) => Return the last error number or 0 (zero) if no error occurred
 * To check if any error occurred in last cURL session or not
 * if(curl_errno($ch)) {
 *     echo 'Curl error: ' . curl_error($ch);
 * }
 * or
 * if(curl_exec($ch) === FALSE) //As above
 */
$error          = curl_error($ch);
/* Close cURL session */
curl_close($ch);

if ($error) {
    return json_decode($error, TRUE);
}
$response_array = json_decode($response_json, TRUE);
return $response_array;
