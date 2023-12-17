

<?php
require_once 'db_connect.php';

class ReviewModel
{
    public function getReviews()
    {
        global $db;
        $query = $db->query("SELECT * FROM Reviews");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateReview($reviewID, $propertyID, $userID, $rating, $comment)
    {
        global $db;
        $query = $db->prepare("UPDATE Reviews SET PropertyID=?, UserID=?, Rating=?, Comment=? WHERE ReviewID=?");
        $query->execute([$propertyID, $userID, $rating, $comment, $reviewID]);
    }

    public function getReviewByID($reviewID)
    {
        global $db;
        $query = $db->prepare("SELECT * FROM Reviews WHERE ReviewID = ?");
        $query->execute([$reviewID]);
        $review = $query->fetch(PDO::FETCH_ASSOC);
        return $review;
    }

    public function addReview($propertyID, $userID, $rating, $comment)
    {
        global $db;
        $query = $db->prepare("INSERT INTO Reviews (PropertyID, UserID, Rating, Comment) VALUES (?, ?, ?, ?)");
        $query->execute([$propertyID, $userID, $rating, $comment]);
    }

    public function deleteReview($reviewID)
    {
        global $db;
        $query = $db->prepare("DELETE FROM Reviews WHERE ReviewID = ?");
        $query->execute([$reviewID]);
    }
}
