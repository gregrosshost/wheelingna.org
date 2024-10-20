# Development Sequence
init laravel project 
install filament packages 
install panels from filament package
create filament user
login to url and save password creds
## Fabricator Plugin
install filament fabricator and config
register plugin in panel provider
create fabricator layout
create fabricator page blocks
make test page block
add existing pages to backend
## Create Report
make report model and migration
create schema for report model
make migration to create sub committee reports table and create schema
make migration to create group reports table and create schema 
run migrations 

fix migrations for report type
updated ReportResource records to save and edit data appropriately by the report type

## Install Code Editor to Create custom page blocks
installed ace code editor and created some sample blocks 

## Associate User to Report 
add user_id to report table
not null error in sqlite this is the start of a workaround 
updated fields in ReportResource

## Create Report Policy 
currently works so only the person that submitted it can edit it 

