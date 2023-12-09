/*
 E-Commerce 
 Team Project
 Maximus Taube
 2095310
*/

CREATE DATABASE quickstays_db;

USE quickstays_db;

CREATE TABLE Properties (
    PropertyID INT AUTO_INCREMENT PRIMARY KEY,
    PropertyName VARCHAR(255),
    Country VARCHAR(255),
    City VARCHAR(255),
    Province VARCHAR(255),
    StreetAddress VARCHAR(255),
    Description VARCHAR(255),
    PropertyType ENUM('House', 'Apartment', 'Condo', 'Duplex'),
    NumRooms INT,
    NumBathrooms INT,
    AvailabilityDate DATE,
    PricePerNight DECIMAL(10, 2)
);

CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    UserType ENUM('Host', 'Traveler'),
    IsMaster BOOLEAN DEFAULT false
);

CREATE TABLE Reviews (
    ReviewID INT AUTO_INCREMENT PRIMARY KEY,
    PropertyID INT,
    UserID INT,
    Rating FLOAT,
    Comment VARCHAR(255),
    FOREIGN KEY (PropertyID) REFERENCES Properties(PropertyID),
    FOREIGN KEY (UserID) REFERENCES Users(UserID)
);

CREATE TABLE Cart (
    CartID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    PropertyID INT,
    BookingDate DATE,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (PropertyID) REFERENCES Properties(PropertyID)
);

CREATE TABLE Bookings (
    BookingID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    PropertyID INT,
    CheckInDate DATE,
    CheckOutDate DATE,
    TotalPrice DECIMAL(10, 2),
    Status ENUM('Pending', 'Confirmed', 'Cancelled'),
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (PropertyID) REFERENCES Properties(PropertyID)
);

-- Sample Data
INSERT INTO Properties (PropertyName, Country, City, Province, StreetAddress, Description, PropertyType, NumRooms, NumBathrooms, AvailabilityDate, PricePerNight)
VALUES
    ('Cozy Cottage', 'United States', 'New York', 'New York', '123 Main St', 'A charming cottage in the heart of the city', 'House', 2, 1, '2023-11-15', 129.99),
    ('Luxury Apartment', 'United States', 'Los Angeles', 'California', '456 Elm St', 'A modern and spacious apartment', 'Apartment', 3, 2, '2023-11-20', 150.50),
    ('Beachfront Villa', 'United States', 'Miami', 'Florida', '789 Ocean Ave', 'An exquisite villa right on the beach', 'House', 4, 3, '2023-11-25', 100.99),
    ('Mountain Cabin', 'United States', 'Denver', 'Colorado', '101 Forest Rd', 'A cozy cabin in the woods with a great view', 'Cabin', 2, 1, '2023-12-01', 79.50),
    ('Downtown Loft', 'United States', 'Chicago', 'Illinois', '567 Main St', 'A stylish loft in the heart of downtown', 'Apartment', 1, 1, '2023-12-05', 98.99),
    ('Rustic Farmhouse', 'United States', 'Austin', 'Texas', '890 Farm Rd', 'A serene farmhouse with a large backyard', 'House', 3, 2, '2023-12-10', 129.99),
    ('Ocean View Condo', 'United States', 'Miami', 'Florida', '200 Beach Dr', 'A luxurious condo with a view of the ocean', 'Condo', 2, 2, '2023-12-15', 150.99),
    ('Ski Chalet', 'United States', 'Aspen', 'Colorado', '300 Mountain Rd', 'A charming chalet for winter getaways', 'Chalet', 4, 3, '2023-12-20', 77.99),
    ('City Penthouse', 'United States', 'New York', 'New York', '100 Skyscraper Ave', 'An elegant penthouse in the heart of the city', 'Penthouse', 3, 2, '2023-12-25', 120.80),
    ('Secluded Cabin', 'United States', 'Lake Tahoe', 'California', '400 Pine Rd', 'A cozy cabin nestled in the woods', 'Cabin', 2, 1, '2023-12-30', 150.99),
    ('Historic Mansion', 'United States', 'Charleston', 'South Carolina', '500 Heritage St', 'A historic mansion with classic architecture', 'Mansion', 5, 4, '2024-01-05', 569.99),
    ('Lakefront Cottage', 'United States', 'Seattle', 'Washington', '600 Lakefront Ln', 'A charming cottage by the lake', 'House', 2, 1, '2024-01-10', 134.99),
    ('Modern Loft', 'United States', 'San Francisco', 'California', '700 Loft St', 'A sleek and modern loft with city views', 'Apartment', 2, 2, '2024-01-15', 206.78),
    ('Desert Retreat', 'United States', 'Sedona', 'Arizona', '800 Desert Rd', 'A tranquil desert retreat with stunning sunsets', 'House', 3, 2, '2024-01-20', 71.99),
    ('Lakeside Villa', 'United States', 'Lake Placid', 'New York', '900 Lakeside Dr', 'A luxurious villa with lakefront access', 'Villa', 4, 3, '2024-01-25', 109.99),
    ('Mountain View Lodge', 'United States', 'Vail', 'Colorado', '1000 Lodge Rd', 'A spacious lodge with mountain vistas', 'Lodge', 6, 4, '2024-01-30', 100.50),
    ('Seaside Bungalow', 'United States', 'Malibu', 'California', '1001 Ocean Dr', 'A cozy bungalow with a view of the ocean', 'Bungalow', 2, 1, '2024-04-15', 120.60),
    ('Charming Cabin', 'United States', 'Aspen', 'Colorado', '2001 Cabin Rd', 'A rustic cabin for a mountain escape', 'Cabin', 2, 1, '2024-04-20', 156.50),
    ('Luxury Penthouse', 'United States', 'Miami', 'Florida', '3001 Skyline Ave', 'A luxurious penthouse with city and ocean views', 'Penthouse', 3, 2, '2024-04-25', 260.70),
    ('Riverside Cottage', 'United States', 'Portland', 'Oregon', '4001 River Rd', 'A peaceful cottage by the river', 'House', 2, 1, '2024-04-30', 105.99),
    ('Classic Tudor', 'United States', 'Boston', 'Massachusetts', '5001 Tudor Ln', 'A classic Tudor-style home with vintage charm', 'House', 4, 3, '2024-05-05', 125.50),
    ('Ski Lodge', 'United States', 'Jackson Hole', 'Wyoming', '6001 Ski Lodge Rd', 'A cozy lodge for winter adventures', 'Lodge', 5, 3, '2024-05-10', 99.80),
    ('Beachfront Condo', 'United States', 'San Diego', 'California', '7001 Beach Dr', 'A modern condo with direct beach access', 'Condo', 2, 2, '2024-05-15', 360.99),
    ('Hillside Retreat', 'United States', 'Santa Fe', 'New Mexico', '8001 Hill Rd', 'A serene hillside retreat with panoramic views', 'House', 3, 2, '2024-05-20', 260.80),
    ('Vineyard Villa', 'United States', 'Napa Valley', 'California', '9001 Vineyard Ln', 'A villa surrounded by vineyards and wineries', 'Villa', 4, 4, '2024-05-25', 156.99),
    ('Rustic Cabin', 'United States', 'Lake Tahoe', 'California', '10001 Forest Rd', 'A charming cabin for a cozy getaway', 'Cabin', 1, 1, '2024-05-30', 139.99);

INSERT INTO Users (FirstName, LastName, Email, Password, UserType)
VALUES
    ('John', 'Doe', 'johndoe@example.com', MD5('password123'), 'Host'),
    ('Alice', 'Johnson', 'alice@example.com', MD5('securepass456'), 'Traveler'),
    ('Michael', 'Smith', 'michael@example.com', MD5('mypass789'), 'Traveler'),
    ('Emily', 'Williams', 'emily@example.com', MD5('pass1234'), 'Host'),
    ('David', 'Brown', 'david@example.com', MD5('brown123'), 'Host'),
    ('Sarah', 'Davis', 'sarah@example.com', MD5('sarah789'), 'Traveler'),
    ('Chris', 'Evans', 'chris@example.com', MD5('chrisevans123'), 'Host'),
    ('Emma', 'Roberts', 'emma@example.com', MD5('emmaroberts456'), 'Traveler'),
    ('Daniel', 'Johnson', 'daniel@example.com', MD5('daniel1234'), 'Host'),
    ('Olivia', 'Wilson', 'olivia@example.com', MD5('oliviawilson789'), 'Traveler'),
    ('Matthew', 'Turner', 'matthew@example.com', MD5('matthewturner123'), 'Host'),
    ('Sophia', 'Garcia', 'sophiagarcia@example.com', MD5('sophiagarcia456'), 'Traveler'),
    ('James', 'Parker', 'james@example.com', MD5('jamesparker123'), 'Host'),
    ('Ava', 'Hernandez', 'avahernandez@example.com', MD5('avahernandez456'), 'Traveler'),
    ('William', 'Gonzalez', 'william@example.com', MD5('williamgonzalez123'), 'Host'),
    ('Isabella', 'Clark', 'isabella@example.com', MD5('isabellaclark456'), 'Traveler'),
    ('Liam', 'Martinez', 'liam@example.com', MD5('liammartinez123'), 'Host'),
    ('Olivia', 'Lee', 'olivialee@example.com', MD5('olivialee456'), 'Traveler'),
    ('Noah', 'Adams', 'noah@example.com', MD5('noahadams1234'), 'Host'),
    ('Emma', 'White', 'emmawhite@example.com', MD5('emmawhite789'), 'Traveler'),
    ('Oliver', 'Anderson', 'oliver@example.com', MD5('oliveranderson123'), 'Host'),
    ('Ava', 'Harris', 'ava@example.com', MD5('avaharris456'), 'Traveler'),
    ('Elijah', 'Turner', 'elijah@example.com', MD5('elijahturner123'), 'Host'),
    ('Charlotte', 'Moore', 'charlotte@example.com', MD5('charlottemoore456'), 'Traveler'),
    ('William', 'Hill', 'williamhill@example.com', MD5('williamhill123'), 'Host'),
    ('Sophia', 'Taylor', 'sophia@example.com', MD5('sophiataylor456'), 'Traveler');

-- Admins
INSERT INTO Users (FirstName, LastName, Email, Password, IsMaster)
VALUES
    ('Maximus', 'Taube', 'maximustaube@example.com', MD5('maximustaube123'), 1),
    ('Philippe', 'Ton-That', 'philippetonthat@example.com', MD5('philippetonthat123'), 1),
    ('John', 'Smith', 'johnsmith@example.com', MD5('johnsmith123'), 0),
    ('David', 'Williams', 'davidwilliams@example.com', MD5('davidwilliams456'), 0),
    ('Karen', 'Johnson', 'karenjohnson@example.com', MD5('karenjohnson789'), 0),
    ('Michael', 'Williams', 'michaelwilliams@example.com', MD5('michaelwilliams123'), 0),
    ('Sarah', 'Brown', 'sarahbrown@example.com', MD5('sarahbrown456'), 0),
    ('Robert', 'White', 'robertwhite@example.com', MD5('robertwhite789'), 0),
    ('Thomas', 'Johnson', 'thomasjohnson@example.com', MD5('thomasjohnson789'), 0),
    ('Jennifer', 'Williams', 'jenniferwilliams@example.com', MD5('jenniferwilliams123'), 0),
    ('Michelle', 'Brown', 'michellebrown@example.com', MD5('michellebrown456'), 0),
    ('Daniel', 'White', 'danielwhite@example.com', MD5('danielwhite789'), 0);

INSERT INTO Reviews (PropertyID, UserID, Rating, Comment)
VALUES
    (1, 2, 4.5, 'Great place to stay!'),
    (2, 1, 5.0, 'Amazing apartment with a fantastic view'),
    (3, 3, 4.8, 'Wonderful beachfront villa with stunning views'),
    (4, 4, 4.0, 'A perfect cabin for a peaceful getaway'),
    (5, 5, 4.7, 'The downtown loft is convenient and stylish'),
    (6, 6, 4.3, 'Lovely farmhouse with a beautiful garden'),
    (7, 8, 4.2, 'Stunning views from the penthouse!'),
    (8, 7, 4.7, 'A perfect cabin retreat for relaxation'),
    (9, 10, 4.5, 'Historic mansion with a touch of grandeur'),
    (10, 9, 4.4, 'Relaxing lakeside cottage for a weekend getaway'),
    (11, 12, 4.9, 'Modern loft with great amenities'),
    (12, 11, 4.3, 'Peaceful desert retreat away from the city'),
    (13, 14, 4.8, 'Luxurious lakeside villa with beautiful views'),
    (14, 13, 4.6, 'Mountain lodge with plenty of space for a group'),
    (15, 16, 4.7, 'Charming mountain views from the lodge'),
    (16, 15, 4.8, 'Lakeside relaxation at its best'),
    (17, 18, 4.6, 'Relaxing bungalow by the sea'),
    (18, 17, 4.7, 'Cozy cabin, perfect for a mountain retreat'),
    (19, 20, 4.9, 'Stunning penthouse with beautiful views'),
    (20, 19, 4.8, 'Peaceful riverside cottage with scenic surroundings'),
    (21, 22, 4.5, 'Classic Tudor home with vintage charm'),
    (22, 21, 4.4, 'Ski lodge, great for winter vacations'),
    (23, 24, 4.7, 'Convenient beachfront condo with ocean access'),
    (24, 23, 4.8, 'Hillside retreat with breathtaking views'),
    (25, 26, 4.6, 'Vineyard villa surrounded by wineries and vineyards'),
    (26, 25, 4.5, 'Cozy cabin for a peaceful getaway');

INSERT INTO Cart (UserID, PropertyID, BookingDate)
VALUES
    (2, 1, '2023-11-10'),
    (1, 2, '2023-11-12'),
    (3, 3, '2023-11-15'),
    (4, 4, '2023-11-18'),
    (5, 5, '2023-11-20'),
    (6, 6, '2023-11-25'),
    (8, 7, '2024-02-05'),
    (7, 8, '2024-02-10'),
    (10, 9, '2024-02-15'),
    (9, 10, '2024-02-20'),
    (12, 11, '2024-02-25'),
    (11, 12, '2024-03-01'),
    (14, 13, '2024-03-05'),
    (13, 14, '2024-03-10'),
    (16, 15, '2024-03-15'),
    (15, 16, '2024-03-20'),
    (18, 17, '2024-06-05'),
    (17, 18, '2024-06-10'),
    (20, 19, '2024-06-15'),
    (19, 20, '2024-06-20'),
    (22, 21, '2024-06-25'),
    (21, 22, '2024-06-30'),
    (24, 23, '2024-07-05'),
    (23, 24, '2024-07-10'),
    (26, 25, '2024-07-15'),
    (25, 26, '2024-07-20');

INSERT INTO Bookings (UserID, PropertyID, CheckInDate, CheckOutDate, TotalPrice, Status)
VALUES
    (2, 1, '2023-11-20', '2023-11-25', 300.00, 'Confirmed'),
    (1, 2, '2023-11-25', '2023-11-30', 450.00, 'Pending'),
    (3, 3, '2023-11-28', '2023-12-03', 600.00, 'Confirmed'),
    (4, 4, '2023-12-05', '2023-12-10', 250.00, 'Confirmed'),
    (5, 5, '2023-12-10', '2023-12-15', 200.00, 'Pending'),
    (6, 6, '2023-12-15', '2023-12-20', 350.00, 'Confirmed'),
    (8, 7, '2024-02-25', '2024-03-01', 450.00, 'Confirmed'),
    (7, 8, '2024-03-01', '2024-03-06', 550.00, 'Pending'),
    (10, 9, '2024-03-05', '2024-03-10', 700.00, 'Confirmed'),
    (9, 10, '2024-03-10', '2024-03-15', 600.00, 'Confirmed'),
    (12, 11, '2024-03-15', '2024-03-20', 800.00, 'Pending'),
    (11, 12, '2024-03-20', '2024-03-25', 650.00, 'Confirmed'),
    (14, 13, '2024-03-25', '2024-03-30', 900.00, 'Confirmed'),
    (13, 14, '2024-03-30', '2024-04-05', 750.00, 'Confirmed'),
    (16, 15, '2024-04-05', '2024-04-10', 950.00, 'Pending'),
    (15, 16, '2024-04-10', '2024-04-15', 850.00, 'Confirmed'),
    (18, 17, '2024-06-25', '2024-06-30', 550.00, 'Confirmed'),
    (17, 18, '2024-06-30', '2024-07-05', 650.00, 'Pending'),
    (20, 19, '2024-07-05', '2024-07-10', 750.00, 'Confirmed'),
    (19, 20, '2024-07-10', '2024-07-15', 700.00, 'Confirmed'),
    (22, 21, '2024-07-15', '2024-07-20', 850.00, 'Pending'),
    (21, 22, '2024-07-20', '2024-07-25', 700.00, 'Confirmed'),
    (24, 23, '2024-07-25', '2024-07-30', 950.00, 'Confirmed'),
    (23, 24, '2024-07-30', '2024-08-05', 800.00, 'Confirmed'),
    (26, 25, '2024-08-05', '2024-08-10', 1100.00, 'Pending'),
    (25, 26, '2024-08-10', '2024-08-15', 900.00, 'Confirmed');
