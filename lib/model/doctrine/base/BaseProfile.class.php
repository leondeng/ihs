<?php

/**
 * BaseProfile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $first_name
 * @property string $last_name
 * @property text $title
 * @property text $philosophy
 * @property date $dob
 * @property date $yearStarted
 * @property enum $beltGrade
 * @property boolean $isInstructor
 * @property integer $idUser
 * @property integer $idSchool
 * @property text $imageName
 * @property boolean $isActive
 * @property sfGuardUser $User
 * @property School $School
 * 
 * @method string      getFirstName()    Returns the current record's "first_name" value
 * @method string      getLastName()     Returns the current record's "last_name" value
 * @method text        getTitle()        Returns the current record's "title" value
 * @method text        getPhilosophy()   Returns the current record's "philosophy" value
 * @method date        getDob()          Returns the current record's "dob" value
 * @method date        getYearStarted()  Returns the current record's "yearStarted" value
 * @method enum        getBeltGrade()    Returns the current record's "beltGrade" value
 * @method boolean     getIsInstructor() Returns the current record's "isInstructor" value
 * @method integer     getIdUser()       Returns the current record's "idUser" value
 * @method integer     getIdSchool()     Returns the current record's "idSchool" value
 * @method text        getImageName()    Returns the current record's "imageName" value
 * @method boolean     getIsActive()     Returns the current record's "isActive" value
 * @method sfGuardUser getUser()         Returns the current record's "User" value
 * @method School      getSchool()       Returns the current record's "School" value
 * @method Profile     setFirstName()    Sets the current record's "first_name" value
 * @method Profile     setLastName()     Sets the current record's "last_name" value
 * @method Profile     setTitle()        Sets the current record's "title" value
 * @method Profile     setPhilosophy()   Sets the current record's "philosophy" value
 * @method Profile     setDob()          Sets the current record's "dob" value
 * @method Profile     setYearStarted()  Sets the current record's "yearStarted" value
 * @method Profile     setBeltGrade()    Sets the current record's "beltGrade" value
 * @method Profile     setIsInstructor() Sets the current record's "isInstructor" value
 * @method Profile     setIdUser()       Sets the current record's "idUser" value
 * @method Profile     setIdSchool()     Sets the current record's "idSchool" value
 * @method Profile     setImageName()    Sets the current record's "imageName" value
 * @method Profile     setIsActive()     Sets the current record's "isActive" value
 * @method Profile     setUser()         Sets the current record's "User" value
 * @method Profile     setSchool()       Sets the current record's "School" value
 * 
 * @package    ihs
 * @subpackage model
 * @author     leondeng <leondeng@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProfile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('profile');
        $this->hasColumn('first_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('last_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('title', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('philosophy', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('dob', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('yearStarted', 'date', null, array(
             'type' => 'date',
             ));
        $this->hasColumn('beltGrade', 'enum', null, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => 'Kup1',
              1 => 'Kup2',
              2 => 'Kup3',
              3 => 'Kup4',
              4 => 'Kup5',
              5 => 'Kup6',
              6 => 'Kup7',
              7 => 'Kup8',
              8 => 'Kup9',
             ),
             ));
        $this->hasColumn('isInstructor', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('idUser', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('idSchool', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('imageName', 'text', null, array(
             'type' => 'text',
             ));
        $this->hasColumn('isActive', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'idUser',
             'foreign' => 'id'));

        $this->hasOne('School', array(
             'local' => 'idSchool',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}