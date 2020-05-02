FROM php:7.0.33-apache

RUN apt-get update && apt-get install zip unzip wget libaio1 git -y

# Install Oracle Instantclient
#   && ln -s /opt/oracle/instantclient_19_6/libclntsh.so.12.1 /opt/oracle/instantclient_19_6/libclntsh.so /
#    && ln -s /opt/oracle/instantclient_19_6/libocci.so.12.1 /opt/oracle/instantclient_19_6/libocci.so /

RUN mv /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

RUN mkdir /opt/oracle 

RUN cd /opt/oracle 

RUN wget https://download.oracle.com/otn_software/linux/instantclient/19600/instantclient-basic-linux.x64-19.6.0.0.0dbru.zip 

RUN wget https://download.oracle.com/otn_software/linux/instantclient/instantclient-sdk-linuxx64.zip 

RUN unzip instantclient-basic-linux.x64-19.6.0.0.0dbru.zip -d /opt/oracle 

RUN unzip instantclient-sdk-linuxx64.zip -d /opt/oracle 

RUN ln -s /opt/oracle/instantclient_19_6/libclntshcore.so.12.1 /opt/oracle/instantclient_19_6/libclntshcore.so 

RUN sh -c "echo /opt/oracle/instantclient_19_6 >/etc/ld.so.conf.d/oracle-instantclient.conf" 

RUN ldconfig 

RUN export LD_LIBRARY_PATH=/opt/oracle/instantclient_19_3:$LD_LIBRARY_PATH 

RUN export PATH=/opt/oracle/instantclient_19_3:$PATH 

RUN mkdir -p /opt/oracle/instantclient_12_2/network/admin 

RUN rm -rf /opt/oracle/*.zip

RUN git clone https://github.com/herberthnilsen/opb.git
    
RUN unzip -o /var/www/html/opb/Wallet_dbPJB.zip -d /opt/oracle/instantclient_19_6/network/admin

RUN unzip -o /var/www/html/opb/Wallet_dbPJB.zip -d /opt/oracle/instantclient_12_2/network/admin

RUN mkdir /opt/zend && cd /opt/zend

# Install Oracle extensions

RUN docker-php-ext-configure pdo_oci --with-pdo-oci=instantclient,/opt/oracle/instantclient_19_6 

RUN echo 'instantclient,/opt/oracle/instantclient_19_6/' | pecl install oci8

RUN docker-php-ext-install pdo_oci 

RUN docker-php-ext-enable oci8

RUN a2enmod rewrite

RUN rm /etc/apache2/sites-enabled/000-default.conf && cp /var/www/html/opb/app/zend.conf /etc/apache2/sites-enabled/

#VOLUME C:/Users/hnilsen/Documents/Clientes/PJBank/POC/app/:/var/www/html
 
EXPOSE 80:80

