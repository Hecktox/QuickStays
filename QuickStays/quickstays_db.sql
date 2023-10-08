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
    ImagesID INT,
    AvailabilityDate DATE
);

CREATE TABLE Users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    UserType ENUM('Host', 'Traveler')
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

-- Sample Users
INSERT INTO Users (FirstName, LastName, Email, Password, UserType)
VALUES
    ('John', 'Doe', 'john.doe@example.com', 'password123', 'Traveler'),
    ('Jane', 'Smith', 'jane.smith@example.com', 'securepass', 'Traveler'),
    ('Alice', 'Johnson', 'alice.johnson@example.com', 'mypassword', 'Traveler'),
    ('Bob', 'Brown', 'bob.brown@example.com', 'letmein', 'Host'),
    ('Ella', 'Davis', 'ella.davis@example.com', 'password1', 'Host'),
    ('David', 'Wilson', 'david.wilson@example.com', 'secretword', 'Traveler'),
    ('Sophia', 'Lee', 'sophia.lee@example.com', 'mypassword2', 'Traveler'),
    ('Michael', 'Anderson', 'michael.anderson@example.com', 'mypass', 'Host'),
    ('Olivia', 'Martinez', 'olivia.martinez@example.com', '123456', 'Host'),
    ('William', 'Taylor', 'william.taylor@example.com', 'letmein2', 'Traveler');

-- Sample Properties
INSERT INTO Properties (PropertyName, Country, City, Province, StreetAddress, Description, PropertyType, NumRooms, NumBathrooms, ImagesID, AvailabilityDate)
VALUES
    ('Cozy Cottage', 'United States', 'New York', 'New York', '123 Main St', 'A cozy cottage in the heart of the city', 'House', 3, 2, 1, '2023-11-01'),
    ('Downtown Apartment', 'United States', 'Los Angeles', 'California', '456 Elm St', 'Modern apartment with city views', 'Apartment', 2, 1, 2, '2023-11-15'),
    ('Luxury Villa', 'France', 'Paris', 'Ile-de-France', '789 Oak St', 'A luxurious villa with a pool', 'House', 5, 3, 3, '2023-10-20'),
    ('Beachfront Condo', 'Spain', 'Barcelona', 'Catalonia', '101 Pine St', 'Condo with stunning beach views', 'Condo', 1, 1, 4, '2023-11-10'),
    ('Mountain Retreat', 'Switzerland', 'Zurich', 'Zurich', '222 Cedar St', 'A cozy cabin in the Swiss Alps', 'House', 4, 2, 5, '2023-10-25'),
    ('City Center Apartment', 'United Kingdom', 'London', 'England', '333 Birch St', 'Centrally located apartment', 'Apartment', 2, 1, 6, '2023-11-05'),
    ('Seaside Cottage', 'Australia', 'Sydney', 'New South Wales', '444 Spruce St', 'Charming cottage by the sea', 'House', 3, 2, 7, '2023-10-15'),
    ('Modern Loft', 'Canada', 'Toronto', 'Ontario', '555 Maple St', 'Sleek and modern loft space', 'Apartment', 1, 1, 8, '2023-10-30'),
    ('Historic Duplex', 'Italy', 'Rome', 'Lazio', '666 Oak St', 'Historic duplex in the heart of Rome', 'Duplex', 4, 2, 9, '2023-11-20'),
    ('Mountain View Cabin', 'United States', 'Denver', 'Colorado', '777 Pine St', 'Cabin with stunning mountain views', 'House', 2, 1, 10, '2023-11-30');
