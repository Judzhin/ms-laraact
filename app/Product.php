<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace Laraact;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package Laraact
 * @code php artisan make:model Product -m
 */
class Product extends Model
{
    /** @var string */
    // protected $table = 'tbl_products';

    /** @var array */
    protected $fillable = ['title', 'description', 'price', 'availability'];
}
