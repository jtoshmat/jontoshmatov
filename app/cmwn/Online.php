<?php

namespace app\cmwn;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Cartalyst\Sentry\Facades\FuelPHP\Sentry;

class Online extends Model {

	/**
	 * {@inheritDoc}
	 */
	public $table = 'sessions';

	/**
	 * {@inheritDoc}
	 */
	public $timestamps = false;

	/**
	 * Returns all the guest users.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeGuests($query)
	{
		return $query->whereNull('user_id');
	}

	/**
	 * Returns all the registered users.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeRegistered($query)
	{
		return $query->whereNotNull('user_id')->with('user');
	}

	/**
	 * Updates the session of the current user.
	 *
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function scopeUpdateCurrent($query)
	{
		return $query->where('id', Session::getId())->update(array(
			'user_id' => Sentry::check() ? Sentry::getUser()->id : null
		));
	}

	/**
	 * Returns the user that belongs to this entry.
	 *
	 * @return \Cartalyst\Sentry\Users\EloquentUser
	 */
	public function user()
	{
		return $this->belongsTo('Cartalyst\Sentry\Users\EloquentUser'); # Sentry 3
		// return $this->belongsTo('Cartalyst\Sentry\Users\Eloquent\User'); # Sentry 2
	}

}