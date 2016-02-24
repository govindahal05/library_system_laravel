<?php

class Member extends Eloquent implements UserInterface, RemindableInterface {

	//public $timestamps = false;
	//protected $fillable = ['username','password'];

	
	protected $table = 'members';

	