<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $formData = [
        'first_name' => $_POST['fName'],
        'last_name' => $_POST['lName'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'address' => $_POST['address'],
        'gender' => $_POST['gender']
    ];
    $file = 'formdata.json';
    if (file_exists($file)) {
        $currentData = json_decode(file_get_contents($file), true);
    } else {
        $currentData = [];
    }

    $currentData[] = $formData;

    if (file_put_contents($file, json_encode($currentData, JSON_PRETTY_PRINT))) {
        echo "Form submitted successfully!";
    } else {
        echo "There was an error saving the data.";
    }
} else {
    echo "Invalid request method.";
}
