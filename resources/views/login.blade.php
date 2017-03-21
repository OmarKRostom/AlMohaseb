<!DOCTYPE html>
<html>
<head>
	<title>AlMohaseb - v2.0</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
	/* Credit to bootsnipp.com for the css for the color graph */
	.colorgraph {
	  height: 5px;
	  border-top: 0;
	  background: #c4e17f;
	  border-radius: 5px;
	  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row" style="margin-top: 20%;">
		    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				{{Form::open(["url" => "/login", "method" => "POST"])}}
					<fieldset>
						<h2>Please Sign In</h2>
						<hr class="colorgraph">
						@if ($error = $errors->first('authError'))
						  <div class="alert alert-danger">
						    {{ $error }}
						  </div>
						@endif
						<div class="form-group">
		                    <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username">
						</div>
						<div class="form-group">
		                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
						</div>
						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12">
		                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
							</div>
						</div>
					</fieldset>
				{{Form::close()}}
			</div>
		</div>
	</div>
</body>
</html>