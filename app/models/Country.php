<?php

class Country extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $country_id;

    /**
     *
     * @var string
     */
    public $country_title;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("country");
        $this->hasMany(
            'country_id',
            'ArtObjects',
            'country_id'
        );
        $this->hasMany(
            'country_id',
            'Artist',
            'Country_country_id'
        );

    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'country';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Country[]|Country|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Country|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
