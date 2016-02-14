ALTER TABLE groups CHANGE created created_at DATETIME;
ALTER TABLE groups CHANGE modified updated_at DATETIME;
ALTER TABLE groups CHANGE modified_by updated_by INT;