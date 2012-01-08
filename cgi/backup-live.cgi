#!/bin/bash

D=`date '+%Y%m%d%H%M%S'`
FNAME="asepbackup-live"
DUMP="/usr/bin/mysqldump"
BZ="/bin/bzip2"
USER="asep"
PW="students"
DB="asep"

echo "Content-Type: application/octet-stream"
echo "Content-Disposition: attachment;filename=\"${FNAME}-${D}.sql.bz2\""
echo 'Cache-Control: max-age=0'
echo

$DUMP  -u${USER} -p${PW} ${DB}| ${BZ}  -c
