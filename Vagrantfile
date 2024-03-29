Vagrant.configure(2) do |config|
    config.vm.box = "ubuntu/focal64"
    config.vm.define "php82-mysql-phpmyadmin-composer" do |db|
        db.vm.network "private_network", ip: "192.168.56.17"
        db.vm.network "forwarded_port", guest: 80, host: 8310
        db.vm.network "forwarded_port", guest: 3306, host: 3309
        db.vm.synced_folder ".", "/var/www/html"
        db.vm.provision "shell", inline: <<-SHELL
            apt-get update
            apt-get install vim curl build-essential python-software-properties git

            sudo apt install ca-certificates apt-transport-https software-properties-common lsb-release -y

            sudo add-apt-repository ppa:ondrej/php -y

            sudo apt update
            sudo apt upgrade

            yes Y | sudo apt -y install php8.2 php8.2-cli php8.2-common php8.2-mysql php8.2-zip php8.2-curl php8.2-gd php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-bz2 php8.2-intl

            yes Y | sudo apt -y  install php8.2-xdebug php8.2-pcov php8.2-dev

            yes Y | apt-get -y install libapache2-mod-php8.2 apache2 

            sudo a2enmod rewrite

            sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf

            # mode développement
            sed -i "s/error_reporting = .*/error_reporting = E_ALL/" /etc/php/8.2/apache2/php.ini
            sed -i "s/display_errors = .*/display_errors = On/" /etc/php/8.2/apache2/php.ini

            service apache2 restart

            # composer

            php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
            php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
            php composer-setup.php
            php -r "unlink('composer-setup.php');"

            sudo mv composer.phar /usr/local/bin/composer

            #mysql + phpmyadmin

            DBHOST=localhost
            DBNAME=blog
            DBUSER=demo
            DBPASSWD=demo

            apt-get update
            apt-get install vim curl build-essential python-software-properties git

            debconf-set-selections <<< "mysql-server mysql-server/root_password password $DBPASSWD"
            debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $DBPASSWD"
            debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
            debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $DBPASSWD"
            debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $DBPASSWD"
            debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $DBPASSWD"
            debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none"

            # install mysql and admin interface

            apt-get -y install mysql-server phpmyadmin

            mysql -uroot -p$DBPASSWD -e "CREATE DATABASE $DBNAME"
            mysql -uroot -p$DBPASSWD -e "grant all privileges on $DBNAME.* to '$DBUSER'@'localhost' identified by '$DBPASSWD'"

            # update mysql conf file to allow remote access to the db

            sudo sed -i "s/.*bind-address.*/bind-address = 0.0.0.0/" /etc/mysql/mysql.conf.d/mysqld.cnf

            # echo "\$cfg['SendErrorReports'] = 'never';" >> /etc/phpmyadmin/config.inc.php

            sudo service mysql restart
        SHELL
    end
end   