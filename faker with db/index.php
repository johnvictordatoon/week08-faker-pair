<?php
    include "conn.php";
    require ('vendor/autoload.php');

    $faker = Faker\Factory::create('en_PH');

    for ($i = 1; $i <= 50; $i++) {
        $sql = "INSERT INTO office (name, contactnumber, email, address, city, country, postal) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        $company = $faker->company;
        $phone = $faker->phoneNumber;
        $email = $faker->companyEmail;
        $address = $faker->streetAddress;
        $city = $faker->city;
        $country = 'Philippines';
        $postal = $faker->postcode;
        
        $stmt->bind_param("sssssss", $company, $phone, $email, $address, $city, $country, $postal);
        $stmt->execute();
    }

    $office_ids = [];
    $result = $conn->query("SELECT id FROM office");
    while ($row = $result->fetch_assoc()) {
        $office_ids[] = $row['id'];
    }

    for ($i = 1; $i <= 200; $i++) {
        $sql = "INSERT INTO employee (lastname, firstname, office_id, address) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        $lastname = $faker->lastName;
        $firstname = $faker->firstName;
        $random_office = $office_ids[array_rand($office_ids)];
        $emp_address = $faker->address;
        
        $stmt->bind_param("ssis", $lastname, $firstname, $random_office, $emp_address);
        $stmt->execute();
    }

    $employee_ids = [];
    $result = $conn->query("SELECT id FROM employee");
    while ($row = $result->fetch_assoc()) {
        $employee_ids[] = $row['id'];
    }

    $actions = ['In', 'Out'];
    $sql = "INSERT INTO transaction_data (employee_id, office_id, datelog, action, remarks, documentcode) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    for ($i = 1; $i <= 500; $i++) {
        $random_employee = $employee_ids[array_rand($employee_ids)];
        $random_office = $office_ids[array_rand($office_ids)];
        $datelog = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s');
        $action = $actions[array_rand($actions)];
        $remarks = $faker->text(50);
        $documentcode = sprintf('DOC-%04d', $i);
        
        $stmt->bind_param("iissss", $random_employee, $random_office, $datelog, $action, $remarks, $documentcode);
        $stmt->execute();
    }
    $stmt->close();

    echo "Complete. Check the database.";
    $conn->close();
?>