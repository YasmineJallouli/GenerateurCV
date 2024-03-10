<?php
require("index.php");

class Login{
    private $email;
    
    public function __construct(array $donnees){
        
        $this->hydrate($donnees);
    }
    public function hydrate($donnees){
        foreach ($donnees as $key=>$value){
            $method='set'.ucfirst($key);
            if (method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Générateur de cv</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="shortcut icon" href="logo.png" />
        <script src="test.js"></script>
    </head>
    <body>
        <header>
            <div class="header-logo">
                <img src="logo.png" alt="BY - Generateur CV"/>
            </div>
            <nav class="nav">
                <ul class="nav-items">
                    <li class="nav-item"><a href="login.php"class="nav-color">Creer un CV</a></li>
                    <li class="nav-item"><a href="infoPersonnel.php">Information Personnel</a></li>
                    <li class="nav-item"><a href="infoFormation.php">Information Education</a></li>
                    <li class="nav-item"><a href="infoExperience.php">Information Experience</a></li>
                    <li class="nav-item"><a href="infoCompetences.php">Information Competence</a></li>
                </ul>
                
            </nav>
            
        </header><hr> <br><br>
        <main>
        <div class="main">
            <div class="text-main">
                <h1>Créez un CV personnalisé en quelques minutes!</h1>
                <ul>
                    <form action="" method="post">
                        <label for="email">Adresse E-mail : </label>
                        <input type="email"  name="email"  required><br><br>
                        
                        <input type="submit" value="Creer un CV" name="creer" id="creer"/>
                    </form>
                </ul>
            </div>
            
            
        </div>
    </main>
    <footer>

    </footer>
    </body>
</html>    