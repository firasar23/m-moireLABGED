
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use. fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width,intial-scale=1.0"/>
    <title>LabGed</title>
<body>
    <header>
        <img src="cropped-logo-labged.png" alt="Logo">
    <div class="search">
        <div class="icon"></div>
        <div class="input">
        <input type="text" placeholder="search..." id="mysearch">
        </div>
        <span class="clear" onclick="document.getElementById('mysearch').value = ''"></span>
    </div>     
        <script>
            const icon = document.querySelector('.icon');
            const search = document.querySelector('.search');
            icon.onclick = function(){
            search.classList.toggle('active')
            }
            const searchInput = document.getElementById('mysearch');
        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                const query = searchInput.value;
                if (query.trim() !== '') {
                    const url = `https://scholar.google.com/scholar?q=${encodeURIComponent(query)}`;
                    window.open(url, '_blank');
                }
            }
        });
        </script>
        <a href="#" class="logo" > <span>L</span>ab<span>G</span>ed</a>
    <div class="menuToggle" onclick="toggleMenu();"></div>
    <ul class="navbar">
        <li><a href="#desc" onclick="toggleMenu();">Descreption</a></li>
        <li><a href="#pub" onclick="toggleMenu();">Publication</a></li>
        <li><a href="affequipeu.php" onclick="toggleMenu();">Research Teams</a></li>
        <li><a href="afftheseu.php" onclick="toggleMenu();">Research projects</a></li>
        <li><a href="#" onclick="toggleMenu();">HOME</a></li>
    </ul>  
   
</header>



<section class="banniere" id="banniere">
    <div class="contenu">
        <h2 class="logo"><span>L</span>ab<span>G</span>ed</h2>
        <p>management laboratory</p> 
        <p>Electronic document</p>
        <a href="login.php" class="btn2">login</a>
    </div>
</section>
<section class="menu3" id="menu3">
    <div class="row" id="desc">
        <div class="col50">
            <h2 class="titre-texte"><span>D</span>escreption</h2>
            <p style="color: black;font-size: 30px;font-family: Arial Rounded MT Bold;text-align: left;">Much of the research work carried out by the various LabGED teams responds much more to a logic of integration and responses to socio-economic needs in the field of document processing, whatever its nature, and work in close collaboration with industrial and social partners based mainly on AI paradigms. This is doubly productive because such investments in real applications, using innovative technologies, especially AI, can only lead to academic work of scientific quality not only high but validated, quick to produce not only scientific production quality but also patents and results in the socio-economic field</p>
        </div>        
    </div>
    <div class="row" id="pub">
        <div class="col50">
            <h2 class="titre-texte"><span>P</span>ublication</h2>
        </div>        
    </div>




    <section id="blog">
        <div class="blog-heading">
            <strong>Recent Projects</strong>
            <h3>Our Project</h3>
        </div>
        <div class="blog-box-container">

            <div class="blog-box">
                <div class="blog-box-img">
                    <img src="./images/photo.jpg" alt="blog img">
                    <a href="#" class="blog-box-img-link">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
                <div class="blog-box-text">
                    <strong>Name of project</strong>
                    <a href="#">Descreption of the project</a>
                    <p>Author</p>
                </div>
            </div>

            <div class="blog-box">
                <div class="blog-box-img">
                    <img src="./images/photo.jpg" alt="blog img">
                    <a href="#" class="blog-box-img-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
                <div class="blog-box-text">
                    <strong>Name of project</strong>
                    <a href="#">Descreption of the project</a>
                    <p>Author</p>
                </div>
            </div>

            <div class="blog-box">
                <div class="blog-box-img">
                    <img src="./images/photo.jpg" alt="blog img">
                    <a href="#" class="blog-box-img-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
                <div class="blog-box-text">
                    <strong>Name of project</strong>
                    <a href="#">Descreption of the project</a>
                    <p>Author</p>
                </div>
            </div>
            <div class="blog-box">
                <div class="blog-box-img">
                    <img src="./images/photo.jpg" alt="blog img">
                    <a href="#" class="blog-box-img-link">
                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                    </a>
                </div>
                <div class="blog-box-text">
                    <strong>Name of project</strong>
                    <a href="#">Descreption of the project</a>
                    <p>Author</p>
                </div>
            </div>
            
        </div>
    </section>


 <div class="titre">
    <a href="#" class="btn1">Page Up</a>
 </div>
</section>
 

 <script type="text/javascript">
     window.addEventListener('scroll', function(){
         const header =document.querySelector('header');
         header.classList.toggle("sticky", window.scrollY > 0 );
     });

     function toggleMenu(){
         const tmenuToggle = document.querySelector('.menuToggle');
         const navbar = document.querySelector('.navbar');
         navbar.classList.toggle('active');
         menuToggle.classList.toggle('active');
     }
 </script>
</body>
</html>

