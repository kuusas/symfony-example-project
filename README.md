# Project
- User registration
- User login
- Tasks CRUD
- Category CRUD
- Assign task to category (multiple)
- Third party API integration

- Email notifications
- Notifications via third party API

- jeigu taip, tai pasikeičia į “in progress”, jeigu anaip, tai pasikeičia į “new” ir pan ?
- Su form eventais, kad select’e nebūtų optiono, kuris negalimas

Events:
- Task created
	- send user notification


# Architecture
                            Model
                                |
                                |
User    >    Controller >   Command Bus     >   Event   >   3rd party
                                |
User    <    View     <         |

## Bundles
UserBundle
NotificationBundle
TaskBundle

## Entities
- Task
	- name
	- text
	- created
	- user

- Category
	- name
	- created

- User
	- name
	- email
	- created

## Forms
- Task
    - status with events
- Category

# Tools
- phpspec
- phpunit
- Scrutinizerci
