#1. Show all products by category
select product_name,category from products
order by product_name;
#2. Show product sale for 2006
select DATE_FORMAT(order_date, "%Y") as sale_year,product_name from orders
inner join order_details on orders.id=order_details.id
inner join products on order_details.product_id=products.id
order by sale_year ;
#3. show employee sale by country
select employee_id,country_region,first_name,order_date from orders
inner join employees on orders.employee_id=employees.id
order by employee_id;
#4. Show sale by category
select category,order_id,order_date from products
inner join order_details on order_details.product_id=products.id
inner join orders on orders.id=order_details.order_id
order by category;