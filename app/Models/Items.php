<?php
namespace App\Models;
class Items {

  // nullable variables
  public $img_alt = null;
  public $section = null;
  public $author  = null;
  public $year    = null;
  public $genre   = null;

  // Render an item: soft-skills, skills, books
  public function renderItem($uri ,$is_first = null)
  {
    // remove the top margin if is the first item
    $margin = "";
    if($is_first !== null || $this->year !== null) {
      $margin = "margin-top--lg";
    }

    // add values if the item is a book
    if ($this->year !== null) {
      $imgClass = 'img--book';
      $col = 'col-xs-12 col-md-6';
      $publication_year = date( 'Y', strtotime($this->year) );
    } else {
      $imgClass = 'img--icon';
      $col = null;
    }

    $output = "
    <div class='{$this->section} {$col}'>
      <img class='{$imgClass} {$margin}' src='/assets/img/$uri/{$this->img_link}' alt='{$this->img_alt}'>
      <h3 class='title'>{$this->title}</h3>
    ";

    if ($this->year !== null) {
      $output .= "<p><b>{$this->author} // {$publication_year} // {$this->genre}</b></p>";
    }

    $output .= "
      {$this->description}
    </div>
    ";
    return $output;
  }

  // Render a title: skills
  public function renderTitle()
  {
    return "
    <a class='{$this->section_class}' href='javascript:void(0)'>
      <h2 class='arrow'>{$this->section_name}</h2>
    </a>
    ";
  }

  // Render a portfolio item: portfolio
  public function renderPortfolio()
  {
    $skills_array = explode(",", $this->skills);

    $skills = "";
    foreach ($skills_array as $skill) {
      $tooltip_text = str_replace( "-", " ", substr($skill, 0, -4) );
      $skills .= "
      <div class='tooltip'>
        <img src='/assets/img/skills/$skill'>
        <span class='tooltip__text'>$tooltip_text</span>
      </div>";
    }

    return "
    <div class='portfolio' style='background: rgba({$this->rgba})'>
      <img class='portfolio__img' src='/assets/img/portfolio/{$this->img_link}' alt='{$this->img_alt}'>
      <h2 class='portfolio__header'>{$this->title}</h2>
      <a class='{$this->item_class}' href='javascript:void(0)'>
        <p class='arrow--white'><b>INFO</b></p>
      </a>
    </div>
    <div class='item__text portfolio__text {$this->item_class}'>
      {$skills}
      <p>{$this->description}</p>
    </div>
    ";
  }
};
