<?php 
    require 'vendor/autoload.php'; 

    $faker = Faker\Factory::create('en_PH');

    $first_names = ["Juan", "Maria", "Jose", "Ana", "Pedro"];
    $last_names = ["Dela Cruz", "Santos", "Caabay", "Castillo"];

    $users = [];

    for ($i = 0; $i < 6; $i++) { 
        $users[] = [
            'name' => $first_names[array_rand($first_names)] . ' ' . $last_names[array_rand($last_names)],
            'email' => $faker->email, 
            'phone' => '+63 ' . $faker->numerify('9## ### ####'), 
            'address' => $faker->address, 
            'birthdate' => $faker->date('Y-m-d', 'now'), 
            'job' => $faker->jobTitle
        ];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake Filipino User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2 class="text-center mb-4">Filipino User Data</h2>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Complete Address</th>
                <th>Birthdate</th>
                <th>Job Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['address'] ?></td>
                    <td><?= $user['birthdate'] ?></td>
                    <td><?= $user['job'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
