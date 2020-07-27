use northwind;
#1. Order Subtotals
SELECT SUM(Quantity) AS TotalItemsOrdered FROM Order_Details;
select * from order_details
order by order_id;
select order_id, 
    format(sum(unit_price * Quantity),2) as Subtotal
from order_details
group by order_id;
#2. Sales by Year
SELECT * FROM northwind.orders;
select orders.id ,DATE_FORMAT(order_date,"%Y") as sale_year,format(sum(unit_price * Quantity),2) as Sales_by_year from orders
inner join order_details on orders.id=order_details.id
group by  sale_year;
delete from inventory_transactions where customer_order_id in ( select id from orders where shipped_date is null);
delete from orders where shipped_date is null;
#3. Employee Sales by Country
SELECT DISTINCT employee_id,first_name,last_name FROM orders
inner join employees on  orders.employee_id= employees.id
#inner join employees 
ORDER BY employee_id;
select * from orders
