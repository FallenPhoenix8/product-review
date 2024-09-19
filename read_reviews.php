<?php
function read_reviews(): array
{

    $reviews_json_arr = [];
    $reviews = [];

    $reviews_json = file_get_contents("reviews.json", true) or die();
    $reviews_json_arr = json_decode($reviews_json, true);

    foreach ($reviews_json_arr as $review_json) {
        $review_obj = new Review($review_json["rating"], $review_json["title"], $review_json["description"]);
        array_push($reviews, $review_obj);
    }

    return $reviews;
}