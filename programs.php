<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "editor/lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'programs' )
	->fields(
		Field::inst( 'programs.title' ),
        Field::inst( 'programs.location' )
            ->options( Options::inst()
                ->table( 'locations' )
                ->value( 'id' )
                ->label( 'barangay' )
            ),
            Field::inst( 'locations.barangay' ),
            Field::inst( 'locations.municipality' ),
            Field::inst( 'locations.province' ),
            Field::inst( 'programs.background' )
        )
    ->leftJoin( 'locations', 'locations.id', '=', 'programs.location' )
	->process( $_POST )
	->json();
