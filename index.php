<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
</head>

<body>
    <main class="container">
        <div class="card col-7">
            <img src="https://picsum.photos/200/" alt="product image" class="card-img-top">
            <div class="card-body">
                <div class="card-title">
                    <h3>A very interesting product name</h3>
                </div>
                <div class="card-description">A very detailed product description</div>
            </div>
        </div>
    </main>
    <article class="container">
        <h1 class="text-center my-3">Reviews</h1>
        <?
        require "classes.php";
        require "read_reviews.php";

        $reviews = read_reviews();
        foreach ($reviews as $review) {
            $review->add_review();
        }
        ?>
    </article>
    <section id="add-review" class="container">
        <h1 class="my-4">Already got this product? Let us know what you think about it!</h1>

        <form action="update-reviews.php" method="POST">
            <div class="d-flex flex-row-reverse justify-content-end my-1">
                <input type="radio" name="rating" class="star" value="5" checked>
                <input type="radio" name="rating" class="star" value="4">
                <input type="radio" name="rating" class="star" value="3">
                <input type="radio" name="rating" class="star" value="2">
                <input type="radio" name="rating" class="star" value="1">
            </div>
            <div class="form-floating my-1">
                <input type="text" name="title" id="title" placeholder="Enter your title here" class="form-control"
                    required>
                <label for="title">Enter title here...</label>
            </div>
            <div class="form-floating my-1">
                <textarea name="description" placeholder="Enter your description here" class="form-control"
                    style="min-height: 200px" required></textarea>
                <label for="description">Describe your review...</label>
            </div>
            <input type="submit" value="Submit review" class="btn btn-outline-primary my-2">

        </form>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>