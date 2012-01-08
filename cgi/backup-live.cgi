#!/bin/bash

D=`date '+%Y%m%d%H%M%S'`
FNAME="asepbackup-live"
DUMP="/usr/local/bin/mysqldump"
BZ="/usr/bin/bzip2"
USER="asep"
PW="students"
DB="asep"
HOST="ken.db"

echo "Content-Type: application/octet-stream"
echo "Content-Disposition: attachment;filename=\"${FNAME}-${D}.sql.bz2\""
echo 'Cache-Control: max-age=0'
echo

$DUMP  -h${HOST} -u${USER} -p${PW} ${DB}| ${BZ}  -c
