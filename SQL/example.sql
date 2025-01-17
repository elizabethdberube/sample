DROP DATABASE IF EXISTS example_db;

CREATE DATABASE example_db;

USE example_db;

DROP TABLE IF EXISTS Products;
CREATE TABLE Products (
ProductID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ProductName VARCHAR(100) NULL,
Category VARCHAR(50) NULL,
Price DECIMAL(10,2) NULL,
Stock INT

);

INSERT INTO Products (ProductID, ProductName, Category, Price, Stock)
VALUES (1, "Pride and Prejudice", "Books", 10.00, 32),
       (2, "Reebok Tee", "Clothing", 15.50, 102),
       (3, "Nike Duffel", "Travel", 32.99, 43),
       (4, "Garett's Popcorn", "Food",  7.99, 24),
       (5, "Emma", "Books", 9.99, 45);

DELIMITER //
CREATE PROCEDURE GetProductsByCategory(IN CategoryName VARCHAR(255))
BEGIN
    SELECT * FROM Products WHERE Category = CategoryName;
END //
DELIMITER ; 

CALL GetProductsByCategory('Books');

DELIMITER //
CREATE PROCEDURE UpdateProductStock(IN ProductID INT, IN QuantityAdjustment INT)
BEGIN
    UPDATE Products 
    SET Stock = QuantityAdjustment 
    WHERE ProductID;
END //
DELIMITER ;

CALL UpdateProductStock(5, 1);