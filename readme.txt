Timestamp:

It is the current time measured in the number of seconds since January 1 1970 00:00:00 GMT. 
Means, it is the difference of current-time and the time that was at 01-Jan-1970 00:00:00 GMT. 
Timestamp is calculated on same timezone. Example: a date-time like 22-Oct-2018 04:00:00PM for which you want to calculate timestamp in timezone GMT+05:30:00 = (22-Oct-2018 04:00:00PM in timezone GMT+05:30:00 in seconds) - (01-Jan-1970 00:00:00 in timezone GMT+05:30:00 in seconds) = Time duration between two dates with same timezone in seconds [Look timestamp-and-timezone-concept.pdf]. PHP's various date & time functions take care of all these things automatically i.e. like mktime(), just input here your date-time it would output you timestamp in seconds using current working timezone. Don't need to add like 5*3600+1800 or 3600 or subtract 5*3600 to get timestamp of a particular date-time in a particular timezone, just change timezone using function date_default_timezone_set() and use various date & time functions like mktime(), PHP would adjust/balance all other things and output you correct timestamp for that particular date-time and timezone.  
Remember, At the moment 01-Jan-1970 00:00:00AM GMT, in timezone GMT+05:30:00, clock shows time 01-Jan-1970 05:30:00AM or in other words we can say 5 hours & 30 minutes before timezone GMT+05:30:00 clock had been shown time 01-Jan-1970 00:00:00AM. That's why at 01-Jan-1970 00:00:00AM GMT, timestamp in timezone GMT+05:30:00 is -(5*3600+1800)=-19800 
Important points:
1. For same date-time like 2018-10-22 04:00:00 PM, different timezones have different value of timestamp. Timezones having GMT+ value would have lower timestamp value rather than timezones having GMT- value [Look timestamp-and-timezone-concept.pdf].
   Example: For dates 1970-01-01 00:00:00 AM and 1970-01-01 06:30:00 AM
   a. For timezone "GMT+05:30" or "Asia/Kolkata":
   	echo mktime(0,0,0,1,1,1970);	//Output: -19800 i.e. -(5*3600+1800) i.e. -(5 Hours + 30 minutes)
	//hour,minute,second,month,day,year
   	echo mktime(6,30,0,1,1,1970);   //Output: 3600 i.e. 1 Hour
   b. For "GMT+01" or "Europe/Berlin"
	echo mktime(0,0,0,1,1,1970);	//Output: -3600 i.e. -(1 Hour)
   	echo mktime(6,30,0,1,1,1970);  	//Output: 19800 i.e. (5*3600+1800) i.e. (5 Hours + 30 minutes)
   c. For "GMT-05" or "US/Eastern"
	echo mktime(0,0,0,1,1,1970);	//Output: 18000 i.e. (5*3600) i.e. 5 Hours
   	echo mktime(6,30,0,1,1,1970);  	//Output: 41400 i.e. (11*3600+1800) i.e. (11 Hours + 30 minutes)
   d. For "GMT+0"
	echo mktime(0,0,0,1,1,1970);	//Output: 0
   	echo mktime(6,30,0,1,1,1970);  	//Output: 23400 i.e. (6*3600+1800) i.e. (6 Hours + 30 minutes)
2. For same timestamp value, different timezones have different date-time. Timezones having GMT+ value would have bigger date-time rather than timezones having GMT- value for the same timestamp.
   Example: Let's see for 1 & (6*3600) seconds timestamp values, what date-time different timezones return.
   a. For timezone "GMT+05:30" or "Asia/Kolkata":
   	echo date("Y-m-d h:i:s A", 1);		//Output: 1970-01-01 05:30:01 AM
	//h => 12 hours format, H => 24 hours format, a => am/pm, A => AM/PM
   	echo date("Y-m-d h:i:s A", (6*3600));	//Output: 1970-01-01 11:30:00 AM
   b. For timezone "GMT+01" or "Europe/Berlin":
   	echo date("Y-m-d h:i:s A", 1);		//Output: 1970-01-01 01:00:01 AM
   	echo date("Y-m-d h:i:s A", (6*3600));	//Output: 1970-01-01 07:00:00 AM
   c. For timezone "GMT-05" or "US/Eastern":
   	echo date("Y-m-d h:i:s A", 1);		//Output: 1969-12-31 07:00:01 PM
   	echo date("Y-m-d h:i:s A", (6*3600));	//Output: 1970-01-01 01:00:00 AM
   d. For timezone "GMT+0":
   	echo date("Y-m-d h:i:s A", 1);		//Output: 1970-01-01 00:00:01 AM
   	echo date("Y-m-d h:i:s A", (6*3600));	//Output: 1970-01-01 06:00:00 AM
3. time(): This function returns current timestamp for current working timezone.
   Example:
   echo date("Y-m-d h:i:s A", time());		//Output: 2018-10-22 04:47:52 PM
4. strtotime(): This function parse any English textual datetime description into a Unix timestamp.
   Example:
   echo strtotime("now");
   echo strtotime("10 September 2000");
   echo strtotime("+1 day");
   echo strtotime("-1 day");
   echo strtotime("+1 week");
   echo strtotime("+1 week 2 days 4 hours 2 seconds");
   echo strtotime("next Thursday");
   echo strtotime("last Monday");
5. date_default_timezone_get(): This function provides you current working timezone at your system/machine/server.
   Example:
   echo date_default_timezone_get();		//Output: Asia/Kolkata    (which is GMT+05:30)
6. date_default_timezone_set(): This function sets the default timezone used by all date/time functions in a script. 
   Example:
   date_default_timezone_set("Europe/Berlin");	//GMT+01 
   date_default_timezone_set("US/Eastern");	//GMT-05
   date_default_timezone_set("Asia/Kolkata");	//GMT+05:30
7. date-time functions & timezone are also explained at Page No.-19,66.
8. Manipulating date & time in an object-oriented way i.e. using "DateTime" class: In 24 hours format, midnight is represented as 00:00:00 and in 12 hours format, midnight is represented by 12:00:00AM. H => 24 hours format, h => 12 hours format.
   Reference: http://php.net/manual/en/class.datetime.php
   Example: 
   $dt = new DateTime();
   $dt->setTimestamp(1539196200);
   echo $dt->format("Y-m-d H:i:s")." ".date_default_timezone_get()."\n";	
   //Output(in 24 hours format): 2018-10-11 00:00:00 Asia/Kolkata
   echo $dt->format("Y-m-d h:i:s A")." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format): 2018-10-11 12:00:00 AM Asia/Kolkata
   $dt->setTimestamp(1539196200+1);
   echo $dt->format("Y-m-d H:i:s")." ".date_default_timezone_get()."\n";	
   //Output(in 24 hours format): 2018-10-11 00:00:01 Asia/Kolkata
   echo $dt->format("Y-m-d h:i:s A")." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format): 2018-10-11 12:00:01 AM Asia/Kolkata
   $dt->setTimestamp(1539196200+3601);
   echo $dt->format("Y-m-d H:i:s")." ".date_default_timezone_get()."\n";	
   //Output(in 24 hours format): 2018-10-11 01:00:01 Asia/Kolkata
   echo $dt->format("Y-m-d h:i:s A")." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format): 2018-10-11 01:00:01 AM Asia/Kolkata
   $dt->setTimestamp(1539196200+13*3600);
   echo $dt->format("Y-m-d H:i:s")." ".date_default_timezone_get()."\n";
   //Output(in 24 hours format): 2018-10-11 13:00:00 Asia/Kolkata
   echo $dt->format("Y-m-d h:i:s A")." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format); 2018-10-11 01:00:00 PM Asia/Kolkata
   echo date("Y-m-d h:i:s A")." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format): 2018-10-23 11:17:36 AM Asia/Kolkata
   echo date("Y-m-d h:i:s A", strtotime("-1 day"))." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format): 2018-10-22 11:17:36 AM Asia/Kolkata

   Above in procedural way:
   echo date("Y-m-d H:i:s", (1539196200))." ".date_default_timezone_get()."\n";
   //Output(in 24 hours format): 2018-10-11 00:00:00 Asia/Kolkata
   echo date("Y-m-d h:i:s A", (1539196200))." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format): 2018-10-11 12:00:00 AM Asia/Kolkata
   echo date("Y-m-d H:i:s", (1539196200+13*3600))." ".date_default_timezone_get()."\n";
   //Output(in 24 hours format): 2018-10-11 13:00:00 Asia/Kolkata
   echo date("Y-m-d h:i:s A", (1539196200+13*3600))." ".date_default_timezone_get()."\n";
   //Output(in 12 hours format); 2018-10-11 01:00:00 PM Asia/Kolkata
