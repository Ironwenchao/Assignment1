-- select * 
-- from product
-- where id = 1;


-- select review_detail
-- from review
-- where id = 5;

select product_name, product_type, review_detail 
from PRODUCT, PRODUCT_REVIEW, REVIEW
where PRODUCT.id = 1
and PRODUCT.id = PRODUCT_REVIEW.product_id
and PRODUCT_REVIEW.product_id = REVIEW.product_id;