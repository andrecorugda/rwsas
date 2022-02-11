var editData = [];

$(".location-edit").on("click",function(){
    var idStr = $(this).attr('id');
    id = idStr.replace("edit-", "");
    editLocation(id);
});

$(".location-delete").on("click",function(){
    var idStr = $(this).attr('id');
    id = idStr.replace("delete-", "");
    deleteLocation(id);
});

$(document).on("ready",function(){
    $("#edit-location-modal").modal()
});

$(document).on("click","#save-location-modal",function(){
    editData.name = $("#location-name").val();
    editData.signage_id = $("#location-signage").val();
    editData.latitude = $("#location-latitude").val();
    editData.longitude = $("#location-longitude").val();
    updateLocation();
});

function deleteLocation(id = null) {
    if(id){
        $.ajax({
            url : 'route.php',
            type : 'POST',
            data : {
                action : 'deleteLocation',
                id: id
            },
            dataType:'json',
            success : function() {              
                window.location.href = "dashboard?tab=1";
            },
            error : function(request,error)
            {
                window.location.href = "dashboard?tab=1";
            }
        });
    }else{
        alert("missing parameter id");
    }
}

function closeLocationModal(){
    $("#edit-location-modal").modal('hide');
}

function editLocation(id = null){
    if(id){
        $.ajax({
            url : 'route.php',
            type : 'POST',
            data : {
                action : 'editLocation',
                id: id
            },
            dataType: "json",
            success : function(data) {     
                editData = data.data[0];
                $("#edit-location-modal").modal('show');
                $("#location-name").val(editData.name);
                $(`#location-signage option[value="${editData.signage_id}"]`).attr("selected",true);
                $("#location-latitude").val(editData.latitude);
                $("#location-longitude").val(editData.longitude);
            },
            error : function(request,error)
            {
                window.location.href = "dashboard?tab=1";
            }
        });
    }else{
        alert("missing parameter id");
    }
}

function updateLocation(){
    $.ajax({
        url : 'route.php',
        type : 'POST',
        data : {
            action : 'updateLocation',
            id: editData.id,
            name: editData.name,
            signage_id: editData.signage_id,
            latitude:  editData.latitude,
            longitude: editData.longitude
        },
        dataType:'json',
        success : function(data) {  
            console.log(data); 
            closeLocationModal();          
            window.location.href = "dashboard?tab=1";
        },
        error : function(request,error)
        {
            window.location.href = "dashboard?tab=1";
        }
    });
}