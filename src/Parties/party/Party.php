<?php

declare(strict_types=1);

namespace Parties\party;


use Parties\session\Session;

class Party {

    /** @var PartyManager */
    private $manager;

    /** @var string */
    private $identifier;

    /** @var Session */
    private $leader;

    /** @var Session[] */
    private $members;

    /** @var bool */
    private $locked = true;

    /**
     * Party constructor.
     * @param PartyManager $manager
     * @param string $identifier
     * @param Session $leader
     * @param array $members
     */
    public function __construct(PartyManager $manager, string $identifier, Session $leader, array $members) {
        $this->manager = $manager;
        $this->identifier = $identifier;
        $this->leader = $leader;
        $this->members[] = $members;
    }

    /**
     * @return PartyManager
     */
    public function getManager(): PartyManager {
        return $this->manager;
    }

    /**
     * @return string
     */
    public function getIdentifier(): string {
        return $this->identifier;
    }

    /**
     * @return Session
     */
    public function getLeader(): Session {
        return $this->leader;
    }

    /**
     * @return Session[]
     */
    public function getMembers(): array {
        return $this->members;
    }

    /**
     * @return bool
     */
    public function getLocked(): bool {
        return $this->locked;
    }

    /**
     * @param string $identifier
     */
    public function setIdentifier(string $identifier): void {
        $this->identifier = $identifier;
    }

    /**
     * @param Session $leader
     */
    public function setLeader(Session $leader): void {
        $this->leader = $leader;
    }

    /**
     * @param Session[] $members
     */
    public function setMembers(array $members): void {
        $this->members = $members;
    }

    /**
     * @param bool $bool
     */
    public function setLocked(bool $bool = true): void {
        $this->locked = $bool;
    }

    /**
     * @param Session $member
     */
    public function addMember(Session $member): void {
        $this->members[] = $member;
    }

    /**
     * @param Session $member
     */
    public function removeMember(Session $member): void {
        unset($this->members[array_search($member, $this->members)]);
    }

}