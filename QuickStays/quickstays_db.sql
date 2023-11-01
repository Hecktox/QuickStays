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

CREATE TABLE Admins (
    AdminID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255);
);