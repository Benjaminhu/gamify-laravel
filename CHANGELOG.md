# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/) and this project adheres to [Semantic Versioning](https://semver.org/).

## Unreleased

### Changed
- Update dependencies. ([#311][i311], [#312][i312], [#313][i313], [#314][i314])

[i311]: https://github.com/pacoorozco/gamify-laravel/pull/311
[i312]: https://github.com/pacoorozco/gamify-laravel/pull/312
[i313]: https://github.com/pacoorozco/gamify-laravel/pull/313
[i314]: https://github.com/pacoorozco/gamify-laravel/pull/314

## 3.1.0 - 2022-08-03

> NOTE: The way that a Badge is triggered after a Question is answered has changed. Currently, Questions will trigger the completion of the Badge that contains, at least, on matching tag.

### Added
- Dispatched event `UserProfileUpdated` when the user's profile has been modified.
- Add password validation: min. 8 characters, including mixed cased letters, numbers and symbols.
- Forgot password capability to allow users to recover their accounts..([#284][i284])
- Implement user's registration, in order to allow users to register themselves.
- User's notifications after user creation/registration.
- Badges can be tagged in order to filter which Questions will trigger the completion. ([#309][i309])
### Changed
- Remove sensible information (like gender, url, phone...) from the user's profile. ([#256][i256])
- Fix HTTP method for the user's profile update to `PUT`.
- Update dependencies. ([#262][i262], [#263][i263], [#264][i264], [#265][i265], [#266][i266])
- Protect the whole application to ensure users has verified their email address.
- Protect user's profile edit through password confirmation.
- The User, Level, Badge and Question screens has been refactored to make it more user-friendly.
- Improved test coverage.
### Fixed
- Error showing Badges with more than one actuator.
- Issue when uploading badge images. ([#257][i257])
### Removed
- Admins can't create or modify user's password in favor of **Forgot password** capability. ([#285][i285]) 
- Question's actions has been removed in favor of the use of Tagging. ([#309][i309])

[i285]: https://github.com/pacoorozco/gamify-laravel/issues/285
[i284]: https://github.com/pacoorozco/gamify-laravel/issues/284
[i256]: https://github.com/pacoorozco/gamify-laravel/pull/256
[i257]: https://github.com/pacoorozco/gamify-laravel/issues/257
[i262]: https://github.com/pacoorozco/gamify-laravel/pull/262
[i263]: https://github.com/pacoorozco/gamify-laravel/pull/263
[i264]: https://github.com/pacoorozco/gamify-laravel/pull/264
[i265]: https://github.com/pacoorozco/gamify-laravel/pull/265
[i266]: https://github.com/pacoorozco/gamify-laravel/pull/266
[i309]: https://github.com/pacoorozco/gamify-laravel/issues/309

## 3.0.0 - 2022-06-21

> NOTE: This release has **non-backwards compatible** changes.

### Added
- Improved form validation to make user's input safer. Test has been increased to ensure proper validation.
- Added a `Default` level outside the database. It could be overridden by creating a new level with `required_points = 0`

### Changed
- **Important**: This application has been upgraded to [Laravel 9.x](https://laravel.com/docs). A lot of refactors has been done in order to adopt Laravel 9.x best practices.
- **Important**: Database schema has been modified in a **non-backwards compatible way**.

### Fixed
- Broken image urls for levels.
- `- OR -` statement in the login form should not appear when social login is not enabled.

## 2.7.3 - 2022-04-06

### Changed
- Update dependencies to fix some security vulnerabilities ([#231][i231], [#229][i229], [#228][i228])

[i228]: https://github.com/pacoorozco/gamify-laravel/pull/228
[i229]: https://github.com/pacoorozco/gamify-laravel/pull/229
[i231]: https://github.com/pacoorozco/gamify-laravel/pull/231

## 2.7.2 - 2021-10-08

### Changed
- Application CI/CD has been migrated from [Travis](https://travis-ci.com/) to GitHub actions.
- Update dependencies
  - Bump `bensampo/laravel-enum` to `v3.4.2`.
  - Bump `cviebrock/eloquent-sluggable` to `v8.0.5`.
  - Bump `cviebrock/eloquent-taggable` to `v8.0.2`.
  - Bump `doctrine/dbal` to `v3.1.3`.
  - Bump `fruitcake/laravel-cors` to `v2.0.4`.
  - Bump `fakerphp/faker` to `v1.16.0`.
  - Bump `laravel/framework` to `v8.63`.
  - Bump `laravel/socialite` to `v5.2.2`.
  - Bump `laravel/tinker` to `v2.5.1`.
  - Bump `laravel/ui` to `v3.3.0`.
  - Bump `qcod/laravel-imageup` to `v1.1.0`.
  - Bump `yajra/laravel-datatables-oracle` to `v9.18.1`.
- Update dev dependencies
    - Bump `facade/ignition` to `v2.14.0`.
    - Bump `mockery/mockery` to `v1.4.4`.
    - Bump `nunomaduro/collision` to `v5.10.0`.
    - Bump `phpunit/phpunit` to `v9.5.10`.
### Removed
- PHP v7.4 support. Only PHP v8.0 will be supported since that version.

## 2.7.1 - 2021-04-20

### Added
- Support to store sessions on the database ([#204][i204])
- Adds gamify:publish command to publish scheduled questions ([#203][i203])
- Show current version in the admin dashboard ([#191][i191])
### Fixed
- Last admin can change its type member ([#194][i194])

[i204]: https://github.com/pacoorozco/gamify-laravel/issues/204
[i203]: https://github.com/pacoorozco/gamify-laravel/issues/203
[i194]: https://github.com/pacoorozco/gamify-laravel/issues/194
[i191]: https://github.com/pacoorozco/gamify-laravel/issues/191

## 2.7.0 - 2021-03-12
### Added
- PHP 8 support ([#200][i200])

[i200]: https://github.com/pacoorozco/gamify-laravel/issues/200 

### Fixed
- Error adding actions to questions. ([#144][i144])
- Rewards link is broken on Admin Sidebar. ([#193][i193])
- Missing translation: admin/question/model.published_at. ([#192][i192])
- Users can't change their password. ([#135][i135])
- Add a missing step to install dependencies on docker container.


[i144]: https://github.com/pacoorozco/gamify-laravel/issues/144
[i193]: https://github.com/pacoorozco/gamify-laravel/issues/193
[i192]: https://github.com/pacoorozco/gamify-laravel/issues/192
[i135]: https://github.com/pacoorozco/gamify-laravel/issues/135

## 2.6.0 - 2021-02-22

> **Note**: This application has been updated to use [Laravel 8.x](https://laravel.com/docs). It's backwards compatibility, so the database does not need to be updated.

### Added
- Parallel testing to reduce testing time when using `composer test` and `composer test-coverage`.

### Changed
- **Important**: This application has been upgraded to [Laravel 8.x](https://laravel.com/docs). A lot of refactors has been done in order to adopt Laravel 8.x best practices. 
- Docker build process to set UID on docker-compose build.

### Fixed
- Bug when creating a question without choices. ([#177][i177])

### Removed
- Remove Symfony Insight integration.

[i177]: https://github.com/pacoorozco/gamify-laravel/issues/177

## 2.5.0 - 2020-12-03

### Added
- Possibility to obtain/assign badges based on events (question has been answered, user is logged in...) ([#161][i161])
- Possibility to schedule question publication. ([#152][i152])
- Presenter to `Question` model. Removes several partial views.
### Changed
- View on question edit form to make it simpler.
- Use `SocialProviders/okta` from packagist instead of GitHub.
- Upgrade requirements to PHP 7.4. 
- Add [docker-php-extension-installer](https://github.com/mlocati/docker-php-extension-installer) to install PHP extensions in docker.
- Dependencies has been updated.
### Fixed
- Badge images were not working on 'local' storage. ([#162][i162])
- Choices were not shown on validation errors. Dynamic Form fields is using [repeatable-fields](https://github.com/Rhyzz/repeatable-fields).
### Deprecated
- QuestionChoice's `correct` model attribute. Use `isCorrect()` and scope `correct()` to get the same functionality than before.
### Removed
- QuestionChoice's `correct` field has been removed from the model. This field was not used in favor of `score` field. The removal is **backward compatible** and you can still use `correct` attribute, that it's **deprecated**.

[i161]: https://github.com/pacoorozco/gamify-laravel/issues/161
[i162]: https://github.com/pacoorozco/gamify-laravel/issues/162
[i152]: https://github.com/pacoorozco/gamify-laravel/issues/152

## 2.4.1 - 2020-05-05
### Changed
- Small refactors to add more testability.
- Added more tests.

## 2.4.0 - 2020-04-26

### Added
- Two new widgets on admin dashboard: Latest published questions & latest registered users.
- Add user status to the profile information.
- User's metrics on 'Play' section. ([#132][i132])

### Changed
- Profile look and feel.
- Question forms are now responsible.
- Update dependencies. 

[i132]: https://github.com/pacoorozco/gamify-laravel/issues/132

## 2.3.2 - 2020-04-23

### Fixed
- Add link to each question. Make hidden questions linkable. ([#120][i120]) 
- Document properly 'Question name'. ([#124][i124])
- Hidden questions where not labelled. ([#122][i122])
- Bug when user was accessing to a published question. ([#121][i121])

[i120]: https://github.com/pacoorozco/gamify-laravel/issues/120
[i124]: https://github.com/pacoorozco/gamify-laravel/issues/124
[i122]: https://github.com/pacoorozco/gamify-laravel/issues/122
[i121]: https://github.com/pacoorozco/gamify-laravel/issues/121

## 2.3.1 - 2020-04-22

### Fixed
- Bug when creating a new user. ([#117][i117])

[i117]: https://github.com/pacoorozco/gamify-laravel/issues/117

## 2.3.0 - 2020-04-15

### Added
- Trusted proxies configuration through environment variables. See `config/trustedproxies.php`.
- `composer build` to create distributable files of the application.
### Fixed
- Remove API default route closure. It was buggy on production.

## 2.2.0 - 2020-04-10

### Added
- Horizontal scaling: session & cache on Redis and uploads on S3. ([#103][i103])
- Support to custom views under `resources/views/custom`. ([#102][i102])
- AWS S3 support for image uploads.
- Image management to Badges, Levels & Avatars. ([#92][i92], [#96][i96], [#99][i99]) 
### Fixed
- Fix some typos and broken links.
- Fix Admin dashboard render errors. ([#88][i88])
- Fix deletion of the default level. ([#33][i33])

[i103]: https://github.com/pacoorozco/gamify-laravel/issues/103
[i102]: https://github.com/pacoorozco/gamify-laravel/issues/102
[i99]: https://github.com/pacoorozco/gamify-laravel/issues/99
[i96]: https://github.com/pacoorozco/gamify-laravel/issues/96
[i92]: https://github.com/pacoorozco/gamify-laravel/issues/92
[i88]: https://github.com/pacoorozco/gamify-laravel/issues/88
[i33]: https://github.com/pacoorozco/gamify-laravel/issues/33

## 2.1.0 - 2020-03-27

### Added
- Social login links. Since this version it's possible to sign in using a third party service such as Facebook, Twitter or Github. ([#83][i83]) 
### Fixed
- `UserProfile` validation on updates.
- Wrong redirection after login.
- Defaults for `avatar` on `User` creation.

[i83]: https://github.com/pacoorozco/gamify-laravel/issues/83

## 2.0.0 - 2020-03-25

> **Note**: This application has been updated to use [Laravel 6.x](https://laravel.com/docs). It's still backwards compatibility, but database needs to be updated too. Some tests have been added but coverage is still very low.

### Added
- Ensure that users select at least one answer before proceeding. ([#79][i79]) 
- Two composer commands: `test` and `test-coverage`.

[i79]: https://github.com/pacoorozco/gamify-laravel/issues/79

### Changed
- **Important**: This application has been upgraded to [Laravel 6](https://laravel.com/docs). A lot of refactors has been done in order to adopt Laravel 6.x best practices. 
([#66][i66])
- Refactors to reduce the number of queries. 
- Change the editor from TinyMCE to [Bootstrap-wysihtml5](https://github.com/bootstrap-wysiwyg/bootstrap3-wysiwyg). ([#36][i36]) 
- Reputation is handled by Events. Added `experience` attribute to the User model. ([#72][i72], [#73][i73])
- Repository name has been changed to `gamify-laravel`, current URL is https://github.com/pacoorozco/gamify-laravel.
### Fixed
- Database migration / seed on fresh installation. ([#77][i77])
- `docker-compose build` was throwing an error, so docker was not working. ([#61][i61])

[i36]: https://github.com/pacoorozco/gamify-laravel/issues/36
[i61]: https://github.com/pacoorozco/gamify-laravel/issues/61
[i66]: https://github.com/pacoorozco/gamify-laravel/issues/66
[i72]: https://github.com/pacoorozco/gamify-laravel/issues/72
[i73]: https://github.com/pacoorozco/gamify-laravel/issues/73
[i77]: https://github.com/pacoorozco/gamify-laravel/issues/77

### Removed
- Dusk tests. They were not working properly.

## 1.0.3 - 2019-06-15

### Fixed
- Fix routing problem affecting answering questions (#45)

### Changed
- Change the URL verb from `/user/` to `/users/`, to make it coherent with the rest.

## 1.0.2 - 2019-06-15

### Fixed
- Fix default credentials documentation (#44)
- Bump version documentation updated

## 1.0.1 - 2019-03-02

### Added
- Add issue templates to make issue submitting easier.

### Fixed
- Fix sidebar toggle button
- Fix issue #39. **Authorisation was broken**. 

## 1.0.0 - 2019-01-07

This is a **major update**, so it has changes that breaks compatibility with previous versions. 

> **IMPORTANT**: Application has been migrated to [Laravel 5.5](https://laravel.com/docs/5.5/).

### Added
- This `CHANGELOG` file to keep changes between versions.
- Docker support to be able to run this application in containers. **DO NOT USE THIS CONTAINERS IN PRODUCTION.**
- Added NPM module to deal with [AdminLTE](https://adminlte.io/) theme dependency.
- Added [Laravel Mix](https://github.com/JeffreyWay/laravel-mix) to build assets in this application.
- Added folder structure to begin application testing support.
- Added [Scrutinizer](https://scrutinizer-ci.com) code style checks and test coverage.
- Added [StyleCI](https://styleci.io/) to automatically merge any style fixes into the application repository. This allows us to focus on the content of the contribution and not the code style.
- Added [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper) to allow auto-completion on IDE.
- Added Laravel Dusk for testing.

### Changed
- CI has been migrated to [Travis CI COM](https://travis-ci.com/).
- Some fields has been renamed:
  - Model: Badge, `amount` is now `required_repetitions`.
  - Model: Level, `amount` is now `required_points`.
  - Pivot tables: `Badge-Users`, `amount` is now `repetitions`.
- Move DataTables to `public/vendor`.
- Composer versions to be compliant with [Laravel 5.5](https://laravel.com/docs/5.5/). 
- Travis is using PHP 7.2 image to do the builds.
- `README` has been updated adding information about the project, authors and _"how to run this application"_.
- Move al CSS and JS to `public/vendor`, so now it's part of this code.
- Update CSS and JS paths in `views` to use new `public/vendor` folder.
- Updated `LICENSE` to [GNU GPL v3.0 or later](https://spdx.org/licenses/GPL-3.0-or-later.html).

### Removed
- Removed [Homestead](https://laravel.com/docs/5.5/homestead) support in favor of docker containers. If you still want to use it, please follow [this instructions](https://laravel.com/docs/5.5/homestead).
- Removed cached item that were present in `.gitignore`.
- Removed `bower` as Javascript dependency manager.
