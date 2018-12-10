<?php

class ArtObjects extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id_no;

    /**
     *
     * @var string
     */
    public $year;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $artist_id;

    /**
     *
     * @var string
     */
    public $country_id;

    /**
     *
     * @var string
     */
    public $epoch_id;

    /**
     *
     * @var string
     */
    public $image;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("art_objects");
        $this->hasOne(
            'id_no',
            'Painting',
            'Art_Objects_id_no'
        );
        $this->hasOne(
            'id_no',
            'Sculpture',
            'Art_Objects_id_no'
        );
        $this->hasOne(
            'id_no',
            'Statue',
            'Art_Objects_id_no'
        );
        $this->hasOne(
            'id_no',
            'Other',
            'Art_Objects_id_no'
        );
        $this->hasOne(
            'id_no',
            'Borrow',
            'Art_Objects_id_no'
        );
        $this->hasOne(
            'id_no',
            'PermanentCollections',
            'Art_Objects_id_no'
        );
        $this->belongsTo(
            'epoch_id',
            'Epoch',
            'epoch_id'
        );
        $this->belongsTo(
            'country_id',
            'Country',
            'country_id'
        );
        $this->belongsTo(
            'artist_id',
            'Artist',
            'artist_id'
        );
        $this->hasManyToMany(
            'id_no',
            'WasShowBy',
            'Art_Objects_id_no', 'Exhibitions_ex_id',
            'Exhibitions',
            'ex_id'
        );
        
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'art_objects';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArtObjects[]|ArtObjects|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ArtObjects|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
