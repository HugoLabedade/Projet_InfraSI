<?php

namespace App\DataFixtures;

use App\Entity\Questions;
use App\Entity\Themes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $listes_themes = ["Manga et Anime", "Comics", "Animaux", "Sport", "Dessins animés", "Cinéma", "Harry Potter"];

        foreach($listes_themes as $theme) {
            $themes = new Themes();
            $themes->setNomTheme($theme);

            $manager->persist($themes);
        }


        $question = new Questions();
        $question2 = new Questions();

        $question->setQuestion("Quel est le manga le plus vendu de tous les temps ?")
            ->setReponse1("Dragon Ball")
            ->setReponse2("One Piece")
            ->setReponse3("Naruto")
            ->setReponse4("Blue Lock")
            ->setReponseJuste(2)
            ->setTheme("Manga et Anime");
        $manager->persist($question);


        $question2->setQuestion("Dans One Piece, comment s'appelle le roi des pirates ?")
            ->setReponse1("Gold Roger")
            ->setReponse2("Akainu")
            ->setReponse3("Gol D. Roger")
            ->setReponse4("Baggy")
            ->setReponseJuste(3)
            ->setTheme("Manga et Anime");
        $manager->persist($question2);

        $manager->flush();
    }
}
