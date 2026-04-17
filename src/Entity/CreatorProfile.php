<?php

namespace App\Entity;

use App\Repository\CreatorProfileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CreatorProfileRepository::class)]
class CreatorProfile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'creatorProfile', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $creator = null;

    #[ORM\Column]
    private ?bool $is_company = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $phone_number = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $address = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profile_image = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $bio = null;

    #[ORM\Column(nullable: true)]
    private ?array $social_media_links = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\Column(length: 50)]
    private ?string $first_name = null;

    #[ORM\Column(length: 50)]
    private ?string $last_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_of_birth = null;

    #[ORM\Column(length: 150)]
    private ?string $company_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_of_creation = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $registration_number = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAttendee(): ?User
    {
        return $this->creator;
    }

    public function setAttendee(User $creator): static
    {
        $this->creator = $creator;

        return $this;
    }

    public function isCompany(): ?bool
    {
        return $this->is_company;
    }

    public function setIsCompany(bool $is_company): static
    {
        $this->is_company = $is_company;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(?string $phone_number): static
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getProfileImage(): ?string
    {
        return $this->profile_image;
    }

    public function setProfileImage(?string $profile_image): static
    {
        $this->profile_image = $profile_image;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getSocialMediaLinks(): ?array
    {
        return $this->social_media_links;
    }

    public function setSocialMediaLinks(?array $social_media_links): static
    {
        $this->social_media_links = $social_media_links;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): static
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): static
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTime
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTime $date_of_birth): static
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name): static
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getDateOfCreation(): ?\DateTime
    {
        return $this->date_of_creation;
    }

    public function setDateOfCreation(\DateTime $date_of_creation): static
    {
        $this->date_of_creation = $date_of_creation;

        return $this;
    }

    public function getRegistrationNumber(): ?string
    {
        return $this->registration_number;
    }

    public function setRegistrationNumber(?string $registration_number): static
    {
        $this->registration_number = $registration_number;

        return $this;
    }
}
