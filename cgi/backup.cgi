#!/bin/bash

D=`date '+%Y%m%d%H%M%S'`
FNAME="asepbackup-dev"

echo "Content-Type: application/octet-stream"
echo "Content-Disposition: attachment;filename=\"${FNAME}-${D}.sql.bz2\""
echo 'Cache-Control: max-age=0'
echo

mysqldump -uroot -ptesting asep| bzip2 -c
