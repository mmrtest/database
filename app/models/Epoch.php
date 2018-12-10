<?php

class Epoch extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $epoch_id;

    /**
     *
     * @var string
     */
    public $epoch_title;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("epoch");
        $this->hasMany(
            'epoch_id',
            'ArtObjects',
            'epoch_id'
        );
        $this->hasMany(
            'epoch_id',
            'Artist',
            'Epoch_epoch_id'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'epoch';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Epoch[]|Epoch|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Epoch|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
