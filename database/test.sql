-- select * 
-- from product
-- where id = 1;


-- select review_detail
-- from review
-- where id = 5;

-- select product_name, product_type, review_detail 
-- from PRODUCT, PRODUCT_REVIEW, REVIEW
-- where PRODUCT.id = 1
-- and PRODUCT.id = PRODUCT_REVIEW.product_id
-- and PRODUCT_REVIEW.product_id = REVIEW.product_id;

-- select PRODUCT.product_name, PRODUCT.product_type, REVIEW.review_detail 
-- from PRODUCT, REVIEW, PRODUCT_REVIEW
-- where PRODUCT.id = 1
-- and REVIEW.product_id = PRODUCT.id
-- and PRODUCT_REVIEW.product_id = PRODUCT.id
-- and REVIEW.product_id = PRODUCT_REVIEW.product_id;

-- select manufacturer_name, manufacturer_country
-- from MANUFACTURER;

-- select * from manufacturer;

-- select product_name
-- from MANUFACTURER, PRODUCT
-- where PRODUCT.manufacturer_id = MANUFACTURER.id;

-- select distinct(product_name)
-- from MANUFACTURER, PRODUCT
-- where manufacturer.id = 1
-- and PRODUCT.manufacturer_id = MANUFACTURER.id;

-- select * from REVIEW where id = 1;

-- select * from REVIEW where product_id = 1;

select * from REVIEW, PRODUCT 
where REVIEW.product_id = 1
and REVIEW.product_id = PRODUCT.id;