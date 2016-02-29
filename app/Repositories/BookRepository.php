<?php
namespace Repositories;
use Book;
/**
 *
 */
class BookRepository {
	/**
	 * @param Book $book
	 */
	public function __construct(Book $book) {
		$this->book = $book;
	}
	/**
	 * @param $data
	 */
	public function add($data) {
		$this->book->create($data);
	}
	/**
	 * @param $data
	 */
	public function update($data) {
		$books = $this->book->find($data['bookid']);
		$books->book_name = $data['bookname'];
		$books->author = $data['author'];
		$books->edition = $data['edition'];
		$books->category = $data['category'];
		$books->save();
	}
	/**
	 * @return mixed
	 */
	public function getAllBooks() {
		return $this->book->get();
	}
	/**
	 * @param $id
	 */
	public function deleteBooks($id) {
		$books = $this->book->find($id);
		$books->delete();
	}
}