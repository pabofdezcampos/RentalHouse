<?php
require 'includes/app.php';
addTemplate('header', $start = true);
?>

<main class="container section content-center">
    <h1>Guide for the decoration of your house</h1>
    <picture>
        <source srcset="build/img/destacada2.webp" type="image/webp">
        <source srcset="build/img/destacada2.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada2.jpg" alt="Image of the propierty">
    </picture>
    <p class="meta-information">Wrote: <span>22/10/2021</span> &nbsp by: <span>Admin</span></p>
    <div class="summary-propierty">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, voluptatibus. Commodi veniam quis ex ipsum necessitatibus pariatur expedita? Libero debitis blanditiis asperiores incidunt commodi molestiae alias maiores. Qui, suscipit voluptatum.
        </p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia ducimus deleniti, obcaecati fugit dolor voluptatem voluptas, sunt asperiores nulla numquam iusto? Nesciunt vitae, architecto dolor sed totam assumenda dicta. Quidem?
        </p>
    </div>

</main>

<?php addTemplate('footer') ?>