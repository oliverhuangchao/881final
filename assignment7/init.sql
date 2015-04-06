use chaoh_201401_cpsc862;
drop table if exists mymetadata;

create table mymetadata
(
	tab_name char(50),
	real_name char(50),
	show_name char(50),
	primary key(tab_name,real_name)
);
insert into mymetadata values('Categories','CategoryID','Category IDhahahahahahah');
insert into mymetadata values('Categories','CategoryName','Category Name');
insert into mymetadata values('Categories','Description','Description');
insert into mymetadata values('Categories','Picture','Picture');

insert into mymetadata values('Customers','CustomerID','Customer ID');
insert into mymetadata values('Customers','CompanyName','Company Name');
insert into mymetadata values('Customers','ContactName','Contact Name');
insert into mymetadata values('Customers','ContactTitle','Contact Title');
insert into mymetadata values('Customers','Address','Address');
insert into mymetadata values('Customers','City','City');
insert into mymetadata values('Customers','Region','Region');
insert into mymetadata values('Customers','PostalCode','Postal Code');
insert into mymetadata values('Customers','Country','Country');
insert into mymetadata values('Customers','Phone','Phone');
insert into mymetadata values('Customers','Fax','Fax');

insert into mymetadata values('Suppliers','SupplierID','Supplier ID');
insert into mymetadata values('Suppliers','CompanyName','Company Name');
insert into mymetadata values('Suppliers','ContactName','Contact Name');
insert into mymetadata values('Suppliers','ContactTitle','Contact Title');
insert into mymetadata values('Suppliers','Address','Address');
insert into mymetadata values('Suppliers','City','City');
insert into mymetadata values('Suppliers','Region','Region');
insert into mymetadata values('Suppliers','PostalCode','Postal Code');
insert into mymetadata values('Suppliers','Country','Country');
insert into mymetadata values('Suppliers','Phone','Phone');
insert into mymetadata values('Suppliers','Fax','Fax');
insert into mymetadata values('Suppliers','HomePage','Home Page');

insert into mymetadata values('Shippers','ShipperID','Shipper ID');
insert into mymetadata values('Shippers','CompanyName','Company Name');
insert into mymetadata values('Shippers','Phone','Phone');

insert into mymetadata values('Employees','EmployeeID','Employee ID');
insert into mymetadata values('Employees','LastName','Last Name');
insert into mymetadata values('Employees','FirstName','First Name');
insert into mymetadata values('Employees','Title','Title');
insert into mymetadata values('Employees','TitleOfCourtesy','Title Of Courtesy');
insert into mymetadata values('Employees','BirthDate','Birth Date');
insert into mymetadata values('Employees','HireDate','Hire Date');
insert into mymetadata values('Employees','Address','Address');
insert into mymetadata values('Employees','City','City');
insert into mymetadata values('Employees','Region','Region');
insert into mymetadata values('Employees','PostalCode','Postal Code');
insert into mymetadata values('Employees','Country','Country');
insert into mymetadata values('Employees','HomePage','Home Page');
insert into mymetadata values('Employees','Extension','Extension');
insert into mymetadata values('Employees','Photo','Photo');
insert into mymetadata values('Employees','Notes','Notes');
insert into mymetadata values('Employees','ReportsTo','Reports To');

insert into mymetadata values('Products','ProductID','Product ID');
insert into mymetadata values('Products','ProductName','Product Name');
insert into mymetadata values('Products','SupplierID','Supplier ID');
insert into mymetadata values('Products','CategoryID','Category ID');
insert into mymetadata values('Products','QuantityPerUnit','Quantity Per Unit');
insert into mymetadata values('Products','UnitPrice','Unit Price');
insert into mymetadata values('Products','UnitsInStock','Units In Stock');
insert into mymetadata values('Products','UnitsOnOrder','Units On Order');
insert into mymetadata values('Products','ReorderLevel','Reorder Level');
insert into mymetadata values('Products','Discontinued','Discontinued');

insert into mymetadata values('Order_Details','OrderID','Order ID');
insert into mymetadata values('Order_Details','ProductID','Product ID');
insert into mymetadata values('Order_Details','UnitPrice','Unit Price');
insert into mymetadata values('Order_Details','Quantity','Quantity');
insert into mymetadata values('Order_Details','Discount','Discount');

insert into mymetadata values('Orders','OrderID','Order ID');
insert into mymetadata values('Orders','CustomerID','Customer ID');
insert into mymetadata values('Orders','EmployeeID','Employee ID');
insert into mymetadata values('Orders','OrderDate','Order Date');
insert into mymetadata values('Orders','RequiredDate','Required Date');
insert into mymetadata values('Orders','ShippedDate','Shipped Date');
insert into mymetadata values('Orders','ShipperID','Shipper ID');
insert into mymetadata values('Orders','Freight','Freight');
insert into mymetadata values('Orders','ShipName','Ship Name');
insert into mymetadata values('Orders','ShipAddress','Ship Address');
insert into mymetadata values('Orders','ShipCity','Ship City');
insert into mymetadata values('Orders','ShipRegion','Ship Region');
insert into mymetadata values('Orders','ShipPostalCode','Ship Postal Code');
insert into mymetadata values('Orders','ShipCountry','Ship Country');


DROP TABLE IF EXISTS JoinConnection;
CREATE TABLE JoinConnection (TableNameOne varchar(100),TableNameTwo varchar(100),ConnectWay text,PRIMARY key (TableNameOne,TableNameTwo));
INSERT into JoinConnection values("Suppliers","Products",'Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Suppliers","Order_Details",'Products.SupplierID=Suppliers.SupplierID;Products.ProductID=Order_Details.ProductID');
INSERT into JoinConnection values("Suppliers","Categories",'Products.CategoryID=Categories.CategoryID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Suppliers","Orders",'Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Suppliers","Customers",'Orders.CustomerID=Customers.CustomerID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Suppliers","Shippers",'Orders.ShipperID=Shippers.ShipperID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Suppliers","Employees",'Orders.EmployeeID=Employees.EmployeeID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');



INSERT into JoinConnection values("Products","Suppliers",'Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Products","Order_Details",'Products.ProductID=Order_Details.ProductID');
INSERT into JoinConnection values("Products","Categories",'Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Products","Orders",'Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Products","Customers",'Products.ProductID=Order_Details.ProductID;Orders.OrderID=Order_Details.OrderID;Orders.CustomerID=Customers.CustomerID');
INSERT into JoinConnection values("Products","Shippers",'Products.ProductID=Order_Details.ProductID;Orders.OrderID=Order_Details.OrderID;Orders.ShipperID=Shippers.ShipperID');
INSERT into JoinConnection values("Products","Employees",'Products.ProductID=Order_Details.ProductID;Orders.OrderID=Order_Details.OrderID;Orders.EmployeeID=Employees.EmployeeID');



INSERT into JoinConnection values("Categories","Suppliers",'Products.CategoryID=Categories.CategoryID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Categories","Order_Details",'Products.CategoryID=Categories.CategoryID;Products.ProductID=Order_Details.ProductID');
INSERT into JoinConnection values("Categories","Products",'Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Categories","Orders",'Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Categories","Customers",'Orders.CustomerID=Customers.CustomerID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Categories","Shippers",'Orders.ShipperID=Shippers.ShipperID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Categories","Employees",'Orders.EmployeeID=Employees.EmployeeID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');



INSERT into JoinConnection values("Order_Details","Suppliers",'Products.SupplierID=Suppliers.SupplierID;Products.ProductID=Order_Details.ProductID');
INSERT into JoinConnection values("Order_Details","Categories",'Products.CategoryID=Categories.CategoryID;Products.ProductID=Order_Details.ProductID');
INSERT into JoinConnection values("Order_Details","Products",'Products.ProductID=Order_Details.ProductID');
INSERT into JoinConnection values("Order_Details","Orders",'Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Order_Details","Customers",'Orders.CustomerID=Customers.CustomerID;Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Order_Details","Shippers",'Orders.ShipperID=Shippers.ShipperID;Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Order_Details","Employees",'Orders.EmployeeID=Employees.EmployeeID;Orders.OrderID=Order_Details.OrderID');



INSERT into JoinConnection values("Orders","Suppliers",'Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Orders","Categories",'Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Orders","Products",'Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Orders","Order_Details",'Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Orders","Customers",'Orders.CustomerID=Customers.CustomerID');
INSERT into JoinConnection values("Orders","Shippers",'Orders.ShipperID=Shippers.ShipperID');
INSERT into JoinConnection values("Orders","Employees",'Orders.EmployeeID=Employees.EmployeeID');



INSERT into JoinConnection values("Customers","Suppliers",'Orders.CustomerID=Customers.CustomerID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Customers","Categories",'Orders.CustomerID=Customers.CustomerID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Customers","Products",'Products.ProductID=Order_Details.ProductID;Orders.OrderID=Order_Details.OrderID;Orders.CustomerID=Customers.CustomerID');
INSERT into JoinConnection values("Customers","Order_Details",'Orders.CustomerID=Customers.CustomerID;Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Customers","Orders",'Orders.CustomerID=Customers.CustomerID');
INSERT into JoinConnection values("Customers","Shippers",'Orders.CustomerID=Customers.CustomerID;Orders.ShipperID=Shippers.ShipperID');
INSERT into JoinConnection values("Customers","Employees",'Orders.CustomerID=Customers.CustomerID;Orders.EmployeeID=Employees.EmployeeID');



INSERT into JoinConnection values("Shippers","Suppliers",'Orders.ShipperID=Shippers.ShipperID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Shippers","Categories",'Orders.ShipperID=Shippers.ShipperID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Shippers","Products",'Products.ProductID=Order_Details.ProductID;Orders.OrderID=Order_Details.OrderID;Orders.ShipperID=Shippers.ShipperID');
INSERT into JoinConnection values("Shippers","Order_Details",'Orders.ShipperID=Shippers.ShipperID;Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Shippers","Orders",'Orders.ShipperID=Shippers.ShipperID');
INSERT into JoinConnection values("Shippers","Customers",'Orders.CustomerID=Customers.CustomerID;Orders.ShipperID=Shippers.ShipperID');
INSERT into JoinConnection values("Shippers","Employees",'Orders.ShipperID=Shippers.ShipperID;Orders.EmployeeID=Employees.EmployeeID');



INSERT into JoinConnection values("Employees","Suppliers",'Orders.EmployeeID=Employees.EmployeeID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.SupplierID=Suppliers.SupplierID');
INSERT into JoinConnection values("Employees","Categories",'Orders.EmployeeID=Employees.EmployeeID;Orders.OrderID=Order_Details.OrderID;Products.ProductID=Order_Details.ProductID;Products.CategoryID=Categories.CategoryID');
INSERT into JoinConnection values("Employees","Products",'Products.ProductID=Order_Details.ProductID;Orders.OrderID=Order_Details.OrderID;Orders.EmployeeID=Employees.EmployeeID');
INSERT into JoinConnection values("Employees","Order_Details",'Orders.EmployeeID=Employees.EmployeeID;Orders.OrderID=Order_Details.OrderID');
INSERT into JoinConnection values("Employees","Orders",'Orders.EmployeeID=Employees.EmployeeID');
INSERT into JoinConnection values("Employees","Customers",'Orders.CustomerID=Customers.CustomerID;Orders.EmployeeID=Employees.EmployeeID');
INSERT into JoinConnection values("Employees","Shippers",'Orders.ShipperID=Shippers.ShipperID;Orders.EmployeeID=Employees.EmployeeID');


