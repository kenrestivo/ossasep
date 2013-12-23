#!/bin/sh

# NOTE! no need to iconv because yii has been saving the data in utf8 all along!
# mysql thinks the bytes are latin1 but they are actually utf8. 
# all we are doing here is alignning reality

# NOTE ALSO:  changing it to utf8 makes the keys longer (3 bytes instead of 1 byte) so i needed to substring the unique keys.

sed -e 's/CHARSET=latin1/CHARSET=utf8/g' | \
	sed -e 's/UNIQUE KEY `idx_name_phone` (`first_name`,`last_name`,`emergency_1`)/UNIQUE KEY `idx_name_phone` (`first_name`(120),`last_name`(120),`emergency_1`(15))/g' 

