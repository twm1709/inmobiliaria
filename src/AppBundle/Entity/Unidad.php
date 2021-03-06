<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"unidad" = "Unidad", "cochera" = "Cochera"})
 */

class Unidad{
	/**
	* @ORM\Column(type="integer")
	* @ORM\Id
	* @ORM\GeneratedValue(strategy="AUTO")
	*/
	protected $id;

	/**
	* @ORM\ManyToOne(targetEntity="Edificio", inversedBy="edificios")
	* @ORM\JoinColumn(name="edificio_id", referencedColumnName="id")
     **/
	protected $edificio;

	/**
	* @ORM\ManyToOne(targetEntity="Propietario", inversedBy="propietarios")
	* @ORM\JoinColumn(name="propietario_id", referencedColumnName="id")
     **/
	protected $propietario;

	/**
	* @ORM\Column(type="string", length=5, nullable=true)
	*/
	protected $op_habilitadas;

	/**
	* @ORM\Column(type="string", length=20, nullable=true)
	*/
	protected $codigo;

	/**
	* @ORM\Column(type="integer", nullable=true)
	*/
	protected $num_carpeta;

	/**
    * @ORM\OneToMany(targetEntity="Autorizacion", mappedBy="unidad")
	*/
	protected $autorizaciones;
	
	/**
    * @ORM\Column(type="text", nullable=true)
	*/
	protected $detalles;

	/**
	* @ORM\Column(type="string", length=20, nullable=true)
	*/
	protected $periodo_sugerido;

	/**
	* @ORM\Column(type="date", nullable=true)
	*/
	protected $fecha_ultima_op;

    /**
    * @ORM\OneToMany(targetEntity="Disponibilidad", mappedBy="unidad")
    */
    protected $disponibilidades;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set opHabilitadas
     *
     * @param string $opHabilitadas
     *
     * @return Unidad
     */
    public function setOpHabilitadas($opHabilitadas)
    {
        $this->op_habilitadas = $opHabilitadas;

        return $this;
    }

    /**
     * Get opHabilitadas
     *
     * @return string
     */
    public function getOpHabilitadas()
    {
        return $this->op_habilitadas;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     *
     * @return Unidad
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set numCarpeta
     *
     * @param integer $numCarpeta
     *
     * @return Unidad
     */
    public function setNumCarpeta($numCarpeta)
    {
        $this->num_carpeta = $numCarpeta;

        return $this;
    }

    /**
     * Get numCarpeta
     *
     * @return integer
     */
    public function getNumCarpeta()
    {
        return $this->num_carpeta;
    }

    
    /**
     * Set detalles
     *
     * @param string $detalles
     *
     * @return Unidad
     */
    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;

        return $this;
    }

    /**
     * Get detalles
     *
     * @return string
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * Set periodoSugerido
     *
     * @param string $periodoSugerido
     *
     * @return Unidad
     */
    public function setPeriodoSugerido($periodoSugerido)
    {
        $this->periodo_sugerido = $periodoSugerido;

        return $this;
    }

    /**
     * Get periodoSugerido
     *
     * @return string
     */
    public function getPeriodoSugerido()
    {
        return $this->periodo_sugerido;
    }

    /**
     * Set fechaUltimaOp
     *
     * @param \DateTime $fechaUltimaOp
     *
     * @return Unidad
     */
    public function setFechaUltimaOp($fechaUltimaOp)
    {
        $this->fecha_ultima_op = $fechaUltimaOp;

        return $this;
    }

    /**
     * Get fechaUltimaOp
     *
     * @return \DateTime
     */
    public function getFechaUltimaOp()
    {
        return $this->fecha_ultima_op;
    }

    /**
     * Set edificio
     *
     * @param \AppBundle\Entity\Edificio $edificio
     *
     * @return Unidad
     */
    public function setEdificio(\AppBundle\Entity\Edificio $edificio = null)
    {
        $this->edificio = $edificio;

        return $this;
    }

    /**
     * Get edificio
     *
     * @return \AppBundle\Entity\Edificio
     */
    public function getEdificio()
    {
        return $this->edificio;
    }

    /**
     * Set propietario
     *
     * @param \AppBundle\Entity\Propietario $propietario
     *
     * @return Unidad
     */
    public function setPropietario(\AppBundle\Entity\Propietario $propietario = null)
    {
        $this->propietario = $propietario;

        return $this;
    }

    /**
     * Get propietario
     *
     * @return \AppBundle\Entity\Propietario
     */
    public function getPropietario()
    {
        return $this->propietario;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->disponibilidades = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add disponibilidade
     *
     * @param \AppBundle\Entity\Disponibilidad $disponibilidade
     *
     * @return Unidad
     */
    public function addDisponibilidade(\AppBundle\Entity\Disponibilidad $disponibilidade)
    {
        $this->disponibilidades[] = $disponibilidade;

        return $this;
    }

    /**
     * Remove disponibilidade
     *
     * @param \AppBundle\Entity\Disponibilidad $disponibilidade
     */
    public function removeDisponibilidade(\AppBundle\Entity\Disponibilidad $disponibilidade)
    {
        $this->disponibilidades->removeElement($disponibilidade);
    }

    /**
     * Get disponibilidades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisponibilidades()
    {
        return $this->disponibilidades;
    }

    /**
     * Add autorizacione
     *
     * @param \AppBundle\Entity\Autorizacion $autorizacione
     *
     * @return Unidad
     */
    public function addAutorizacione(\AppBundle\Entity\Autorizacion $autorizacione)
    {
        $this->autorizaciones[] = $autorizacione;

        return $this;
    }

    /**
     * Remove autorizacione
     *
     * @param \AppBundle\Entity\Autorizacion $autorizacione
     */
    public function removeAutorizacione(\AppBundle\Entity\Autorizacion $autorizacione)
    {
        $this->autorizaciones->removeElement($autorizacione);
    }

    /**
     * Get autorizaciones
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAutorizaciones()
    {
        return $this->autorizaciones;
    }
}
