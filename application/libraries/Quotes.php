<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes {

  private $quotes = '';
  private $CI;

  public function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->helper('url');
    $this->CI->load->library('stack');
    $this->quotes = json_decode(file_get_contents(base_url('assets/quotes.json')));
  }

  /*
  Returns all quotes.
  */
  public function all_quotes()
  {
    return $this->quotes;
  }

  /*
  Returns a list of all authors.
  */
  public function all_authors()
  {
    $authors = [
      "Richard Baxter",
      "Alistair Begg",
      "Loraine Boettner",
      "James M. Boice",
      "Jerry Bridges",
      "Jeremiah Burroughs",
      "John Calvin",
      "D.A. Carson",
      "Jonathan Edwards",
      "William Gurnall",
      "Michael Horton",
      "Christopher Love",
      "John MacArthur",
      "Robert McCheyne",
      "Matthew Mead",
      "John Owen",
      "J.I. Packer",
      "John Piper",
      "J.C. Ryle",
      "R.C. Sproul",
      "Charles Spurgeon",
      "A.W. Tozer",
      "Thomas Watson",
      "George Whitefield"
    ];
    return $authors;
  }

  /*
  Returns all quotes from the given author.
  */
  public function all_quotes_from($author_name)
  {
    $author_name = strtolower(urldecode($author_name));
    foreach ($this->quotes as $key => $quote) {
      if (strcmp(strtolower($quote->author),$author_name) == 0) {
        $this->CI->stack->push($quote);
      }
    }
    return $this->CI->stack->get_values();
  }

  /*
  Returns a random quote from the given author.
  */
  public function quote_from($author_name)
  {
    $quotes = $this->all_quotes_from($author_name);
    $x = rand(0, count($quotes));
    return $quotes[$x];
  }

  /*
  Returns a random quote.
  */
  public function random_quote()
  {
    $x = rand(0, count($this->quotes));
    return $this->quotes[$x];
  }
}