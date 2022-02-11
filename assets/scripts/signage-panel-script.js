var editData = [];

$(".signage-edit").on("click",function(){
    var idStr = $(this).attr('id');
    id = idStr.replace("edit-", "");
    editSignage(id);
});

$(".signage-delete").on("click",function(){
    var idStr = $(this).attr('id');
    id = idStr.replace("delete-", "");
    deleteSignage(id);
});

$(document).on("ready",function(){
    $("#edit-signage-modal").modal()
});

function deleteSignage(id = null) {
    if(id){
        $.ajax({
            url : 'route.php',
            type : 'POST',
            data : {
                action : 'deleteSignage',
                id: id
            },
            dataType:'json',
            success : function() {              
                window.location.href = "dashboard?tab=2";
            },
            error : function(request,error)
            {
                window.location.href = "dashboard?tab=2";
            }
        });
    }else{
        alert("missing parameter id");
    }
}

function closeSignageModal(){
    $("#edit-signage-modal").modal('hide');
}

function editSignage(id = null){
    if(id){
        $.ajax({
            url : 'route.php',
            type : 'POST',
            data : {
                action : 'editSignage',
                id: id
            },
            dataType: "json",
            success : function(data) {     
                editData = data.data;
                console.log(data);
                $("#edit-signage-modal").modal('show');
                $("#signage-id").val(editData.id);
                $("#signage-name").val(editData.name);
                $("#signage-preview").attr("src",editData.image);
                $("#signage-alert_distance").val(editData.alert_distance);
                var radios = $('input:radio[name=signage-alert_sound]');
                radios.filter(`[value=${editData.alert_sound}]`).prop('checked', true);
                //$("#signage-alert_sound").val(editData.alert_sound);
                $(`#signage-active option[value="${editData.active}"]`).attr("selected",true);
            },
            error : function(request,error)
            {
                window.location.href = "dashboard?tab=2";
            }
        });
    }else{
        alert("missing parameter id");
    }
}

function updateSignage(){
    $.ajax({
        url : 'route.php',
        type : 'POST',
        data : {
            action : 'updateSignage',
            id: editData.id,
            name: editData.name,
            image: editData.image,
            alert_distance: editData.alert_distance,
            alert_sound: editData.alert_sound,
            active: editData.active
        },
        dataType:'json',
        success : function(data) {  
            console.log(data); 
            closeSignageModal();          
            window.location.href = "dashboard?tab=2";
        },
        error : function(request,error)
        {
            window.location.href = "dashboard?tab=2";
        }
    });
}