alter table `extra_fee` add column pay_to_instructor tinyint(1) default 1;
update  extra_fee set pay_to_instructor = 0 where description like "%PTO%";
update  extra_fee set pay_to_instructor = 1 where description not like "%PTO%";
