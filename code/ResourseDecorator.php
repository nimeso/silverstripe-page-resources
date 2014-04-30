<?php
class ResourseDecorator extends DataExtension {
	
	static public $db = array(
		'ResoursesContent' => 'HTMLText'
	);
	
	static public $has_many = array(
		'Resourses' => 'Resourse'
	);
	
	function updateCMSFields(FieldList $fields) {
		
	  $fields->addFieldToTab('Root.Resourses',$he = new HtmlEditorField("ResoursesContent","Content"));
	  $he->setRows(7);
		
	  $options = $this->owner->Resourses();
	  $gridFieldConfig = GridFieldConfig::create()->addComponents(
	  		//new GridFieldAddExistingAutocompleter(),
	  		new GridFieldToolbarHeader(),
	  		new GridFieldAddNewButton('toolbar-header-right'),
	  		new GridFieldSortableHeader(),
	  		new GridFieldDataColumns(),
	  		new GridFieldPaginator(10),
	  		new GridFieldEditButton(),
	  		new GridFieldDeleteAction(),
	  		new GridFieldDetailForm(),
	  		new GridFieldSortableRows('SortOrder')
	  );
	  $itemsTable = new GridField("Resourses","Resourses",$options,$gridFieldConfig);
	  $fields->addFieldToTab('Root.Resourses',$itemsTable);
	}

}