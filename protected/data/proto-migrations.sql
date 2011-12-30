
alter table instructor add column `first_name` varchar(128) NOT NULL;
alter table instructor add column `last_name` varchar(128) NOT NULL;


update instructor,
(SELECT
`full_name` ,
SUBSTRING_INDEX( `full_name` , ' ', 1 ) AS first,
SUBSTRING(full_name,INSTR(full_name,' ')+1) AS last
from instructor) as fixes
set instructor.first_name = fixes.first, instructor.last_name = fixes.last
where instructor.full_name = fixes.full_name
; 

alter table instructor drop column full_name;

update instructor set first_name = "Maya (Nemiah)", last_name = "Guimbatan" where id = 22;
update instructor set first_name = "Nick", last_name = "Kapp", `alias` = "Dr. Nick Kapp" where id = 4;