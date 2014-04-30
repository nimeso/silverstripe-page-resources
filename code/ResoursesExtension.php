<?php
class ResoursesExtension extends Extension{

	private static $allowed_actions = array(
		'resourse'
	);
	
	public function resourse(SS_HTTPRequest $request) {
		$resourseID = $request->param('ID');
		$resourse = Resourse::get()->where("ID = ".$resourseID)->First();
		return array(
			"Resourse" => $resourse
		);
	}
	
}