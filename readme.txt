Case Study:
	1. When you are making DB connection from PHP, mention port no. as following:
		$conn = new PDO('mysql:dbname=annual_bash;port=3307;host=127.0.0.1', 'root', '');
		$conn = new mysqli('127.0.0.1', 'root', '', 'annual_bash', 3307);
	If you not mention port as in above, MySQL would use implicitly it's default port 3306
	2. Remember, we are using above credential from installed MySQL server own DB:"mysql";table:"user"
	3. This "user" table must have entry of above host, username, password; and this username must have permission to access above mentioned database on mentioned port as well otherwise you would get connection error something like "MySQL refusing connection".
	4. Example: 
		a. MySQL server under xampp in Windows, has entry for host "localhost" and "127.0.0.1" both so you can use any one of the available 2 hosts to connect the DB.
		b. MySQL server in Ubuntu, has entry only for host "localhst", so you can't use above mentioned host "127.0.0.1". If you want to use this IP:127.0.0.1 or any other IP as host, you would have to insert a new record in MySQL server own DB "mysql" in table "user" having this IP as host with proper username(or same username)/password providing access permission for the database; for this stuff like creating user & to provide privileges, please read section "Create an user in mysql" under branch "frequently_used_linux_commands".
