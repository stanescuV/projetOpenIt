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
            <label>Create Movie</label>
            <input type='text' id="movieInput">
            <button id='createButton'>Create</button>
            <div id="moviesContainer"></div>
        </div>

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
        let movies = JSON.parse(localStorage.getItem('movies')) || [];
        let favoris = JSON.parse(localStorage.getItem('favoris')) || [];

        // fonctions pour la gestion du localStorage
        function addMovie(movieName) {
            movies.push(movieName);
            localStorage.setItem('movies', JSON.stringify(movies));
        }

        function getMovies() {
            return JSON.parse(localStorage.getItem('movies')) || [];
        }

        function removeMovie(movieName) {
            // jsp si un user peut arriver à faire ça mais bon, faut se méfier
            if (movies.length <= 0) {
                window.alert("You cannot remove an item that isn't added");
            }

            movies = movies.filter(movie => movie !== movieName);
            localStorage.setItem('movies', JSON.stringify(movies));
        }

        function addFavoris(movieName) {
            if (!favoris.includes(movieName)) {
                favoris.push(movieName);
                localStorage.setItem('favoris', JSON.stringify(favoris));
            }
        }

        function removeFavoris(movieName) {
            favoris = favoris.filter(movie => movie !== movieName);
            localStorage.setItem('favoris', JSON.stringify(favoris));
        }

        function getFavoris() {
            return JSON.parse(localStorage.getItem('favoris')) || [];
        }

        // Function to create films dynamically
        document.getElementById('createButton').addEventListener('click', function () {
            const movieName = document.getElementById('movieInput').value;

            if (movies.includes(movieName)) {
                window.alert("Movie already added!");
                return;
            }

            addMovie(movieName);

            if (movieName !== "") {
                const movieDiv =
                    `<div class="film" id="${movieName}">
                        <div class="image">
                            <img src="images/film.jpg" alt="Film 1">
                        </div>
                        <p>Film: ${movieName}</p>
                        <div class="minus"></div>
                        <div class="heart" data-movie-name="${movieName}">
                            <svg class="heart-icon" id="heart-${movieName}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1 7.8 7.8 7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z"></path>
                            </svg>
                        </div>
                    </div>`;
                document.getElementById('moviesContainer').innerHTML += movieDiv;
                document.getElementById('movieInput').value = '';
            } else {
                window.alert('Please enter the film name');
            }
        });

        // Render containers on screen au debut
        let moviesInContainer = getMovies();
        if (moviesInContainer.length > 0) {
            moviesInContainer.forEach((movie) => {
                const movieDiv =
                    `<div class="film" id="${movie}">
                        <div class="image">
                            <img src="images/film.jpg" alt="Film 1">
                        </div>
                        <p>Film: ${movie}</p>
                        <div class="minus"></div>
                        <div class="heart" data-movie-name="${movie}">
                            <svg class="heart-icon" id="heart-${movie}" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1 7.8 7.8 7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z"></path>
                            </svg>
                        </div>
                    </div>`;
                document.getElementById('moviesContainer').innerHTML += movieDiv;
            });
        }

        // makes <3 red :)
        const moviesContainer = document.getElementById('moviesContainer');
        moviesContainer.addEventListener('click', function (event) {
            const heart = event.target.closest('.heart');
            if (!heart) return;

            const svg = heart.querySelector('.heart-icon');
            if (!svg) return;

            const isActive = svg.getAttribute('fill') === 'red';
            svg.setAttribute('fill', isActive ? 'none' : 'red');

            const movieName = heart.getAttribute('data-movie-name');
            if (!movieName) return;

            if (!isActive) {
                addFavoris(movieName);
                window.alert(`${movieName} has been added to favorites`);
            } else {
                removeFavoris(movieName);
                window.alert(`${movieName} has been removed from favorites`);
            }
        });

        // Removes movies from container, favorites, and movies
        moviesContainer.addEventListener('click', function (event) {
            const minus = event.target.closest('.minus');
            if (!minus) return;

            const movieElement = minus.closest('.film');
            if (!movieElement) return;

            const movieName = movieElement.id;

            removeFavoris(movieName);
            removeMovie(movieName);
            movieElement.remove();
        });
    </script>
</body>

</html>