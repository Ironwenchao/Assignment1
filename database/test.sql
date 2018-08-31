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

select PRODUCT.product_name, PRODUCT.product_type, REVIEW.review_detail 
from PRODUCT, REVIEW, PRODUCT_REVIEW
where PRODUCT.id = 1
and REVIEW.product_id = PRODUCT.id
and PRODUCT_REVIEW.product_id = PRODUCT.id
and REVIEW.product_id = PRODUCT_REVIEW.product_id;