<?php
    const API_URL = "https://whenisthenextmcufilm.com/api";
    # Inicializar session curl
    $ch = curl_init(API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    //$result = file_get_contents(API_URL); //  SOLO GET
    $data = json_decode($result, true);
    curl_close($ch);
    //var_dump($data);

?>


<head>
    <meta charset="utf-8">
    <title>La proxima pelicula Marvel</title>
    <meta name="description" content="La proxima pelicula de Marver"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>
    <style>
        :root {
            color-scheme: light dark;
        }

        body {
            display: grid;
            place-content: center;
        }
        section {
            display: flex;
            justify-content: center;
            text-align: center;
        }
        hgroup {
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        img{
            margin: 0 auto;
        }
    </style>
</head>
<main>
   <!-- <pre style="font-size: 8px; overflow: scroll; height: 250px;">
        <?php //var_dump($data); ?>
    </pre>-->
    <section>
        <img src="<?= $data['poster_url'] ?>" alt="Poster de <?= $data['title'] ?>" width="200" 
        style="border-radius: 16px" />
        <!--<h2>La proxima pelicula de Marvel</h2>-->
    </section>
    <hgroup>
        <h3><?= $data['title'] ?> se estrena en <?= $data["days_until"] ?> días</h3>
        <p>Fecha de estreno: <?= $data['release_date'] ?> </p>
        <p>La siguiente es: <?= $data['following_production']['title'] ?></p>
    </hgroup>
</main>