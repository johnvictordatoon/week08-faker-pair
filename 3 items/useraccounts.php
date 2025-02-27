<?php
    require('vendor/autoload.php');

    $faker = Faker\Factory::create();

    for ($i = 0; $i < 10; $i++) {
        $userid = $faker->uuid;
        $name = $faker->name;
        $email = $faker->email;
        $username = strtolower(explode('@', $email)[0]);
        $plain_pass = $faker->password;
        $encrypted_pass = hash('sha256', $plain_pass);
        $acc_created = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d H:i:s');

        echo "User ID: {$userid}\n";
        echo "Name: {$name}\n";
        echo "Email: {$email}\n";
        echo "Username: {$username}\n";
        echo "Password: {$encrypted_pass}\n";
        echo "Account Created: {$acc_created}\n";
        echo str_repeat("-", 40) . "\n";
    }
?>