#!/bin/sh
SSHPASS='Embe1mpls'
SSHHOST=$1
SSH_DAEMON_NAME=$2
SSHUSER='root'
SSHTOUT=$3

echo $SSHHOST
sshpass -p "Embe1mpls" ssh -o ConnectTimeout=$SSHTOUT -o StrictHostKeyChecking=no root@$SSHHOST << ENDHERE
cd /var/tmp/
show_trace.py -a $2 > $1.log
chmod 777 $1.log
exit
ENDHERE
sshpass -p "Embe1mpls" scp -v -o ConnectTimeout=$SSHTOUT -o StrictHostKeyChecking=no $SSHUSER@$SSHHOST:/var/tmp/$1.log /var/tmp/file_location_elk 2>&1
