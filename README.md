# CTF
UOSec CTF Web Resources

# Web Challenges: (/var/www/challenge#)
	Each web challenge has it's own web root in the /var/www/ directory. Each of the web roots is managed by Apache2 via Virtual Hosts.

	Creating your own web challenge:
	* Make a new directory in /var/www/ and make sure it has the same permissions and ownership as the other challenges.
	* Create an index.php file in the new challenge directory
	* Configure apache to forward traffic to your new challenge:
		$ cd /etc/apache2/
		$ vim ports.conf (add a "Listen <port number>" line to the file)
		$ vim sites-enabled/000-default.conf (add a new virtual host for the port you specified in ports.conf)
		$ service apache2 restart

	* Now login to the AWS EC2 console and edit the Inbound Traffic rules of the CTF security group to allow Custom TCP Traffic on the port for your virtual host.
	* Check that your new virtual host is working by going to http://ec2-35-167-126-129.us-west-2.compute.amazonaws.com:<port number>
	* If all is well, your index.php should be served :)

# Adding a flag to the Database:
	In the /var/www/_installation/ directory is a series of .sql files used to create and modify the database. To add a flag, you can use the 05-fill-challenges-table.sql file.

	* The challenge flags and info is in the CTF.challenges database where each row has the following fields:
		> UNIQUE int(11)	`chal_id`
		> varchar(64)		`chal_name`
		> int(11)		`chal_points`
		> varchar(64)		`chal_flag`

	* Edit the file to add an entry to the CTF.challenges database:
		$ vim 05-fill-challenges-table.sql
		$ 

# Native Challenges: (/home/ubuntu/CTF_Challenges)

