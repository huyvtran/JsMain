var change_color=0;
$(document).ready(function()
{
	$("#idBtn_id_proof_val").on("click",function(event){
                $("#MSTATUS_PROOF").trigger("click");
        });
	$("#MSTATUS_PROOF").on("change",function(event){
		var MSTATUS_PROOF = $(this)[0];
                var errorMes = ValidateDoc(MSTATUS_PROOF);
                if(errorMes != ""){
                        $("#idlabel_id_proof_val").html("jpg/pdf only");
                        $("#saveBtn").removeClass("bg_pink").addClass("applied1");
                        $("#topError").html(errorMes).addClass('visb');
			setTimeout(function(){
			 $("#topError").html("").removeClass('visb');
			 errorMes="";
			},2000);
                }else{
                        $("#idlabel_id_proof_val").html(MSTATUS_PROOF.files[0].name);
                        $("#saveBtn").removeClass("applied1").addClass("bg_pink");
                }
	});

        $("#saveBtn").click(function(){
                var errorMes="";   
		var MSTATUS_PROOF = $("#MSTATUS_PROOF")[0];
                var errorMes = ValidateDoc(MSTATUS_PROOF);
                if(errorMes)
                {
                        $("#idlabel_id_proof_val").html("jpg/pdf only");
                        $("#topError").html(errorMes).addClass('visb');
                        setTimeout(function(){
                         $("#topError").html("").removeClass('visb');
                         errorMes="";
                        },2000);
                }else{
                        $("#uploadDocForm").submit();
                }
        });
});

function ValidateDoc(thisObj){
        var MSTATUS_PROOF = thisObj;
        var errorMes = "";
        if(typeof MSTATUS_PROOF.files == 'undefined' || typeof MSTATUS_PROOF.files[0] == 'undefined' || MSTATUS_PROOF.files[0] == null){
                errorMes="Invalid file";
        }
        var file = MSTATUS_PROOF.files[0];
        if (file && file.name.split(".")[1] == "jpg" || file.name.split(".")[1] == "JPG" || file.name.split(".")[1] == "jpeg" || file.name.split(".")[1] == "JPEG" || file.name.split(".")[1] == "PDF" || file.name.split(".")[1] == "pdf") {
        } else {
                errorMes="Please upload only jpg/pdf file";
        }
        if(file.size > 5242880) {
                errorMes="File size should be less than 5MB";
        }
        return errorMes;
}