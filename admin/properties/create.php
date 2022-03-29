<?php

//Connection to DataBase
require '../../includes/config/database.php';
$db = connectDataBase();

//Consultation to get the sellers
$consultation = "SELECT * FROM seller";
$result = mysqli_query($db, $consultation);

//Array with errors message
$errors = [];

$title = '';
$price = '';
$description = '';
$rooms = '';
$wc = '';
$parking = '';
$sellerId = '';

//Execute when the user send the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Sanitization to prevent SQL Injection -> mysqli_real_scape_string
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $rooms = mysqli_real_escape_string($db, $_POST['rooms']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $parking = mysqli_real_escape_string($db, $_POST['parking']);
    $sellerId = isset($_POST['seller']);

    if (!$title) {
        $errors[] = 'You must add a title';
    }

    if (!$price) {
        $errors[] = 'The price is required';
    }

    if (strlen($description) < 5) {
        $errors[] = 'You have to add a description';
    }

    if (!$rooms) {
        $errors[] = 'Rooms are required';
    }

    if (!$wc) {
        $errors[] = 'Bathrooms are required';
    }

    if (!$parking) {
        $errors[] = 'The parking is required';
    }

    if (!$sellerId) {
        $errors[] = 'Choose a seller';
    }

    if (empty($errors)) {
        //Insert into database
        $query = "INSERT INTO propierties (title, price, description, rooms, wc, parking, sellerId) 
        VALUES ('$title', '$price', '$description', '$rooms', '$wc', '$parking', '$sellerId')";

        //Redirect users
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: /admin');
        }
    }
}

require '../../includes/functions.php';
addTemplate('header');
?>

<main class="container section">
    <h1>Create</h1>
    <a href="/admin" class="button-yellow"> Go back </a>

    <?php foreach ($errors as $error) : ?>
        <div class="alert error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>

    <form class="form" method="POST" action="/admin/properties/create.php">
        <fieldset>
            <legend>General Information</legend>

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Property Title" value="<?php echo $title; ?>">

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Property Price" min="200" value="<?php echo $price; ?>">

            <label for="image">Image:</label>
            <input type="file" id="image" accept="image/jpeg, image/png">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?php echo $description; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Property Information</legend>

            <label for="rooms">Rooms:</label>
            <input type="number" id="rooms" name="rooms" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo $rooms; ?>">

            <label for="wc">Bathrooms:</label>
            <input type="number" id="bathrooms" name="wc" placeholder="Property Title" min="1" max="10" placeholder="Ex: 3" value="<?php echo $wc; ?>">

            <label for="parking">Parking:</label>
            <input type="number" id="parking" name="parking" placeholder="Property Title" min="1" max="5" placeholder="Ex: 3" value="<?php echo $parking; ?>">
        </fieldset>

        <fieldset>
            <legend>Seller</legend>

            <select name="seller" title="seller">
                <option value="0" disabled selected>--Select a seller--</option>
                <?php while ($seller = mysqli_fetch_assoc($result)) : ?>
                    <option <?php echo $sellerId === $seller['id'] ? 'selected' : ''; ?> value="<?php echo $seller['id']; ?>">
                        <?php echo $seller['name'] . " " . $seller['surname'] ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Create Property" class="button-green">
    </form>
</main>

<?php
addTemplate('footer');
?>