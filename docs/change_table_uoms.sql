ALTER TABLE uoms CHANGE created created_at DATETIME;
ALTER TABLE uoms CHANGE modified updated_at DATETIME;
ALTER TABLE uoms CHANGE modified_by updated_by INT;