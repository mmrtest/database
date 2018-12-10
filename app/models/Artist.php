<?php

class Artist extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $artist_id;

    /**
     *
     * @var string
     */
    public $firstname;

    /**
     *
     * @var string
     */
    public $midname;

    /**
     *
     * @var string
     */
    public $lastname;

    /**
     *
     * @var string
     */
    public $date_born;

    /**
     *
     * @var string
     */
    public $date_die;

    /**
     *
     * @var string
     */
    public $main_style;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $epoch_epoch_id;

    /**
     *
     * @var string
     */
    public $country_country_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("artist");
        $this->belongsTo(
            'Epoch_epoch_id',
            'Epoch',
            'epoch_id'
        );
        $this->belongsTo(
            'Country_country_id',
            'Country',
            'country_id'
        );
        $this->hasMany(
            'artist_id',
            'Artist',
            'artist_id'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'artist';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Artist[]|Artist|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Artist|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
