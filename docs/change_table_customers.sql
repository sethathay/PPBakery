ALTER TABLE customers CHANGE created created_at DATETIME;
ALTER TABLE customers CHANGE modified updated_at DATETIME;
ALTER TABLE customers CHANGE modified_by updated_by INT;