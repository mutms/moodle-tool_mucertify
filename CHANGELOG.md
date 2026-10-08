# Change log

Plugin versioning is derived from Moodle releases, it does not comply with the semantic versioning standard.

The format of this change log follows the advice given at [Keep a CHANGELOG](https://keepachangelog.com).

## [Unreleased]

### Added

- certification setting that blocks reuse of programs in periods, with notification of blocked recertification

### Changed

- certification catalogue was replaced by Universal catalogue plugin, public certifications are migrated
  to active catalogue sections, certifications visible to cohorts are migrated to draft sections
- catalogue access is controlled by _tool/mucatalog:browse_ capability,
  _tool/mucertify:viewcatalogue_ capability was removed
- _publicaccess_ and _cohortids_ were removed from _tool_mucertify_get_certifications_ web service
- migration to new forms library
- certification settings delays are entered as intervals with a single time unit

### Fixed

- certification notifications and Catalogue visibility tables use the same styling as other management tables
- custom field data context not updated when moving certifications
- editing of self assignment settings always enabled sign-ups
- window due date was optional in manual assignment even if window end or expiration depended on it
- manual assignment upload did not detect user column used also as a date column
