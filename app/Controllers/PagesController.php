<?php
namespace App\Controllers;

use PDO;
use App\Models\Items;

class PagesController extends Controller
{
  // helper methods
  public function pdoQuery($query)
  {
    $stmt = $this->c->db->query("SELECT * FROM $query");
    $stmt = $stmt->fetchAll(PDO::FETCH_CLASS, Items::class);

    return $stmt;
  }

  /*** Routes Controllers ***/

  // GET /soft-skills
  public function softSkills($request, $response, $args)
  {
    $softSkills = $this->pdoQuery("soft_skills");

    // Render Soft-skills
    return $this->c->view->render($response, 'soft-skills.twig', [
        'title' => 'Soft skills',
        'softSkills' => $softSkills
    ]);
  }

  // GET /skills
  public function skills($request, $response, $args)
  {
    // fetch skills and skills section from the database
    $skills = $this->pdoQuery("skills");
    $skillsSections = $this->pdoQuery("skills_sections");

    // Render Skills
    return $this->c->view->render($response, 'skills.twig', [
        'title'    => 'Skills',
        'skills'   => $skills,
        'sections' => $skillsSections,
        'hide_on_load' => 'item__text'
    ]);
  }

  // GET /lavori-precedenti
  public function lavoriPrecedenti($request, $response, $args)
  {
    // fetch lavori_precedenti from the database
    $lavoriPrecedenti = $this->pdoQuery("lavori_precedenti");

    // Render lavori-precedenti
    return $this->c->view->render($response, 'lavori-precedenti.twig', [
        'title'  => 'Lavori precedenti',
        'lavori' => $lavoriPrecedenti
    ]);
  }

  // GET /istruzione
  public function istruzione($request, $response, $args)
  {
    // fetch istruzione from the database
    $istruzione = $this->pdoQuery("istruzione");

    // Render istruzione
    return $this->c->view->render($response, 'istruzione.twig', [
        'title'  => 'Istruzione',
        'lavori' => $istruzione
    ]);
  }

  // GET /portfolio-lavori
  public function portfolioLavori($request, $response, $args)
  {
    // fetch portfolio_lavori from the database
    $portfolio = $this->pdoQuery("portfolio_lavori");

    // Render portfolio-lavori
    return $this->c->view->render($response, 'portfolio-lavori.twig', [
        'title' => 'Portfolio lavori',
        'portfolio' => $portfolio
    ]);
  }

  // GET /altri-interessi
  public function altriInteressi($request, $response, $args)
  {
    // fetch altri_interessi from the database
    $interessi = $this->pdoQuery("altri_interessi");

    // Render Skills
    return $this->c->view->render($response, 'altri-interessi.twig', [
        'title' => 'Altri interessi',
        'interessi' => $interessi
    ]);
  }

  // GET /lavori-precedenti
  public function libri($request, $response, $args)
  {
    // fetch lavori_precedenti from the database
    $libri = $this->pdoQuery("libri");

    // Render Skills
    return $this->c->view->render($response, 'libri.twig', [
        'title' => 'Libri',
        'libri' => $libri
    ]);
  }

  // GET /su-di-me
  public function suDiMe($request, $response, $args)
  {
    // Render Skills
    return $this->c->view->render($response, 'su-di-me.twig', [
        'title' => 'Su di me'
    ]);
  }
}
