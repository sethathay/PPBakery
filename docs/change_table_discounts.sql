ALTER TABLE discounts CHANGE created created_at DATETIME;
ALTER TABLE discounts CHANGE modified updated_at DATETIME;
ALTER TABLE discounts CHANGE modified_by updated_by INT;