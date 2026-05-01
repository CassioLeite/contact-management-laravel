<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactValidationTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_shows_validation_errors_when_creating_contact_with_invalid_data(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post(route('contacts.store'), [
                'name' => 'John',
                'contact' => '123',
                'email' => 'invalid-email',
            ]);

        $response->assertSessionHasErrors([
            'name',
            'contact',
            'email',
        ]);
    }

    public function test_it_shows_validation_errors_when_creating_contact_with_duplicated_contact_and_email(): void
    {
        $user = User::factory()->create();

        Contact::create([
            'name' => 'Existing Contact',
            'contact' => '123456789',
            'email' => 'existing@example.com',
        ]);

        $response = $this
            ->actingAs($user)
            ->post(route('contacts.store'), [
                'name' => 'Another Contact',
                'contact' => '123456789',
                'email' => 'existing@example.com',
            ]);

        $response->assertSessionHasErrors([
            'contact',
            'email',
        ]);
    }

    public function test_it_shows_validation_errors_when_updating_contact_with_invalid_data(): void
    {
        $user = User::factory()->create();

        $contact = Contact::create([
            'name' => 'Valid Contact',
            'contact' => '123456789',
            'email' => 'valid@example.com',
        ]);

        $response = $this
            ->actingAs($user)
            ->put(route('contacts.update', $contact->id), [
                'name' => 'John',
                'contact' => '123',
                'email' => 'invalid-email',
            ]);

        $response->assertSessionHasErrors([
            'name',
            'contact',
            'email',
        ]);
    }

    public function test_it_shows_validation_errors_when_updating_contact_with_duplicated_contact_and_email(): void
    {
        $user = User::factory()->create();

        Contact::create([
            'name' => 'First Contact',
            'contact' => '123456789',
            'email' => 'first@example.com',
        ]);

        $contact = Contact::create([
            'name' => 'Second Contact',
            'contact' => '987654321',
            'email' => 'second@example.com',
        ]);

        $response = $this
            ->actingAs($user)
            ->put(route('contacts.update', $contact->id), [
                'name' => 'Updated Contact',
                'contact' => '123456789',
                'email' => 'first@example.com',
            ]);

        $response->assertSessionHasErrors([
            'contact',
            'email',
        ]);
    }

    public function test_it_allows_updating_contact_keeping_its_own_contact_and_email(): void
    {
        $user = User::factory()->create();

        $contact = Contact::create([
            'name' => 'Original Contact',
            'contact' => '123456789',
            'email' => 'original@example.com',
        ]);

        $response = $this
            ->actingAs($user)
            ->put(route('contacts.update', $contact->id), [
                'name' => 'Updated Contact',
                'contact' => '123456789',
                'email' => 'original@example.com',
            ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect(route('contacts.index'));

        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'name' => 'Updated Contact',
            'contact' => '123456789',
            'email' => 'original@example.com',
        ]);
    }
}