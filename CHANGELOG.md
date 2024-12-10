## v0.28.0 (2023-11-26)

### Added
* Laravel mix

### Changed
* Validation
* Encryption
* unnecessary js and css are removed.
* pagination per page is using default model

## v0.27.0 (2023-11-14)

### Changed
* Encryption system refactored. It is applied to all models and users resource.

## v0.26.0 (2023-11-10)

### Fixed
* biddings order-by and search about project
* some fields do not update in website settings
* inappropriate message for website settings update.
* logo overflow in website settings
* error while uploading photo or file with wrong file type
* mysql CONCAT() return null when last_name was null
* users edit page
* error if phone input is 30+ characters

## v0.25.1 (2023-11-07)

### Fixed
* 'App\models' to 'App\Models'

## v0.25.0 (2023-11-07)

### Added
* ReportAllTeams command with schedule

## v0.24.0 (2023-11-07)

### Added
* Projects show page. Linked with biddings page.
* Dashboard complete
* Notification
* queued_emails table, model, schedule

### Fixed
* Default photo for deleted photo
* project name in biddings.show

## v0.23.0 (2023-11-02)

### Added
* Estimator Bid Vaule Won, Teams Bid Value, Teams Bid Value Won

### Changed
* biddings table has relation with projects table
* estimated_value in biddings table is required

## 0.22.0 (2023-10-30)

### Added
* phone and email for customer
* phone for user
* ComplianceSeeder (real life data)
* Bidding default order
* order by name for Compliance, Customer, Employee, Team, User
* faker in seeder

### Fixed
* page reload of bidding and team relation on click cross icon
* Employee time input
* last_name and phone for user are not required

## 0.21.0 (2023-10-29)

### Added
* Bidding search and order-by 100% complete

### Changed
* Biddings create, edit
* bidding time format

### Fixed
* Due date less than -5 is not red

## 0.20.0 (2023-10-26)

### Added
* Time Tracking 99%

## 0.19.0 (2023-10-26)

### Added
* Market and Solicitation table, model, Seeder

### Changed
* Biddings table, blade, seeder

## 0.18.0 (2023-10-25)

### Added
* Team relations

## 0.17.0 (2023-10-24)

### Added
* form repopulation of Bidding, Employee, User and Website Setting

## 0.16.0 (2023-10-23)

### Added
* Employee
* TeamDependencySeeder

### Fixed
* LocalTime null input
* button is used for submit instead of input

## 0.15.0 (2023-10-22)

### Added
* Users edit and delete
* custom validation names for error
* Website Settings

### Refactored
* response_type related code
* unnecessary classes are removed

## 0.14.0 (2023-10-22)

### Added
* Merged with project_duration_19oct

## WIP (2023-10-22)

### WIP
* soft deletes in models

## WIP (2023-10-21)

### Added
* users list and users create
* image upload system

## 0.13.0 (2023-10-19)

### Added
* Merged with project_duration_19oct

## WIP (2023-10-19)

### Added
* Team, Compliance
* Website Settings frontend is completed

### Changed
* css of sidebar, navbar, logo

### Fixed
* null relations in biddings page

## v0.12.0 (2023-10-19)

### Added
* mostafij branch is merged

## 0.11.0 (2023-10-19)

### Added
* automatic timezone system
* Customers resource

### Changed
* css of sidebar, navbar, logo

## v0.10.0 (2023-10-17)

### Added
* bidding main module complete

## WIP (2023-10-17)

### Fixed
* some blade related dates

## WIP (2023-10-16)

### Added
* delete bidding complete
* date time picker

## v0.9.0 (2023-10-16)

### Added
* mostafij branch is merged

## WIP (2023-10-15)

### Added
* Biddings view, delete
* simpleResourceDelete, displaySuccessNotification, copyToClipboard, hideOldestNotification in js
* Datatable service

### Changed
* hideErrorNotification renamed to hideAllNotification

### Removed
* days_remaining from biddings table

## v0.8.0 (2023-10-14)

### Added
* Bidding related seeders and models

### Changed
* comments in laravel blade
* css and js in layouts

### Fixed
* Does not login after resetting password in Forgot Password

## v0.7.0 (2023-10-14)

### Added
* frontend table

## v0.6.0 (2023-10-12)

### Added
* Dashboard layout
* Dynamic sidebar menu component

### Fixed
* Company name of Forgot Password email
* Notification css

## v0.5.0 (2023-10-11)

### Added
* Auth system complete

## v0.4.0 (2023-10-11)

### Added
* Reset Password, Forgot Password
* Modal, JS Notification

## v0.3.0 (2023-10-09)

### Added
* custom login and logout
* frontend of dashboard

## v0.2.0 (2023-10-07)

### Added
* all migrations
* seeders: UserDependencySeeder, ClientTypeSeeder, JobTypeSeeder, UserRoleSeeder, WageTypeSeeder, WebsiteSettingSeeder, WorkScopeSeeder
* models for above seeders

## v0.1.0 (2023-10-07)

* Initial Commit