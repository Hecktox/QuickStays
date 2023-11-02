-- Inserting into Properties
INSERT INTO Properties (PropertyName, Country, City, Province, StreetAddress, Description, PropertyType, NumRooms, NumBathrooms, ImagesID, AvailabilityDate)
VALUES 
('Sea View Villa', 'USA', 'Miami', 'Florida', '123 Ocean Drive', 'A beautiful sea view villa', 'House', 3, 2, 1, '2023-06-15'),
('Mountain Retreat', 'Canada', 'Banff', 'Alberta', '456 Mountain Ave', 'A cozy retreat in the mountains', 'Condo', 2, 1, 2, '2023-07-01'),
('City Center Flat', 'UK', 'London', 'Greater London', '789 City Rd', 'Modern flat in the heart of the city', 'Apartment', 2, 2, 3, '2023-05-20'),
('Country House', 'France', 'Lyon', 'Auvergne-Rhône-Alpes', '321 Country Lane', 'Charming country house', 'Duplex', 4, 3, 4, '2023-08-10');

-- Inserting into Users
INSERT INTO Users (FirstName, LastName, Email, Password, UserType)
VALUES 
('Alice', 'Johnson', 'alice.johnson@email.com', MD5('password123'), 'Host'),
('Bob', 'Smith', 'bob.smith@email.com', MD5('password456'), 'Traveler'),
('Carol', 'Davis', 'carol.davis@email.com', MD5('pass789'), 'Traveler'),
('David', 'Wilson', 'david.wilson@email.com', MD5('pass101112'), 'Host');


-- Inserting into Reviews
INSERT INTO Reviews (PropertyID, UserID, Rating, Comment)
VALUES 
(1, 2, 4.5, 'Amazing place with stunning views!'),
(2, 3, 4.0, 'Very cozy and comfortable.'),
(3, 2, 3.5, 'Great location but a bit noisy.'),
(4, 3, 4.8, 'Absolutely loved the quiet countryside!');

-- Inserting into Cart
INSERT INTO Cart (UserID, PropertyID, BookingDate)
VALUES 
(2, 1, '2023-04-10'),
(3, 2, '2023-04-15'),   
(2, 3, '2023-05-01'),
(3, 4, '2023-05-05');

-- Inserting into Bookings
INSERT INTO Bookings (UserID, PropertyID, CheckInDate, CheckOutDate, TotalPrice, Status)
VALUES 
(2, 1, '2023-06-15', '2023-06-20', 1000.00, 'Confirmed'),
(3, 2, '2023-07-01', '2023-07-05', 800.00, 'Pending'),
(2, 3, '2023-05-20', '2023-05-25', 750.00, 'Cancelled'),
(3, 4, '2023-08-10', '2023-08-15', 1200.00, 'Confirmed');

-- Inserting into Admins
INSERT INTO Admins (FirstName, LastName, Email, Password)
VALUES 
('Emma', 'Thompson', 'emma.thompson@email.com', MD5('adminpass1')),
('James', 'Miller', 'james.miller@email.com', MD5('adminpass2'));
