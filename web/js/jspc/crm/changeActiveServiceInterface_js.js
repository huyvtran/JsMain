function confirmSubmit(){
	$(".visibiltyApplyFilter").val("visiblityChange");
}

$(document).ready(function(){
	$(".visibiltyApplyFilter").val("Apply Visibilty Changes");
	//console.log("currentMtongueFilter1",currentMtongueFilter);
	//$('select[name="mtongueSelect"] option:selected').attr("selected",null);
	//$('select[name="mtongueSelect"] option[value="'+currentMtongueFilter+'"]').attr("selected","selected");
	$("#mtongueSelect option[value="+currentMtongueFilter+"]").attr("selected","selected");
});