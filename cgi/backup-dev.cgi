#!/bin/bash

D=`date '+%Y%m%d%H%M%S'`
FNAME="asepbackup-dev"
DUMP="/usr/bin/mysqldump"
BZ="/bin/bzip2"
USER="root"
PW="testing"
DB="asep"
HOST="127.0.0.1"

echo "Content-Type: application/octet-stream"
echo "Content-Disposition: attachment;filename=\"${FNAME}-${D}.sql.bz2\""
echo 'Cache-Control: max-age=0'
echo

$DUMP  -h${HOST} -u${USER} -p${PW} ${DB}| ${BZ}  -c
