ALTER TABLE sections CHANGE created created_at DATETIME;
ALTER TABLE sections CHANGE modified updated_at DATETIME;
ALTER TABLE sections CHANGE modified_by updated_by INT;