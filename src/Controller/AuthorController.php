<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    private $authors;

    public function __construct()
    {
        $this->authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg', 'username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg', 'username' => 'William Shakespeare', 'email' => 'william.shakespeare@gmail.com', 'nb_books' => 200),
            array('id' => 3, 'picture' => '/images/Taha_Houssien.jpg', 'username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );
    }

    #[Route('/authors', name: 'list_authors')]
    public function listAuthors(): Response
    {
        $totalBooks = array_sum(array_column($this->authors, 'nb_books'));
        $authorsCount = count($this->authors);

        return $this->render('author/listAuthors.html.twig', [
            'authors' => $this->authors,
            'totalBooks' => $totalBooks,
            'authorsCount' => $authorsCount,
        ]);
    }

    #[Route('/author/{id}', name: 'author_details')]
    public function authorDetails($id): Response
    {
        foreach ($this->authors as $auth) {
            if ($auth['id'] == $id) {
                return $this->render('author/showAuthor.html.twig', [
                    'author' => $auth
                ]);
            }
        }

        throw $this->createNotFoundException('Auteur non trouvé.');
    }
}
