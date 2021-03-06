<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

        /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;
 /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime", length=10)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime", length=10)
     */
    private $end;
  
    public function __construct(){
        $this->start = new \DateTime("now");
        $this->end = new \DateTime("now");
    }
    

    /**
     * Get id.
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Calendar
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Calendar
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set start.
     *
     * @param \DateTime $start
     *
     * @return Calendar
     */
    public function setStart($start) {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start.
     *
     * @return \DateTime
     */
    public function getStart() {
        return $this->start;
    }

    /**
     * Set end.
     *
     * @param \DateTime $end
     *
     * @return Calendar
     */
    public function setEnd($end) {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end.
     *
     * @return \DateTime
     */
    public function getEnd() {
        return $this->end;
    }

    /**
     * Convert calendar event details to an array.
     *
     * @return array $event
     */
    public function toArray() {
        $event = array();

        if ($this->id !== null) {
            $event['id'] = $this->id;
        }

        $event['title'] = $this->title;
        $event['start'] = $this->start->format('Y-m-d H:i:s');
        $event['end'] = $this->end->format('Y-m-d H:i:s');
        $event['description'] = $this->description;
        $event['allDay'] = false; 
        return $event;
    }


}
