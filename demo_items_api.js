function ejecuta_delete(item_id) {
    $.ajax({
            type: "DELETE",
            url: "http://www.dpereyra.com/api/"+item_id,
            success: function(data){
                completa_tabla();
            },
            error: function (responseData, textStatus, errorThrown) {
                alert('DELETE failed.');
            }
        }
    );
}
function ejecuta_put(item_id,item_name,item_description,item_size,item_cost) {
    $.ajax({
            type: "PUT",
            url: "http://www.dpereyra.com/api/"+item_id+"/"+item_name+"/"+item_description+"/"+item_size+"/"+item_cost,
            success: function(data){
                completa_tabla();
            },
            error: function (responseData, textStatus, errorThrown) {
                alert('PUT failed.');
            }
        }
    );
}
function ejecuta_post(item_name,item_description,item_size,item_cost) {
    $data={
        item_name:item_name,
        item_description:item_description,
        item_size:item_size,
        item_cost:item_cost,
    }
    console.log($data);
    $.ajax({
            type: "POST",
            url: "http://www.dpereyra.com/api/",
            data: $data,
            success: function(data){
                completa_tabla();
            },
            error: function (responseData, textStatus, errorThrown) {
                alert('POST failed.');
            }
        }
    );
}
function completa_tabla() {
    $('#table').hide()
    $.ajax({
            type: "GET",
            url: "http://www.dpereyra.com/api/",
            success: function(data){
                $('#table').bootstrapTable('destroy');
                var $table = $('#table');
                var $new_data=(JSON.parse(data));
                jsArr=[];
                for(var i in $new_data["result"]){
                    $new_data["result"][i]["botones"]='<button type="button" class="btn btn-primary put" data=\''+JSON.stringify($new_data["result"][i],null, 2)+'\'>Modificar</button> '+
                        '<button type="button" class="btn btn-danger delete" data=\''+JSON.stringify($new_data["result"][i],null, 2)+'\'>Eliminar</button>';
                    jsArr.push($new_data["result"][i]);
                }
                $('#table').bootstrapTable({
                    data: jsArr
                });
                $('#table').show().bootstrapTable( 'resetView' , {height: 500} );
                $(".put").click(function(){
                    $data=JSON.parse($(this).attr("data"));
                    $("#myModal").modal();
                    $("#alert_dialog").hide();
                    $("#form_abm").show();
                    $("#myModalLabel").text("Modificar registro");
                    $("#dialog_acept").text("Confirmar modificacion");
                    $("#item_id").val($data["item_id"]);
                    $("#item_name").val($data["item_name"]);
                    $("#item_description").val($data["item_description"]);
                    $("#item_size").val($data["item_size"]);
                    $("#item_cost").val($data["item_cost"]);
                    $("#dialog_acept").unbind('click');
                    $("#dialog_acept").click(function(){
                        ejecuta_put($("#item_id").val(),$("#item_name").val(),$("#item_description").val(),$("#item_size").val(),$("#item_cost").val());
                        $("#myModal").modal('hide');
                    });
                });
                $(".delete").click(function(){
                    $("#myModal").modal();
                    $("#form_abm").hide();
                    $("#alert_dialog").show();
                    $("#myModalLabel").text("Confirmacion de eliminacion");
                    $("#dialog_acept").text("Eliminar");
                    $data=JSON.parse($(this).attr("data"));
                    $item_id=$data["item_id"];
                    $("#dialog_acept").unbind('click');
                    $("#dialog_acept").click(function(){
                        ejecuta_delete($item_id);
                    });
                });
                $(".delete").click(function(){
                    $("#myModal").modal();
                    $("#form_abm").hide();
                    $("#alert_dialog").show();
                    $("#myModalLabel").text("Confirmacion de eliminacion");
                    $("#dialog_acept").text("Eliminar");
                    $data=JSON.parse($(this).attr("data"));
                    $item_id=$data["item_id"];
                    $("#dialog_acept").unbind('click');
                    $("#dialog_acept").click(function(){
                        ejecuta_delete($item_id);
                        $("#myModal").modal('hide');
                    });
                });
            },
            error: function (responseData, textStatus, errorThrown) {
                alert('GET failed.');
            }
        }
    );
}

$(document).ready(function () {
    completa_tabla();
    $("#actualizar").click(function(){
        completa_tabla();
    });
    $("#agregar").click(function(){
        $("#myModal").modal();
        $("#alert_dialog").hide();
        $("#form_abm").show();
        $("#myModalLabel").text("Agregar registro");
        $("#dialog_acept").text("Agregar");
        $("#item_id").val('Nuevo registro');
        $("#item_name").val('');
        $("#item_description").val('');
        $("#item_size").val('');
        $("#item_cost").val('');
        $("#dialog_acept").unbind('click');
        $("#dialog_acept").click(function(){
            ejecuta_post($("#item_name").val(),$("#item_description").val(),$("#item_size").val(),$("#item_cost").val());
            $("#myModal").modal('hide');
        });
    });
});

