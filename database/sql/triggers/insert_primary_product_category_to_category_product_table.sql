USE `coal`;

CREATE
    TRIGGER IF NOT EXISTS insert_primary_product_category_to_category_product_table
    BEFORE INSERT
    ON `products`
    FOR EACH ROW
BEGIN
    INSERT INTO category_product(category_id, product_id) VALUES (NEW.primary_category_id, NEW.id);
END;
