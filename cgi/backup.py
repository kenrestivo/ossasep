#!/usr/bin/env python
import cgi
import cgitb; cgitb.enable()  # for troubleshooting

print "Content-Type: application/octet-stream"
print 'Content-Disposition: attachment;filename="%s.sql.bz2"' %(
    'asep-live-backup', )
print

