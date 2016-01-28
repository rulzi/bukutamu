<?php

namespace Afandi\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * BukuTamu
 *
 * @ORM\Table(name="buku_tamu")
 * @ORM\Entity(repositoryClass="Afandi\MainBundle\Repository\BukuTamuRepository")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
 */
class BukuTamu
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
     * @Assert\NotBlank()
     * @ORM\Column(name="nama", type="string", length=255)
     */
    private $nama;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="pesan", type="text")
     */
    private $pesan;

    /**
     *
     * @Vich\UploadableField(mapping="images", fileNameProperty="file")
     * 
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     * 
     * @ORM\Column(name="file", type="string", length=255, nullable=true)
     */
    private $file;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="datetime")
     */
    private $updatedAt;


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
     * Set nama
     *
     * @param string $nama
     * @return BukuTamu
     */
    public function setNama($nama)
    {
        $this->nama = $nama;

        return $this;
    }

    /**
     * Get nama
     *
     * @return string 
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Set pesan
     *
     * @param string $pesan
     * @return BukuTamu
     */
    public function setPesan($pesan)
    {
        $this->pesan = $pesan;

        return $this;
    }

    /**
     * Get pesan
     *
     * @return string 
     */
    public function getPesan()
    {
        return $this->pesan;
    }

    /**
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return BukuTamu
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set createdAt
     * @ORM\PrePersist
     * @param \DateTime $createdAt
     * @return BukuTamu
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     * @ORM\PreUpdate
     * @param \DateTime $updatedAt
     * @return BukuTamu
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
