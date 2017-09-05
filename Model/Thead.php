<?php

namespace TangoMan\ListManagerBundle\Model;

use TangoMan\ListManagerBundle\Model\Th;

/**
 * Class Thead
 *
 * @package TangoMan\ListManagerBundle\Model
 */
class Thead implements \JsonSerializable
{
    /**
     * @var array
     */
    private $ths = [];

    /**
     * @var string
     */
    private $class;

    /**
     * @param array $ths
     *
     * @return $this
     */
    public function setThs($ths)
    {
        $this->ths = $ths;

        return $this;
    }

    /**
     * @return array $ths
     */
    public function getThs()
    {
        return $this->ths;
    }

    /**
     * @param \TangoMan\ListManagerBundle\Model\Th $th
     *
     * @return bool
     */
    public function hasTh(Th $th)
    {
        if (in_array($th, $this->ths)) {
            return true;
        }

        return false;
    }

    /**
     * @param \TangoMan\ListManagerBundle\Model\Th $th
     *
     * @return $this
     */
    public function addTh(Th $th)
    {
        if (!$this->hasTh($th)) {
            $this->ths[] = $th;
        }

        return $this;
    }

    /**
     * @param \TangoMan\ListManagerBundle\Model\Th $th
     *
     * @return $this
     */
    public function removeTh(Th $th)
    {
        $ths = $this->ths;

        if ($this->hasth($th)) {
            $remove[] = $th;
            $this->ths = array_diff($ths, $remove);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $class
     *
     * @return Thead
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $json = [];
        if ($this->class) {
            $json['class'] = $this->class;
        }

        $ths = [];
        foreach ($this->ths as $th) {
            $ths[] = $th->jsonSerialize();
        }
        $json['ths'] = $ths;

        return $json;
    }
}
