<?php

// 03- Constante_static_self
    // Maison.class.php

    class Maison{
        public $couleur = 'blanc';
        public static $espaceTerrain = '500m2';
        private $nbPorte = 10;
        private static $nbPiece = 7;
        const HAUTEUR = '10m';

        public function getNbPorte(){
            return $this -> nbPorte;
        }

        public static function getNbPiece(){
            return self::$nbPiece;
        }


    }


// ------------------------
    
    echo 'Terrain : ' . Maison::$espaceTerrain . '<br>'; // Ok je fais appel à un élément appartenant à la classe depuis la classe. 
    echo 'Pieces : ' . Maison::getNbPiece() . '<br>'; // Ok je fais appel à une private via son getter static, donc par la classe. 
    echo 'Hauteur : ' . Maison::HAUTEUR . '<br>'; // Ok je fais appel à une propiété constante appartenant à la classe. 


    $maison = new Maison;
    echo 'couleur : ' . $maison -> couleur . '<br>'; // OK je fais appel à un élément de l'objet par l'objet. 
    // echo 'Terrain : ' . $maison -> espaceTerrain . '<br>';  // ERREUR ! je tente d'appeler un élément appartement à la classe par l'objet. 
    // echo 'Porte : ' . $maison -> nbPorte . '<br>';  // Erreur : je tente d'appeler une proprièté private à l'exterieur de la classe 
    echo 'Porte : ' . $maison -> getNbPorte() . '<br>'; // Ok je fais donc appel à une propriété private via son getter 



/*
    Commentaire :
        Opérateurs : 
            - $objet ->   : élément d'un objet à l'extérieur de la classe
            - $this ->    : élément d'un objet à l'interieur de la classe
            - Class::     : élement d'une classe à l'extérieur de la classe
            - self::      : élément d'une classe à l'intérieur de la classe

        2 Questions à se poser :
            - es que c'est static ? 
                - Si oui :
                    suis je à l'intérieur de la classe ? 
                        si oui : self::
                        si non : Class::

                - Si non :
                        suis je à l'intérieur de la classe ? 
                            si oui : $this ->
                            si non : $objet ->
        

        static , signifie qu'un élément appartient à la classe. Pour y accéder il faut l'appeler par la classe (Class:: ou self::)

        const signifie qu'un élément appartient à la classe et ne sera jamais modifiable 
*/


