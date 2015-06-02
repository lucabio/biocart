<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Luca
 * Date: 02/06/15
 * Time: 16:06
 */
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Product extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';

    public $timestamps = false;

    protected $fillable = ['*'];

    protected $guarded = ['*'];

}