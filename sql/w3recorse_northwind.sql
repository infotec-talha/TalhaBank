select * from products;
#1. Write a query to get Product name and quantity/unit.
SELECT product_name, quantity_per_unit 
FROM Products;
#2. Write a query to get current Product list (Product ID and name).
SELECT id as ProductID, product_name
FROM Products
WHERE Discontinued = 0
ORDER BY product_name;
#3. Write a query to get discontinued Product list (Product ID and name).
SELECT id as ProductID, product_name
FROM Products
WHERE Discontinued = 1
ORDER BY product_name;
#4. Write a query to get most expense and least expensive Product list (name and unit price).
SELECT product_name, standard_cost 
FROM Products 
ORDER BY standard_cost DESC;
#5. Write a query to get Product list (id, name, unit price) where current products cost less than 20.000.
SELECT id as ProductID, product_name, standard_cost
FROM Products
WHERE standard_cost < 20.000 AND Discontinued=0
ORDER BY standard_cost DESC;
#6. Write a query to get Product list (id, name, unit price) where products cost between 15.000 and 25.000
SELECT id as ProductID, product_name, standard_cost
FROM Products
where standard_cost between 15.000 and 25.000
order by standard_cost desc;
#7. Write a query to get Product list (name, unit price) of above average price.
SELECT product_name, standard_cost 
FROM Products 
WHERE standard_cost > (SELECT avg(standard_cost) FROM Products)
ORDER BY standard_cost ;
