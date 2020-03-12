<?php namespace Zivica\Carpooling\Models;

use Model;
use Mail;
use Ramsey\Uuid\Uuid;

/**
 * Driver Model
 */
class Driver extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public function beforeCreate()
    {
        $this->uuid = Uuid::uuid4()->toString();
    }
    public function afterCreate()
    {
        // Mail::rawTo('marekguspan4@gmail.com', 'uspesne odoslany mail');
    }

    /**
     * @var string The database table used by the model.
     */
    public $table = 'zivica_carpooling_drivers';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
        'passengers' => [
            'Zivica\Carpooling\Models\Passenger',
            'key'    => 'driver_id',
            'otherKey' => 'id'
        ]
    ];
    public $belongsTo = [
        'event' => [
            'Zivica\Carpooling\Models\Event',
            'key' => 'event_id'
        ]
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
