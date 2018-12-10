<?php

class Permission extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $permission_id;

    /**
     *
     * @var string
     */
    public $permissionname;

    /**
     *
     * @var integer
     */
    public $role_id;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("mus");
        $this->setSource("permission");
        $this->belongsTo(
            'role_id',
            'Role',
            'idrole'
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'permission';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permission[]|Permission|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Permission|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
