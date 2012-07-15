mvpn
====
With Mvpn you can manage your OpenVPN server easly.
All simple feature to manage multi OpenVPN server like add/remove server or user are already implemented. If you want a new feature, contact us with our twitter account and we discuss about it.


Installation:
====
>$cd /var/www

>$git clone https://github.com/bewiwi/mvpn.git

>$cd mvpn

Edit the database config file with your database information with :
>$vi ./mvpn/classes/manager/pdo/AbstractPdoManager.class.php

And insert mvpn.sql into the database

Next you must configure your web server
ex with apache :

    <VirtualHost *:80>
	    ServerName mvpn
	    ServerAdmin webmaster@localhost
	    DocumentRoot /var/www/mvpn

	    <Directory /var/www/mvpn>
                Options Indexes FollowSymLinks MultiViews
                AllowOverride All
                Order allow,deny
                allow from all
	    </Directory>

    </VirtualHost>


Now  you can access to the interface.

Contact
====
Twitter : @My_VPN
