<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
    header('Content-type: application/json');
    header('Access-Control-Allow-Origin: *');
		$this->load->library(array('quotes','words'));
	}

	/*
  Returns a random quote.
  */
  public function quote()
  {
		echo json_encode($this->quotes->random_quote());
  }

	/*
  Returns all quotes.
  */
	public function quotes()
	{
		echo json_encode($this->quotes->all_quotes());
	}
	
	/*
  Returns a list of all authors.
  */
  public function authors()
  {
    echo json_encode($this->quotes->all_authors());
  }

  /*
  Returns all quotes from the given author.
  */
  public function quotes_from($author_name)
  {
		echo json_encode($this->quotes->all_quotes_from($author_name));
  }

  /*
  Returns a random quote from the given author.
  */
  public function quote_from($author_name)
  {
		echo json_encode($this->quotes->quote_from($author_name));
	}

  /*
  Returns a random word.
  */
  public function word()
  {
		echo json_encode($this->words->random_word());
  }

  /*
  Returns n random words (n is an integer from 1 -> not 1)
  */
  public function words($n)
  {
		echo json_encode($this->words->n_words($n));
	}
}
