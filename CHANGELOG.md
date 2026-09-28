# Change log

Plugin versioning is derived from Moodle releases, it does not comply with the semantic versioning standard.

The format of this change log follows the advice given at [Keep a CHANGELOG](https://keepachangelog.com).

## [Unreleased]

### Changed

- migration to new forms library
- certification settings delays are entered as intervals with a single time unit

### Fixed

- custom field data context not updated when moving certifications
- editing of self assignment settings always enabled sign-ups
- window due date was optional in manual assignment even if window end or expiration depended on it
- manual assignment upload did not detect user column used also as a date column
