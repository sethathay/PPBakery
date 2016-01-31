ALTER TABLE services DROP COLUMN chart_account_id;
ALTER TABLE services CHANGE created created_at DATETIME;
ALTER TABLE services CHANGE modified updated_at DATETIME;
ALTER TABLE services CHANGE modified_by updated_by INT;

ALTER TABLE services CHANGE unit_price dollar_price DOUBLE;
ALTER TABLE services ADD COLUMN riel_price DOUBLE AFTER dollar_price;
ALTER TABLE services ADD COLUMN exchange_rate_id INT AFTER riel_price;