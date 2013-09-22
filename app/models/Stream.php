<?php 

class Stream extends Eloquent {

	protected $table = 'streams';

	protected $fillable = ['name', 'filesize', 'user_id', 'original_name'];

}