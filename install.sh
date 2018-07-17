

#!/bin/sh

LOG="log.txt"

touch $LOG

echo "===============================================================" > $LOG

echo "Installer Script Starting" >> $LOG

echo " Installing Python development environment" >> $LOG
sudo apt-get update
sudo apt-get -y install python-dev python-pip
sudo pip install --upgrade distribute


echo "Installing Necessary Packages" >> $LOG

sudo pip install validate_email
sudo pip install pyDNS
sudo apt-get install python-dns-resolver

echo "Finished Installing the packages" >> $LOG

echo "===============================================================" > $LOG

