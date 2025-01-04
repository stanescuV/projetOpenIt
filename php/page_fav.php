<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

<body>
    <div id="container">
        <header>
            <div id="image_openit_blue">
                <img src="images/openit_blue.png" alt="OpenIt Blue">
            </div>
            <div class="nav-links">
                <a href="index.php">Acceuil</a>
                <a href="index.php">Liste Films</a>
                <a href="page_fav.php">Liste Favorite</a>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Rechercher">
                <button type="submit">Search</button>
            </div>
            <div class="settings">
                <img src="images/settings.png" alt="Settings">
            </div>
        </header>

        <div id="main">
            <div id="favorisContainer"> </div>

            <footer>

                <div id="image_openit_blue">
                    <img src="images/openit.png" alt="OpenIt image" width="100px" height="100px">
                </div>

                <div class='footerLinks'>
                    <a href="index.php">Acceuil</a>
                    <a href="index.php">Mention Légales</a>
                    <a href="index.php">Contact</a>
                </div>


            </footer>
        </div>

        <script>
            let favoris = JSON.parse(localStorage.getItem('favoris')) || [];
            console.log(favoris);

            if (favoris.length) {
                favoris.forEach((movie) => {
                    const movieDiv =
                        `<div class="film" id="${movie}">
                            <div class="image">
                                <img src="images/film.jpg" alt="Film 1">
                            </div>
                            <p>Film: ${movie}</p>
                            <div class="heart"  data-movie-name="${movie}">
                                <svg class="heart-icon" id="heart-${movie}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1 7.8 7.8 7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z"></path>
                                </svg>
                            </div>
                        </div>`;
                    document.getElementById('favorisContainer').innerHTML += movieDiv;

                })
            }

        </script>

</body>

</html>