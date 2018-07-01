<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <meta name="google-signin-scope" content="profile email">-->
    <!--    <meta name="google-signin-client_id" content="500472719832-g5ihqte44d3opcltacrkcq5e781dfggr.apps.googleusercontent.com">-->
    <!--    <script src="https://apis.google.com/js/platform.js" async defer></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.css">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.1/bootstrap-table.min.js"></script>
</head>

<body class="container" style="background-color:gray"> <h1 style="text-align:center">Bienvenidos</h1>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">{{TITLE}}</h4>
            </div>
            <div class="modal-body" id="form_abm">
                <form>
                    <div class="form-group row">
                        <label for="item_id" class="col-sm-4 col-form-label">Id Item</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="item_id" value="0" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="item_name" class="col-sm-4 col-form-label">Nombre del item</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="item_name"  placeholder="Nombre del Item">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="item_description" class="col-sm-4 col-form-label">Descripcion</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" rows="3" id="item_description" placeholder="Descripcion del Item" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="item_size" class="col-sm-4 col-form-label">Tamaño</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="item_size" placeholder="Talles disponibles">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="item_cost" class="col-sm-4 col-form-label">Precio ($)</label>
                        <div class="col-sm-8">
                            <input type="number" step="0.01" class="form-control" id="item_cost" placeholder="0.00"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-body" id="alert_dialog">
                <p>Seguro que desea eliminar el registro? Esta accion no se puede deshacer</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="dialog_acept">{{dialog_acept}}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
<div class="btn-toolbar" role="toolbar"  style="font-size:30px;" onMouseOver="this.style.cursor='pointer'">
    <div class="btn-group">
        <div class="glyphicon glyphicon-plus-sign" id="agregar">Agregar</div>
        <div class="glyphicon glyphicon-refresh" id="actualizar">Actualizar</div>
    </div>
</div>
<table id="table">
    <thead>
    <tr>
        <th data-field="item_id">Item ID</th>
        <th data-field="item_name">Nombre del Item</th>
        <th data-field="item_description">Descipcion</th>
        <th data-field="item_size">Tamaño</th>
        <th data-field="item_cost">Precio ($)</th>
        <th data-field="botones">Acciones</th>
    </tr>
    </thead>
</table>
<!--
<a href="#" onclick="signOut();">Sign out</a>
<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
<script>
    function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
    }
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.disconnect();
            console.log('User signed out.');
    }
</script>-->
<script src="demo_items_api.js"></script>

</body>
</html>
