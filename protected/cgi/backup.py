#!/usr/bin/env python

import cgi
import datetime
import os
import sys
import cgitb; cgitb.enable()  # for troubleshooting

print "Content-Type: application/octet-stream"
print 'Content-Disposition: attachment;filename="%s-%s.sql.bz2"' %(
    'asep-live-backup',
    datetime.datetime.today().strftime('%Y%m%d%H%M%S'))
print 'Cache-Control: max-age=0'
print

# ok, now the data
received=0

#"mysqldump -uroot -ptesting asep| bzip2 -c"

input=os.popen("ls -la")

dat=input.read(512)
while dat != "":
    received=received + len(dat)
    sys.stdout.write(dat)


#"mysqldump -uroot -ptesting asep| bzip2 -c"
