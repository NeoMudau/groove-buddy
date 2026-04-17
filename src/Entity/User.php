<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?bool $is_verified = null;

    #[ORM\Column]
    private ?bool $is_active = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    #[ORM\OneToOne(mappedBy: 'attendee', cascade: ['persist', 'remove'])]
    private ?CreatorProfile $creatorProfile = null;

    #[ORM\OneToOne(mappedBy: 'attendee', cascade: ['persist', 'remove'])]
    private ?AttendeeProfile $attendeeProfile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function isVerified(): ?bool
    {
        return $this->is_verified;
    }

    public function setIsVerified(bool $is_verified): static
    {
        $this->is_verified = $is_verified;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): static
    {
        $this->is_active = $is_active;

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

    public function getCreatorProfile(): ?CreatorProfile
    {
        return $this->creatorProfile;
    }

    public function setCreatorProfile(CreatorProfile $creatorProfile): static
    {
        // set the owning side of the relation if necessary
        if ($creatorProfile->getAttendee() !== $this) {
            $creatorProfile->setAttendee($this);
        }

        $this->creatorProfile = $creatorProfile;

        return $this;
    }

    public function getAttendeeProfile(): ?AttendeeProfile
    {
        return $this->attendeeProfile;
    }

    public function setAttendeeProfile(?AttendeeProfile $attendeeProfile): static
    {
        // unset the owning side of the relation if necessary
        if ($attendeeProfile === null && $this->attendeeProfile !== null) {
            $this->attendeeProfile->setAttendee(null);
        }

        // set the owning side of the relation if necessary
        if ($attendeeProfile !== null && $attendeeProfile->getAttendee() !== $this) {
            $attendeeProfile->setAttendee($this);
        }

        $this->attendeeProfile = $attendeeProfile;

        return $this;
    }
}
