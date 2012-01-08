#!/usr/bin/env python
import cgi
import datetime
import os
import cgitb; cgitb.enable()  # for troubleshooting

print "Content-Type: application/octet-stream"
print 'Content-Disposition: attachment;filename="%s.sql.bz2"' %(
    'asep-live-backup',
    datetime.datetime.today().strftime('%Y%m%d%H%M%S'))
print 'Cache-Control: max-age=0'
print

# ok, now the data

os.system("ls -la")
#os.system("mysqldump -uroot -ptesting asep| bzip2 -c")
