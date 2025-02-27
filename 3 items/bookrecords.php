<?php
    require('vendor/autoload.php');

    $faker = Faker\Factory::create();

    $genres = ['Science Fiction', 'Fantasy', 'Mystery', 'Thriller', 'Romance', 'Western', 'Dystopian', 'Contemporary'];

    $books = [];

    for ($i = 0; $i < 15; $i++) {
        $books[] = [
            'Title' => $faker->words(3, true),
            'Author' => $faker->name,
            'Genre' => $faker->randomElement($genres),
            'PublicationYear' => $faker->numberBetween(1900, 2024),
            'ISBN' => $faker->isbn13,
            'Summary' => $faker->paragraph
        ];
    }

    foreach ($books as $book) {
        echo "Title: " . $book['Title'] . "\n";
        echo "Author: " . $book['Author'] . "\n";
        echo "Genre: " . $book['Genre'] . "\n";
        echo "Publication Year: " . $book['PublicationYear'] . "\n";
        echo "ISBN: " . $book['ISBN'] . "\n";
        echo "Summary: " . $book['Summary'] . "\n\n";
    }
?>