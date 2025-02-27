<?php 
    require ('vendor/autoload.php'); 

    $faker = Faker\Factory::create('en_PH');

    $first_names = ["Juan", "Maria", "Jose", "Ana", "Pedro"];
    $last_names = ["Dela Cruz", "Santos", "Caabay", "Castillo"];

    for ($i = 0; $i <= 5; $i++) { 
        $fil_name = $first_names[array_rand($first_names)] . ' ' . $last_names[array_rand($last_names)];
        $email = $faker->email; 
        $phone_number = '+63 ' . $faker->numerify('9## ### ####'); 
        $complete_address = $faker->address; 
        $birthdate = $faker->date($format = 'Y-m-d', $max = 'now'); 
        $job_title = $faker->jobTitle; 
        
        echo "Name: $fil_name \n"; 
        echo "Email: $email \n"; 
        echo "Phone Number: $phone_number \n"; 
        echo "Complete Address: $complete_address \n"; 
        echo "Birthdate: $birthdate \n"; 
        echo "Job Title: $job_title \n"; 
        echo "\n"; 
    }
?>