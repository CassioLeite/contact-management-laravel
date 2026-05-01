<?php

namespace App\Services;

use App\Contracts\Repositories\ContactRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ContactService
{
    public function __construct(private readonly ContactRepositoryInterface $contactRepository)
    {
    }

    public function getAllContacts(): Collection
    {
        return $this->contactRepository->all();
    }

    public function getContactById(int $id): ?Model
    {
        return $this->contactRepository->find($id);
    }

    public function createContact(array $data): Model
    {
        return $this->contactRepository->create($data);
    }

    public function updateContact(int $id, array $data): bool
    {
        return $this->contactRepository->update($id, $data);
    }

    public function deleteContact(int $id): bool
    {
        return $this->contactRepository->delete($id);
    }
}