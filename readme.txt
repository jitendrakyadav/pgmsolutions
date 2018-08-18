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

/* A curl GET request to show 1 post with id=3; "-v" flag includes more words/sentences along with response to explain the same in more detail; verbose = using or containing too many words */           
curl -v http://jsonplaceholder.typicode.com/posts/3

/* Weather forecast information for a city */
curl wttr.in/delhi

/* If an URL needs credential to access, then use following */
curl -u username:password http://XXXXXX.com/XXXX

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

/* Go to web-page, right click on image and choose "Copy image address" and put here in command. It will download 2LDiENb.png file into current directory */         
curl -O https://i.imgur.com/2LDiENb.png

/* Rename the file which you want to download, now wrar560.exe will be downloaded as application.exe */
curl -o application https://www.rarlab.com/rar/wrar560.exe
                     
/* Here wrar560.exe will be downloaded with the same name */
curl -O https://www.rarlab.com/rar/wrar560.exe
               
/* Here what web-server provides for this URL(means same[content] as browser provides for this URL through web-server), created & stored in page.html */
curl -o page.html http://blog.ajindra.com/php/what-is-soap/   
/* Remember, curl download file or output data which web-server provides for that provided URL (as here used HTTP/HTTPS protocol) */  

/* It makes a HTTP POST request; "-X" option to provide a request type */
curl --data "title=Hello&body=Hello World" -X POST http://jsonplaceholder.typicode.com/posts 

/* A PUT request to update record for id=3; here in place of "--data", we can use "-d", means "--data"="-d" */
curl --data "title=Hello" -X PUT http://jsonplaceholder.typicode.com/posts/3 

/* A DELETE request to delete record with id=3 */
curl -X DELETE http://jsonplaceholder.typicode.com/posts/3 

/* -L flag is used to follow the redirection; http://google.com redirects to it's www version i.e. https://www.google.com */
curl -L http://google.com

/* Upload file/files to server through ftp protocol using curl */                                  
curl -u letsdodevelopment@hytechdev.com:let@tn=j! -T test.txt ftp://letsdodevelopment.com
curl -u letsdodevelopment@hytechdev.com:let@tn=j! -T "{test.txt,test2.txt}" ftp://letsdodevelopment.com
/* -T => Transfer file to destination; "letsdodevelopment@hytechdev.com" is ftp-username, "let@tn=j!" is ftp-password and "letsdodevelopment.com" is ftp-host-name */

/* Download a file from server through ftp protocol using curl */
curl -u letsdodevelopment@hytechdev.com:let@tn=j! -O ftp://letsdodevelopment.com/index.php
/* Here "letsdodevelopment@hytechdev.com" is ftp-username, "let@tn=j!" is ftp-password and "letsdodevelopment.com" is ftp-host-name */

/*** Get your public-ip-address: ip address provided by your ISP(internet service provider), not your local address ***/
curl ifconfig.me/ip


/*** PHP uses cURL ***/
PHP supports libcurl, a library created by Daniel Stenberg, that allows you to connect and communicate to many different types of servers with many different types of protocols.
libcurl currently supports the http, https, ftp, gopher, telnet, dict, file, and ldap protocols.
libcurl also supports HTTPS certificates, HTTP POST, HTTP PUT, FTP uploading (this can also be done with PHP's ftp extension that provides many ftp functions, for ex: ftp_put(), ftp_fput(), etc. in PHP), HTTP form based upload, proxies, cookies, and user+password authentication.

/* Example 1: using cURL in PHP */
$url            = 'http://XXXXXX.com/XXXX';      //some HTTP URL
$ch             = curl_init($url);
$data_string    = json_encode($data);  //$data is an array having input data

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_ENCODING, "");
curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
curl_setopt($ch, CURLOPT_MAXREDIRS, 15);

$response_json = curl_exec($ch);
curl_close($ch);
$response_array = json_decode($response_json, TRUE);

/* Example 2: using cURL in PHP */
$ch             = curl_init($url);
$url            = 'http://XXXXXX.com/XXXX?id=456';      //some HTTP URL

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('client-id:XXXXXXXX'));
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

$response_json  = curl_exec($ch);
$error          = curl_error($ch);
curl_close($ch);

if ($error) {
    return json_decode($error, TRUE);
}
$response_array = json_decode($response_json, TRUE);
return $response_array;



