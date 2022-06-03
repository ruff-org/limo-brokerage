# Limo Brokerage Abstract

## Modules

1. Reservation #, Vendor Name, Customer Name, Pickup Date, Pickup Info, Drop Off Info, Pickup Time
	** Notes: 
	- Dropoff Time omitted because it is variable & derived from pickup time
	- Pickup info stores pickup address (formatted ADDR# STREET NAME, CITY, STATE ZIP); but may also include additional info
	- Pickup date is stored in DB as a MYSQL_DATE type; w/ format ['YYYY-MM-DD'] (https://dev.mysql.com/doc/refman/8.0/en/datetime.html)
	- Pickup time is stored as a MYSQL_VARCHAR type LIMIT(255); w/ format ['HH:MM AM/PM']. Timezone is to be implicitly inferred (based on global timezone)	
	- Driver is assigned the reservation via a JOIN operation; wherein a default of '0' implies "NOT-ASSIGNED"
2. Driver vehicle, Vehicle Color, Passenger Limit, Service type, Total cost
	** Notes:
	- Driver vehicle is stored as both a year/make/model w/ format ['YEAR MAKE MODEL'] & image w/ format ['URL']
	- Total cost is stored as a varchar w/ format ['$DOLLAR.CENTS']
3. Service Rules
4. Assign driver to reservation
5. Generate and/or set total_cost of trip
6. Generate "Magic Link"
	** Notes:
	- Every magic link has a unique token, which allows the user to access the information in their browser
	- A magic link may either be "active" (visible) or inactive (not visible)
7. Send via email

## DB Tables

`reservations`
id				   = INT(11) PRIMARY *AI*
vendor_name  	   = Varchar(255)
customer_name 	   = Varchar(255)
customer_email	   = Varchar(255)
reservation_number = Varchar(255) UNIQUE
pickup_date   	   = DATE
pickup_time		   = Varchar(255)
pickup_info		   = Varchar(255)
driver			   = INT(11) DEFAULT '0'

`drivers`
id				   = INT(11) PRIMARY *AI*
vehicle_info	   = Varchar(255)
vehicle_image	   = Varchar(255)
vehicle_color	   = Varchar(255)
pass_limit		   = INT(11)
service_type	   = Varchar(255)
total_cost		   = Varchar(255) DEFAULT '$0.00'

`rules`
id				   = INT(11) PRIMARY *AI*
title			   = Varchar(255)
description		   = TEXT

`magic_links`
id				   = INT(11) PRIMARY *AI*
token			   = Varchar(255)
reservation		   = INT(11)
active			   = ENUM('0', '1') DEFAULT '1'