alter table class_session add column `registration_starts` datetime DEFAULT '0000-00-00 00:00:00';
update class_session set registration_starts = '2012-01-04 08:00:00' where id = 1;