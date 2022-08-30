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

	function logChange ( $db, $action, $id, &$values ) {
		$db->insert( 'logs', array(
			'user'   => $_COOKIE['gatherer'],
			'action' => $action,
			'values' => json_encode( $values ),
			'row'    => $id
			//'when'   => date('c')
		) );
	}

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'cases' )
	//->where('gatherer',$_COOKIE['gatherer'])
	->fields(
		Field::inst( 'cases.id' ),
		Field::inst( 'cases.firstname' )
			->validator( Validate::notEmpty( ValidateOptions::inst()
				->message( 'A first name is required' )	
			) ),
		Field::inst( 'cases.middlename' ),
		Field::inst( 'cases.lastname' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'A last name is required' )	
            ) ),
		Field::inst( 'cases.age' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Agw is required' )	
            ) )
            ->validator( Validate::numeric() ),
		Field::inst( 'cases.gender' ),
		Field::inst( 'cases.summary' ),
		Field::inst( 'cases.story' ),
		Field::inst( 'cases.additional_interview' ),
        Field::inst( 'cases.project_information_id' )
            ->options( Options::inst()
                ->table( 'programs' )
                ->value( 'id' )
                ->label( 'title' )
            ),
		//Field::inst( 'cases.place_id' ),
		Field::inst( 'cases.website_id' ),
		Field::inst( 'cases.country_id' ),
		Field::inst( 'cases.interview_date' ),
		Field::inst( 'cases.date' ),
		Field::inst( 'gatherers.name' ),
		Field::inst( 'cases.gatherer' ),
		Field::inst( 'programs.title' ),
		Field::inst( 'programs.background' ),
		Field::inst( 'locations.barangay' ),
		Field::inst( 'locations.municipality' ),
		Field::inst( 'locations.province' ),
        Field::inst( 'cases.gatherer_id' )
	)
	->join(
		Mjoin::inst( 'files' )
			->link( 'cases.id', 'users_files.user_id' )
			->link( 'files.id', 'users_files.file_id' )
			->fields(
				Field::inst( 'id' )
					->upload( Upload::inst( $_SERVER['DOCUMENT_ROOT'].'/uploads/__ID__.__EXTN__' )
						->db( 'files', 'id', array(
							'filename'    => Upload::DB_FILE_NAME,
							'filesize'    => Upload::DB_FILE_SIZE,
							'web_path'    => Upload::DB_WEB_PATH,
							'system_path' => Upload::DB_SYSTEM_PATH
						) )
						->validator( Validate::fileSize( 100000000, 'Files must be smaller that 100MB' ) )
						//->validator( Validate::fileExtensions( array( 'png', 'jpg', 'jpeg', 'gif' ), "Please upload an image" ) )
					)
			)
	)
    ->leftJoin( 'gatherers', 'gatherers.id', '=', 'cases.gatherer_id' )
    ->leftJoin( 'programs', 'programs.id', '=', 'cases.project_information_id' )
    ->leftJoin( 'locations', 'locations.id', '=', 'programs.location' )
	->on( 'postCreate', function ( $editor, $id, &$values, &$row ) {
		logChange( $editor->db(), 'Create', $id, $values );
		exec("php -f mail_send.php id=$id");
    } )
	->on( 'postEdit', function ( $editor, $id, &$values, &$row ) {
        logChange( $editor->db(), 'Edit', $id, $values );
    } )
    ->on( 'postRemove', function ( $editor, &$id, &$values ) {
        logChange( $editor->db(), 'Delete', $id, $values );
    } )
	->process( $_POST )
	->json();
