Timestamp:
It is the current time measured in the number of seconds since January 1 1970 00:00:00 GMT. Means, it is the difference of current-time and the time that was at 01-Jan-1970 00:00:00 GMT. Timestamp would be calculated on same zone, for example: a date-time for which you want to calculate timestamp in GMT+05:30:00 then 01-Jan-1970 00:00:00 AM you must assume on same timezone, then timestamp i.e. time-difference in seconds, would be proper/correct [Look timestamp-and-timezone-concept.pdf].
Important points:
1. For same date-time like 2018-10-22 04:00:00 PM, different timezones have different value of timestamp. Timezones having GMT+ value would have lower timestamp value rather than timezones having GMT- value [Look timestamp-and-timezone-concept.pdf].
   Example: For dates 1970-01-01 00:00:00 AM and 1970-01-01 06:30:00 AM
   a. For timezone "GMT+05:30" or "Asia/Kolkata":
   	echo mktime(0,0,0,1,1,1970);	//Output: -19800 i.e. -(5*3600+1800) i.e. -(5 Hours + 30 minutes)
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
