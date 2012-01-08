#!/bin/bash

D=`date '+%Y%m%d%H%M%S'`
FNAME="asepbackup-live"
DUMP="/usr/local/bin/mysqldump"
BZ="/usr/bin/bzip2"
  
echo "Content-Type: application/octet-stream"
echo "Content-Disposition: attachment;filename=\"${FNAME}-${D}.sql.bz2\""
echo 'Cache-Control: max-age=0'
echo

mysqldump -uroot -ptesting asep| bzip2 -c
