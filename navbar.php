
<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="principal.php" class="logo">SisGP <span>Sistema Gerenciamento de Patrimônio</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="principal.php"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
	              <a href="adicionaritem.php"><span class="fa fa-desktop mr-3"></span> Cadastro de Bens</a>
	          </li>
	          <li>
              <a href="listaritem.php"><span class="fa fa-briefcase mr-3"></span> Listar/movimentar Bens</a>
	          </li>
	          <li>
              <a href="adicionarusuario.php"><span class="fa fa-user mr-3"></span> Cadastro de Usuários</a>
	          </li>
			  <li>
              <a href="listarusuario.php"><span class="fa fa-user mr-3"></span> Listar Usuários</a>
	          </li>
	          <li>
              <a href="dashboard.php"><span class="fa fa-suitcase mr-3"></span> Dashboard</a>
	          </li>
	        </ul>
	        

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

	<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>