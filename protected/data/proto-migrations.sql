
-- the migration for company id in classes
alter table class_info add column `company_id` int(11) NOT NULL default 1;
alter table class_info add   KEY `company_id` (`company_id`);
update class_info set company_id = 6;
alter table class_info add CONSTRAINT `class_info_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`);

update class_info, 
(select instructor_assignment.instructor_id as instructor_id, 
       class_info.id as class_id,
       instructor.company_id as company_id
from class_info 
left join instructor_assignment
     on instructor_assignment.class_id = class_info.id
left join instructor
     on instructor_assignment.instructor_id = instructor.id
group by class_id) as fixes
set class_info.company_id = fixes.company_id 
where class_info.id = fixes.class_id 
;


-- checks that the migration worked, and yay, it  did

select instructor_assignment.instructor_id as instructor_id, 
       class_info.id as class_id,
       instructor.company_id as company_id,
       class_info.company_id as set_company_id
from class_info 
left join instructor_assignment
     on instructor_assignment.class_id = class_info.id
left join instructor
     on instructor_assignment.instructor_id = instructor.id
group by class_id
;
