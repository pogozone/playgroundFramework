<?php
namespace App\Models;

class Plant
{
    protected $id;
    protected $name;
    protected $description;
    protected $type;
    protected $year;
    protected $month;
    protected $slug;

    // GET METHODS
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    // SET METHODS
    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setYear(int  $year)
    {
        $this->year = $year;
    }

    public function setMonth(string $month)
    {
        $this->month = $month;
    }

    public function setSlug(string $slug)
    {
        $this->slug = $slug;
    }

    public function create(array $data)
    {

    }

    public function read(int $id)
    {

    }

    public function update(int $id, array $data)
    {

    }

    public function delete(int $id)
    {

    }
}
