ALTER TABLE locations CHANGE created created_at DATETIME;
ALTER TABLE locations CHANGE modified updated_at DATETIME;
ALTER TABLE locations CHANGE modified_by updated_by INT;