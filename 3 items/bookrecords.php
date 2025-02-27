<?php
require 'vendor/autoload.php';

$faker = Faker\Factory::create();

$genres = ['Science Fiction', 'Fantasy', 'Mystery', 'Thriller', 'Romance', 'Western', 'Dystopian', 'Contemporary'];

$books = [];

for ($i = 0; $i < 15; $i++) {
    $books[] = [
        'Title' => $faker->sentence(3), 
        'Author' => $faker->name,
        'Genre' => $faker->randomElement($genres),
        'PublicationYear' => $faker->numberBetween(1900, 2024),
        'ISBN' => $faker->isbn13,
        'Summary' => $faker->text(100) // Short summary
    ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2 class="text-center mb-4">Book Collection</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Year</th>
                <th>ISBN</th>
                <th>Summary</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($books as $book): ?>
                <tr>
                    <td><?= htmlspecialchars($book['Title']) ?></td>
                    <td><?= htmlspecialchars($book['Author']) ?></td>
                    <td><?= htmlspecialchars($book['Genre']) ?></td>
                    <td><?= $book['PublicationYear'] ?></td>
                    <td><?= $book['ISBN'] ?></td>
                    <td><?= htmlspecialchars($book['Summary']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
