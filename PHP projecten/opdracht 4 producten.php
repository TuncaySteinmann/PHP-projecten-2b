<?php

abstract class Product {
    public $naam;
    public $inkoopprijs;
    public $btw;
    public $omschrijving;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving) {
        $this->naam = $naam;
        $this->inkoopprijs = $inkoopprijs;
        $this->btw = $btw;
        $this->omschrijving = $omschrijving;
    }

    abstract public function getProductInformatie();
}

class Music extends Product {
    public $artiest;
    public $nummers;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $artiest, $nummers) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->artiest = $artiest;
        $this->nummers = $nummers;
    }

    public function getProductInformatie() {
        return "Artiest: " . $this->artiest . "<br>" .
               "Nummers: " . implode(", ", $this->nummers);
    }
}

class Film extends Product {
    public $kwaliteit;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $kwaliteit) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->kwaliteit = $kwaliteit;
    }

    public function getProductInformatie() {
        return "Kwaliteit: " . $this->kwaliteit;
    }
}

class Game extends Product {
    public $genre;
    public $minimaleHardwareEisen;

    public function __construct($naam, $inkoopprijs, $btw, $omschrijving, $genre, $minimaleHardwareEisen) {
        parent::__construct($naam, $inkoopprijs, $btw, $omschrijving);
        $this->genre = $genre;
        $this->minimaleHardwareEisen = $minimaleHardwareEisen;
    }

    public function getProductInformatie() {
        return "Genre: " . $this->genre . "<br>" .
               "Minimale hardware eisen: " . $this->minimaleHardwareEisen;
    }
}

class ProductList {
    public $producten = [];

    public function addProduct($product) {
        $this->producten[] = $product;
    }

    public function generateTable() {
        $html = "<table border='1'>
                    <tr>
                        <th>Naam van product</th>
                        <th>Categorie</th>
                        <th>Verkoopprijs</th>
                        <th>Informatie over het product</th>
                    </tr>";
        
        foreach ($this->producten as $product) {
            $verkoopprijs = $product->inkoopprijs * (1 + $product->btw);
            
            $html .= "<tr>
                        <td>{$product->naam}</td>
                        <td>" . get_class($product) . "</td>
                        <td>{$verkoopprijs}</td>
                        <td>{$product->getProductInformatie()}</td>
                      </tr>";
        }
        
        $html .= "</table>";
        
        return $html;
    }
}

// Producten aanmaken
$music = new Music("Best of Queen", 10, 0.21, "Greatest hits album", "Queen", ["Bohemian Rhapsody", "Another One Bites the Dust", "We Will Rock You"]);
$film = new Film("The Dark Knight", 15, 0.21, "Action movie", "Blu-ray");
$game = new Game("The Witcher 3: Wild Hunt", 20, 0.21, "Open-world RPG", "Action RPG", "Minimale: Intel Core i5-2500K 3.3GHz / AMD Phenom II X4 940");

// Producten toevoegen aan de ProductList
$productList = new ProductList();
$productList->addProduct($music);
$productList->addProduct($film);
$productList->addProduct($game);

// Tabel genereren
echo $productList->generateTable();

?>
