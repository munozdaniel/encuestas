

<div class="container">

</div>
<div id="login-page" style="height: 410px; margin-top: 5%">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                {{ content() }}

            </div>
            <div class="col-md-4 col-md-offset-4">
        {{ form('sesion/validar',"class":"form-login",'style':'padding: 20px 20px 20px 20px;-webkit-box-shadow: 4px -1px 3px -2px rgba(7,120,140,0.65);
-moz-box-shadow: 4px -1px 3px -2px rgba(7,120,140,0.65);
box-shadow: 4px -1px 3px -2px rgba(7,120,140,0.65);') }}

            <h2 class="form-login-heading">Iniciar Sesión</h2>
            <div class="login-wrap">
                {{ text_field('nombre',"class":"form-control","placeholder":"Nombre de Usuario","autofocus":"") }}
                <br>
                {{ password_field('password',"class":"form-control","placeholder":"Contraseña") }}

                <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="#modalOlvido"> Olvidó su contraseña?</a>
		                </span>
                </label>
                <button class="btn btn-info btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> INGRESAR</button>
                <hr>

            </div>

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="modalOlvido" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Forgot Password ?</h4>
                        </div>
                        <div class="modal-body">
                            <p>Enter your e-mail address below to reset your password.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                            <button class="btn btn-theme" type="button">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

        {{ end_form() }}
            </div>
        </div>
    </div>
</div>



