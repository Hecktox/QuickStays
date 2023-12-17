

<?php
require_once 'Models/ReviewModel.php';

class ReviewController
{
    public function list()
    {
        $reviewModel = new ReviewModel();
        $reviews = $reviewModel->getReviews();
        include 'Views/Review/list.php';
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['saveReview'])) {
            $reviewID = $_POST['ReviewID'];
            $reviewModel = new ReviewModel();
            $review = $reviewModel->getReviewByID($reviewID);

            if ($review) {
                $propertyID = $_POST['PropertyID'];
                $userID = $_POST['UserID'];
                $rating = $_POST['Rating'];
                $comment = $_POST['Comment'];

                $reviewModel->updateReview($reviewID, $propertyID, $userID, $rating, $comment);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=review&action=list');
                exit();
            } else {
                echo "<p>Review not found!</p>";
            }
        } elseif (isset($_GET['ReviewID'])) {
            $reviewID = $_GET['ReviewID'];
            $reviewModel = new ReviewModel();
            $review = $reviewModel->getReviewByID($reviewID);

            if ($review) {
                include 'Views/Review/edit.php';
            } else {
                echo "<p>Review not found!</p>";
            }
        } else {
            echo "<p>Invalid Review ID!</p>";
        }
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addReview'])) {
            $propertyID = $_POST['PropertyID'];
            $userID = $_POST['UserID'];
            $rating = $_POST['Rating'];
            $comment = $_POST['Comment'];

            $reviewModel = new ReviewModel();
            $reviewModel->addReview($propertyID, $userID, $rating, $comment);

            header('Location: /eCommerce-Project/QuickStays/index.php?entity=review&action=list');
            exit();
        } else {
            include 'Views/Review/add.php';
        }
    }

    public function delete()
    {
        if (isset($_GET['ReviewID'])) {
            $reviewID = $_GET['ReviewID'];
            $reviewModel = new ReviewModel();
            $review = $reviewModel->getReviewByID($reviewID);

            if ($review) {
                $reviewModel->deleteReview($reviewID);
                header('Location: /eCommerce-Project/QuickStays/index.php?entity=review&action=list');
                exit();
            } else {
                echo "<p>Review not found!</p>";
            }
        } else {
            echo "<p>Invalid Review ID!</p>";
        }
    }
}
