<?php
require "classes.php";

$new_review_rating = $_POST["rating"];
$new_review_title = $_POST["title"];
$new_review_description = $_POST["description"];

$new_review = new Review($new_review_rating, $new_review_title, $new_review_description);

$reviews_json_file = file_get_contents("reviews.json", true);
$reviews_json = json_decode($reviews_json_file, true);
$reviews = [];

foreach ($reviews_json as $review_json) {
    $review_obj = new Review($review_json["rating"], $review_json["title"], $review_json["description"]);
    array_push($reviews, $review_obj);
}
array_push($reviews, $new_review);


$encoded_reviews = json_encode($reviews);

if (file_put_contents('./reviews.json', $encoded_reviews) === false) {
    echo "Error writing to file";
} else {
    header("Location: /product-review");
    exit;
}