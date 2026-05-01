<?php

namespace App\Repositories;

use App\Contracts\Repositories\ContactRepositoryInterface;
use App\Models\Contact;
use Override;

class ContactRepository extends BaseRepository implements ContactRepositoryInterface
{
    #[Override]
    public function __construct(Contact $contact)
    {
        return parent::__construct($contact);
    }
}