<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div id="container">
        <header>
            <div id="image_openit_blue">
                <img src="images/openit_blue.png" alt="OpenIt Blue">
            </div>
            <div class="nav-links">
                <a href="index.html">Acceuil</a>
                <a href="index.html">Liste Films</a>
                <a href="page_fav.html">Liste Favorite</a>
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
            <div class="film">
                <div class="image">
                    <img src="images/film.jpg" alt="Film 1">
                </div>
                <p>Film:</p>
                <div class="minus"></div>
                <div class="heart">
                    <svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1 7.8 7.8 7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z"></path>
                    </svg>
                </div>
                
            </div>
            <div class="film">
                <div class="image">
                    <img src="images/film.jpg" alt="Film 2">
                </div>
                <p>Film:</p>
                <div class="minus"></div>
                <div class="heart">
                    <svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1 7.8 7.8 7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z"></path>
                    </svg>
                </div>
                
            </div>
            <div class="film">
                <div class="image">
                    <img src="images/film.jpg" alt="Film 3">
                </div>
                <p>Film:</p>
                <div class="minus"></div>
                <div class="heart">
                    <svg class="heart-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1 1 7.8 7.8 7.8-7.8 1-1a5.5 5.5 0 0 0 0-7.8z"></path>
                    </svg>
                </div>
                
            </div>
        </div>
        
        <footer>
            
            <div id="image_openit_blue">
                <img src="images/openit.png" alt="OpenIt image" width="100px" height="100px">
            </div>

            <div class='footerLinks'>
                <a href="index.html">Acceuil</a>
                <a href="index.html">Mention Légales</a>
                <a href="index.html">Contact</a>
            </div>

           
        </footer>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".heart").forEach(heart => {
                heart.addEventListener("click", () => {
                    const svg = heart.querySelector('.heart-icon');
                    const isActive = svg.getAttribute('fill') === 'red';
                    svg.setAttribute('fill', isActive ? 'none' : 'red');
                });
            });
        });

    </script>
</body>
</html>
