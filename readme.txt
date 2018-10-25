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
man curl

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
curl --data "employee_id=12345&card_number=1234567891" -X POST http://127.0.0.1:9091/api/validateCard
/* 
Provide input data as json: 
Look {'employee_id':'12345'} is not a valid json data; 
Remember: parameters must be always enclosed with double-quotation mark, enclosed any parameter/value with single-quotation mark makes it invalid json data. 
{"employee_id":"12345","card_number":"1234567891"}	//valid json data - all parameter/value within double-quotation mark
{"employee_id":12345,"card_number":"1234567891"}	//valid json data - integer values are allowed without any quotation mark
{"employee_id" :12345,"card_number": "1234567891"}	//valid json data - space are allowed between parameter & colon as well as between colon & parameter's value; but as per best practises, don't leave any space from starting of json-data string to the till it's end. PHP's json_encode() follows the same practise. For many type of json encode & decode examples, look into json_encode_decode_examples.php; for more, look on page no. 68-81 specially on page no. 77 under branch php_concepts_and_programming.
{"employee_id":'12345','card_number':"1234567891"}	//invalid json data - single quotation mark is not allowed anywhere either for parameter or it's value
*/
curl --data '{"card_number":"1234567891"}' -X POST http://127.0.0.1:8443/api/validateCard
/* with multiple parameters like employee_id & card_number for data here: Remember --data = -d */
curl -d '{"employee_id":12345,"card_number":"1234567891"}' -X POST http://127.0.0.1:8443/api/validateCard
/* Add header option as well */
curl --header "Content-Type: application/json" --data '{"card_number":"1234567891"}' -X POST http://127.0.0.1:8443/api/validateCard
/* Add multiple headers: Remember --header = -H */
curl -H "Content-Type: application/json" -H "Accept: application/json" -H "Accept-Language: application/json" -d '{"card_number":"1234567891"}' -X POST http://127.0.0.1:8443/api/validateCard
Note: To know & use more options like -d, -H for curl, use command "curl --help".

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

/* -------------------------------------------------------------------------------------------------- */

"wget" (a linux file downloader) command: 
Reference: a. https://youtu.be/YkEiEYwYQho
	   b. https://www.computerhope.com/unix/wget.htm

1. wget stands for "web get". It is a command-line utility which downloads files over a network/internet.
2. wget has been designed for robustness over slow or unstable network/internet connections; if a download fails due to a network/internet problem, it will keep retrying until the whole file has been retrieved. If the server supports regetting, it will instruct the server to continue the download from where it left off.
3. wget is a free utility for non-interactive download of files from the web. It supports HTTP, HTTPS, and FTP protocols, as well as retrieval through HTTP proxies.
Note: Proxy Server: A proxy server is a dedicated computer or a software system running on a computer that acts as an intermediary between an endpoint-device/client-machine, such as a computer, and another server from which a user or client is requesting a service. The proxy server may exist in the same machine as a firewall server or it may be on a separate server, which forwards requests through the firewall.
4. wget is non-interactive, meaning that it can work in the background, while the user is not logged on, which allows you to start a retrieval and disconnect from the system (i.e. sign-out/log-out for your user in the system/machine/server), letting wget finish the work. While just opposite of it, most web browsers require constant user interaction, which makes transferring a lot of data difficult.
5. wget can follow links in HTML and XHTML pages and create local versions of remote websites, fully recreating the directory structure of the original site, which is sometimes called "recursive downloading". While doing that, wget respects the Robot Exclusion Standard (robots.txt). wget can be instructed to convert the links in downloaded HTML files to the local files for offline viewing.
Note: The robots exclusion standard, also known as the robots exclusion protocol or simply robots.txt, is a standard used by websites to communicate with web crawlers and other web robots. The standard specifies how to inform the web-robot/web-crawler about which areas of the website should not be processed or scanned. Robots/web-robots/web-crawlers are often used by search engines to categorize websites. Not all robots cooperate with the standard; email harvesters, spambots, malware, and robots that scan for security vulnerabilities may even start with the portions of the website where they have been told to stay out.

/*** 1.Get/Read "wget" help(to see all available options for wget like -O, -c, etc.) & manual ***/
wget --help
man wget

/*** 2.Basic command: Download a 56MB file using the link ***/
wget https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm

/*** 3.Download the file with different name: use capital "O", small "o" would not work here. If you use only "google_chrome" without extension in following command instead of "google_chrome.rpm" then generated file would be without extension i.e. google_chrome instead of google_chrome.rpm ***/
wget -O google_chrome.rpm https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm

/*** 4.Downloading multiples files with different protocol using a single command: Here 2 different protocols are HTTPS & HTTP ***/
wget https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm http://ftp.gnu.org/gnu/emacs/elisp-manual-21-2.8.tar.gz

/*** 5.Downloading multiple files using a text file: Put all file-links that needs to be downloaded in a text file like file-links-need-to-download.txt, one link per line then use following command. Here "-i" indicates input-file. ***/
wget -i file-links-need-to-download.txt

/*** 6.Download an incomplete file which had been stopped/dis-continued in past due to some manual interruption ***/
wget https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm
Note: when file(suppose, it is a large file having size 800MB or 1.5GB) downloading is in progress, press "Ctrl+c" to stop/terminate downloading, reason might be, this process consuming more internet bandwidth & due to it your other importanr works are hampering which needed full internet-bandwidth/internet-speed. Now you return back to 8PM when all office-employees has left for home and no-fear now of more consumption of internet-bandwidth; so continue again the remaining file-download process exactlly from that point where it was interrupted like if 300MB out of 800MB is downloaded then it must continue downloading from 301th MB of data up to 800MB not again from 1st MB of data up to 800MB. In following command, -c => --continue => resume getting a partially-downloaded file. You can repeat this terminate/resume process as many times as you want.
wget -c https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm

/*** 7.Setting maximum/highest network-bandwidth/internet-bandwidth/internet-speed limit while downloading a file ***/
wget --limit-rate=100k http://ftp.gnu.org/gnu/emacs/elisp-manual-21-2.8.tar.gz
Note: Just in previous case, avoid important works hampering due to more consumption of internet-bandwidth for a large file download, now you might bound your particular large-file-download internet-consumption-bandwidth as small as you want and let it work in a corner for some more longer time without hampering other important works due to lower-internet-bandwidth/slower-internet-speed. Press "Ctrl+c" to terminate the above download and run the following command to resume/again-continue the remaining download with lower internet-bandwidth i.e. from 100k to now 10k:
wget -c --limit-rate=10k http://ftp.gnu.org/gnu/emacs/elisp-manual-21-2.8.tar.gz

/*** 8.Run downloading process in background: Run just following command and if you want you could be signoff/logout with your user but machine should be running i.e. not get shutdown; wget continues download-process in background, completes it & writes the whole download-process report moment by moment in a log file "wget-log" created in current-directory. In following command, -b => --background => go to background after startup ***/
wget -b https://dl.google.com/linux/direct/google-chrome-stable_current_x86_64.rpm

/*** 9.Downloading the whole website: Following command copies all the pages linked with https://www.howtopronounce.com/ ***/
wget --execute robots=off --recursive --no-parent --continue --no-clobber https://www.howtopronounce.com/

/*** 10.Download mp4 file using the link ***/
wget --level=1 --recursive --no-parent --accept mp4,MP4 http://download.wavetlan.com/SVV/Media/HTTP/http-mp4.htm


