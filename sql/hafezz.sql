SELECT * FROM northwind﻿.products;
#1.OutOfStockProducts: Make a list of products that are out of stock. (My query yielded 5 records.)
select ProductID, productName,UnitsInStock from products
where UnitsInStock=0;
#2.Make a list of products that are out of stock and have not been discontinued. Include the suppliers’ names. (My query yielded 1 record.)
select ContactName as supplier_name, productName,UnitsInStock from products
inner join suppliers on suppliers.SupplierID=products.SupplierID
where Discontinued="false" and UnitsInStock =0;
#3.ReorderProducts:Make a list of products that need to be re-ordered i.e.where the units in stock and the units on order is less than the reorder level.
select productName,ReorderLevel from products
where (UnitsInStock + UnitsOnOrder) < ReorderLevel;
#4.ProductPopularity:Make a list of products and the number of orders in which the product appears.  Put the most frequently ordered item at the top of the list and so on to the least frequently ordered item.
select count(products.ProductID) as pc, products.ProductID,productName,orders.OrderID as order_id from orders
inner join orderdetails on orderdetails.OrderID=orders.OrderID
inner join products on products.ProductID=orderdetails.ProductID
group by products.ProductID order by pc desc;
#5.ProductPopularity2: Make a list of products and total up the number of actual items ordered.  Put the most frequently ordered item at the top of the list and so on to the least frequently ordered item.
select count(products.ProductID) as pc, products.ProductID,productName,count(orders.OrderID) as order_id from orders
inner join orderdetails on orderdetails.OrderID=orders.OrderID
inner join products on products.ProductID=orderdetails.ProductID
group by products.ProductID order by pc desc;
#6.CategorySuppliers: Make a list of categories and suppliers who supply products within those categories.
select productName,products.SupplierID,ContactName,products.CategoryID,CategoryName from products
inner join suppliers on suppliers.SupplierID=products.SupplierID
inner join categories on categories.CategoryID=products.CategoryID
order by products.SupplierID;
 #7.CustomerOrders: Make a complete list of customers, the OrderID and date of any orders they have made. Include customers who have not placed any orders. 
select ContactName,OrderID,OrderDate from customers
left join orders  on orders.CustomerID=customers.CustomerID;
#8.CustomerWithMaxNumberOfOrders: Create a query that determines the customer who has placed the maximum number of orders. (My query yielded Save-a-lot Markets with 31 orders.)
select ContactName,OrderDate,count(customers.CustomerID) as customer_order_count from orders
inner join customers on customers.CustomerID=orders.CustomerID 
group by customers.CustomerID order by customer_order_count desc;
#9.CustomerAndSuppliersParameterizedByCity: Create a parameterized query that has the user enter a city and then list the customers or suppliers from that city.  You might want to use their union query as a starting point.  (London had 6 customers and 1 supplier.)
SELECT suppliers.SupplierID,suppliers.ContactName,customers.City as customers_city FROM Suppliers 
inner join customers on customers.City=suppliers.city
where suppliers.city='London' 
order by customers_city;
SELECT City FROM Customers
where Customers.city='London'
UNION all
SELECT City FROM Suppliers
where Suppliers.city='London'
ORDER BY City;