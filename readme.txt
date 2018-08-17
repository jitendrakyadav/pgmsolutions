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

/*** A website that provides fake online REST API for testing and prototyping: http://jsonplaceholder.typicode.com/. We can test here GET, POST, PUT, DELETE API requests. ***/
curl http://jsonplaceholder.typicode.com/posts            /* A curl GET request to show 100 posts */
curl http://jsonplaceholder.typicode.com/posts/3          /* A curl GET request to show 1 post with id=3 */
curl -i http://jsonplaceholder.typicode.com/posts/3       /* It includes header information as well to show along with post-data */
curl --head http://jsonplaceholder.typicode.com/posts/3   /* It shows only header information & excludes post-data */
or
curl -I http://jsonplaceholder.typicode.com/posts/3       /* It shows only header information & excludes post-data */
curl -o post-data.txt http://jsonplaceholder.typicode.com/posts  /* It gets all 100 posts data and output/put into a newly created file post-data.txt in current directory */
curl -O http://jsonplaceholder.typicode.com/posts         /* It gets all 100 posts data and output/put into a newly created file posts(i.e. last part of URL; with no extension) in current directory */
curl -O https://i.imgur.com/2LDiENb.png                   /* Go to web-page, right click on image and choose "Copy image address" and put here in command. It will download 2LDiENb.png file into current directory */
curl --data "title=Hello&body=Hello World" -X POST http://jsonplaceholder.typicode.com/posts /* It makes a HTTP POST request; "-X" option to provide a request type */
curl --data "title=Hello" -X PUT http://jsonplaceholder.typicode.com/posts/3 /* A PUT request to update record for id=3; here in place of "--data", we can use "-d", means "--data"="-d" */
curl -X DELETE http://jsonplaceholder.typicode.com/posts/3 /* A DELETE request to delete record with id=3 */
curl -L http://google.com                                  /* -L flag is used to follow the redirection; http://google.com redirects to it's www version i.e. https://www.google.com */
curl -u jitendray@ajindra.com:123456! -T test.txt ftp://ajindra.com /* Upload a file to server through ftp protocol using curl */