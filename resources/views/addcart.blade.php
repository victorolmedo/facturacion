@extends('layouts.app')




@section('content')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">

			<form class="navbar-form navbar-left" role="search">
				  <div class="form-group">
				    <input type="text" class="form-control" placeholder="Buscar producto">
				  </div>
			  		<button type="button" class="btn btn-default">Agregar</button>
			</form>
    
    </div>
  </div>
</nav>
<!--     <div class="row">
        <div class="col-md-12">
			<div class="bs-example" data-example-id="striped-table"> 
			<table class="table table-striped"> 
					<thead> <tr> 
						<th>#</th> <th>First Name</th> <th>Last Name</th> <th>Username</th> </tr> 
					</thead> 

					<tbody> 
					<tr> <th scope="row">1</th> <td>Mark</td> <td>Otto</td> <td>@mdo</td> </tr> <tr> 
					<th scope="row">2</th> <td>Jacob</td> <td>Thornton</td> <td>@fat</td> </tr> <tr> 
					<th scope="row">3</th> <td>Larry</td> <td>the Bird</td> <td>@twitter</td> </tr> </tbody> 
			</table> 
			</div>
        </div>
    </div> -->

<div class="row">
  
  <div class="col-sm-4 col-md-2">
    <div class="thumbnail">
      <img src="http://s.rinconrecetas.com/wp-content/uploads/2012/02/Pan-saborizado-con-queso-y-tomillo-sin-gluten-150x150.jpg" alt="...">
      <div class="caption">
        <h3>Pan Criollo</h3>
        <p>2 kl</p>
        <p>10.000 Gs</p>
        <!-- <p><a href="#" class="btn btn-primary" role="button">cambiar</a></p> -->
      </div>
    </div>
  </div>

  <div class="col-sm-4 col-md-2">
    <div class="thumbnail">
      <img src="http://productosorganicos.com.ar/wp-content/uploads/2015/05/queso-gouda-para-rallar.jpg" alt="...">
      <div class="caption">
        <h3>Queso Gouda</h3>
        <p>500 gr</p>
        <p>25.000 Gs</p>
        <!-- <p><a href="#" class="btn btn-primary" role="button">cambiar</a></p> -->
      </div>
    </div>
  </div>

  <div class="col-sm-4 col-md-2">
    <div class="thumbnail">
      <img src="https://www.lider.cl/dys/productImages/p/636681pa.jpg" alt="...">
      <div class="caption">
        <h3>Vino Merlot</h3>
        <p>1 und</p>
        <p>50.000 Gs</p>
        <!-- <p><a href="#" class="btn btn-primary" role="button">cambiar</a></p> -->
      </div>
    </div>

	</div>

</div>
		<footer class="footer">
	      <div class="container">
	        <p class="text-muted"> <h1> <strong>Total:</strong> 85.000 Gs.</h1></p>
	      </div>
	    </footer>
@endsection
