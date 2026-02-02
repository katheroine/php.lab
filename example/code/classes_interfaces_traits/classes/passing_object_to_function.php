#!/usr/bin/php8.1
<?php

class Book {
  public string $title;
  public string $author;
  public string $isbn;

  public function __construct(string $title, string $author, string $isbn) {
    $this->title = $title;
    $this->author = $author;
    $this->isbn = $isbn;
  }
}

function describe_book_by_reference(Book $described_book) : void {
  print("This is a book [by reference]:\n");
  print('title: ' . $described_book->title . "\n");
  print('author: ' . $described_book->author . "\n");
  print('isbn: ' . $described_book->isbn . "\n\n");
}

function describe_book_by_reference_explicitly(Book &$described_book) : void {
  print("This is a book [by reference (explicitly)]:\n");
  print('title: ' . $described_book->title . "\n");
  print('author: ' . $described_book->author . "\n");
  print('isbn: ' . $described_book->isbn . "\n\n");
}

$novel = new Book("Decameron", "Giovanni Boccacio", "978-83-7779-436-4");

print("The book presentation:\n\n");

describe_book_by_reference($novel);
describe_book_by_reference_explicitly($novel);
