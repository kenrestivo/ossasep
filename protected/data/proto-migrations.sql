
-- fix for historical mistake
update requirement_status 
       set received = '2000-01-01' 
where (received is null or received < '1999-01-01') 
      and expired > '1000-01-01';
