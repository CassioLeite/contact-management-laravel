# Contact Management

A simple Laravel 10 web application for managing contacts.

This project was developed as part of a technical exercise. It implements a CRUD interface for contacts using Laravel native features, Blade views, form requests, soft deletes, authentication middleware, repositories, and services.

## Live URL

https://cassioleite-lv.recruitment.alfasoft.pt

## Repository

https://github.com/CassioLeite/contact-management-laravel

## Features

- Public contact listing page
- Contact details page
- Create contact
- Edit contact
- Soft delete contact
- Form validation for contact creation and update
- Unique contact number and email address
- Authentication for protected actions
- Admin user seed
- Feature tests for contact form validation

## Contact Fields

Each contact has the following fields:

- ID
- Name
- Contact
- Email address

Validation rules:

- Name is required and must have more than 5 characters
- Contact is required and must have exactly 9 digits
- Contact must be unique
- Email is required and must be a valid email address
- Email must be unique

## Authentication

The contact list is public.

The following actions require authentication:

- View contact details
- Create contact
- Edit contact
- Delete contact

Default admin user:

```txt
Email: admin@admin.com
Password: 123456