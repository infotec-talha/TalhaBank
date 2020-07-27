select * from orders
right join order_details on orders.id=order_details.order_id;
select * from orders
right join invoices on orders.id=invoices.order_id;
select ship_city,count(*) as Count_city from orders
left join order_details on orders.id=order_details.order_id
#order by ship_city
group by ship_city;