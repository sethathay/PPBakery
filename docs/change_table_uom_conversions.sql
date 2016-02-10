ALTER TABLE uom_conversions CHANGE created created_at DATETIME;
ALTER TABLE uom_conversions CHANGE modified updated_at DATETIME;
ALTER TABLE uom_conversions CHANGE modified_by updated_by INT;