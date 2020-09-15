<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<style>
		#login .container #login-row #login-column #login-box {
			margin-top: 120px;
			max-width: 600px;
			height: 320px;
			border:none;
			background-color: #5f7a85;
			color:white;
			border-radius:25px;
			box-shadow: 1px 5px 10px black;
 		}
		#login .container #login-row #login-column #login-box #login-form {
			padding: 20px;

		}
		#login .container #login-row #login-column #login-box #login-form #register-link {
			margin-top: -85px;

		}
	</style>

	<script>
	$(document).ready(function() {

		$("#login-form").submit(function( event ) {
			$.post("<?php echo base_url('LoginController/Connexion');?>",{
				username: $("#username").val(),
				password: $("#password").val()
			},
			function(data, status){
				if(data == "Error"){
					alert("Connexion impossible.");
				}else{
					// Simulate an HTTP redirect:
					window.location.replace("<?php echo base_url('');?>");
				}
			});
			event.preventDefault();
		});

	});
	</script>

	<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post" >
                            <h3 class="text-center">Connexion</h3>
                            <div class="form-group">
                                <label for="username">Pseudo :</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" >Mot de passe :</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary text-center"  style="background-color:#c89f86; color:white; border:none; border-radius:15px;" value="Connexion">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>