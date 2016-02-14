ALTER TABLE pgroups CHANGE created created_at DATETIME;
ALTER TABLE pgroups CHANGE modified updated_at DATETIME;
ALTER TABLE pgroups CHANGE modified_by updated_by INT;