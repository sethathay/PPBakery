ALTER TABLE exchange_rates CHANGE created created_at DATETIME;
ALTER TABLE exchange_rates CHANGE modified updated_at DATETIME;
ALTER TABLE exchange_rates CHANGE modified_by updated_by INT;