ALTER TABLE products CHANGE created created_at DATETIME;
ALTER TABLE products CHANGE modified updated_at DATETIME;
ALTER TABLE products CHANGE modified_by updated_by INT;
ALTER TABLE products ADD COLUMN pgroup_id INT AFTER parent_id;