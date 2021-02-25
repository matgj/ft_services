#!/bin/ash
#runs in background, doesn't create nohup.out
nohup ./init_mysql.sh > /dev/null 2>&1 &

#If are not in domain controller, dont search for hostnames to improve performance responses (ideal for local only servers)
sed -i 's/skip-networking/#skip-networking/g' /etc/my.cnf.d/mariadb-server.cnf

#run standard mariadb script installation 
/usr/bin/mysql_install_db --user=mysql --datadir="/var/lib/mysql"

#Initialize the main mysql database, and the data dir as standardized 
/usr/bin/mysqld_safe --datadir="/var/lib/mysql"