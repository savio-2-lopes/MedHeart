<nav class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="sr-only">Alternar Navegamentos</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
</nav>

<nav class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<a href="pesquisa.php">
				<div class="input-group">
					<input class="form-control" type="text" name="searchdata" id="searchdata" placeholder="Buscar por nomes..." />
					<span class="input-group-btn" style="color:#00bd9c">
						<button type="submit" style="color:#00bd9c" name="Buscar" action="pesquisa.php" id="search-btn" class="btn btn-flat">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div><br>
			</a>

			<li></li>

			<li>
				<a href="#">
					<i class="fa fa-user fa-fw" style="color:#fff"></i>
					<span id="" style="color:#fff;">&nbsp;&nbsp;Pacientes</span>
					<span class="fa arrow" style="color:#fff"></span>
				</a>

				<ul class="nav nav-second-level">
					<li>
						<a href="adicionar_paciente.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Novo Paciente</span>
						</a>
					</li>

					<li>
						<a href="ver_paciente.php">
							<i class="fa fa-user" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Visualizar</span>
						</a>
					</li>

					<li>
						<a href="documentos.php">
							<i class="fa fa-file-text-o" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Relatórios</span>
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-flask fa-fw" style="color:#fff"></i>
					<span id="" style="color:#fff">&nbsp;&nbsp;Laboratórios</span>
					<span class="fa arrow" style="color:#fff"></span>
				</a>

				<ul class="nav nav-second-level">
					<li>
						<a href="adicionar_lab.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Novo Lab</span>
						</a>
					</li>

					<li>
						<a href="requisicao_lab.php">
							<i class="fa fa-edit" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Requisições</span>
						</a>
					</li>

					<li>
						<a href="ver_lab.php">
							<i class="fa fa-flask" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Visualizar</span>
						</a>
					</li>

					<li>
						<a href="ver_rec_lab.php">
							<i class="	fa fa-dot-circle-o" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Histórico</span>
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-medkit fa-fw " style="color:#fff"></i>
					<span id="" style="color:#fff">&nbsp;&nbsp;Medicamentos</span>
					<span class="fa arrow" style="color:#fff"></span>
				</a>

				<ul class="nav nav-second-level">
					<li>
						<a href="adicionar_medicamentoo.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;&nbsp;Novo Medicamentos</span>
						</a>
					</li>

					<li>
						<a href="requisicao_medicamento.php">
							<i class="fa fa-edit" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Nova Requisição</span>
						</a>
					</li>

					<li>
						<a href="ver_medicamentos.php">
							<i class="fa fa-medkit" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Visualizar</span>
						</a>
					</li>

					<li>
						<a href="ver_rec_medicamento.php">
							<i class="	fa fa-dot-circle-o" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Histórico</span>
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#">
					<i class="fa fas fa-cubes fa-fw" style="color:#fff"></i>
					<span id="" style="color:#fff">&nbsp;&nbsp;Estoque</span>
					<span class="fa arrow" style="color:#fff"></span>
				</a>

				<ul class="nav nav-second-level">
					<li>
						<a href="adicionar_medicamento.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;&nbsp;Novo Medicamentos</span>
						</a>
					</li>

					<li>
						<a href="adicionar_equipamento.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;&nbsp;Novo Equipamentos</span>
						</a>
					</li>

					<li>
						<a href="ver_estoque.php">
							<i class="fa fas fa-cubes" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Visualizar Estoque</span>
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-edit fa-fw" style="color:#fff"></i>
					<span id="" style="color:#fff">&nbsp;&nbsp;Prescrição</span>
					<span class="fa arrow" style="color:#fff"></span>
				</a>

				<ul class="nav nav-second-level">
					<li>
						<a href="cad_prescricao.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Nova Prescrição</span>
						</a>
					</li>

					<li>
						<a href="ver_prescricoes.php">
							<i class="fa fa-edit" style="color:#fff"></i>
							<span id="" style="color:#fff">&nbsp;Ver Prescrição</span>
						</a>
					</li>
				</ul>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-briefcase fa-fw" style="color:#eee"></i>
					<span id="" style="color:#eee">&nbsp;&nbsp;Médicos</span>
					<span class="fa arrow" style="color:#eee"></span>
				</a>

				<ul class="nav nav-second-level">
					<li>
						<a href="adicionar_medico.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#eee">&nbsp;Novo Médico</span>
						</a>
					</li>

					<li>
						<a href="ver_medico.php">
							<i class="fa fa-user" style="color:#fff"></i>
							<span id="" style="color:#eee">&nbsp;Visualizar</span>
						</a>
					</li>
				</ul>

			<li>
				<a href="#">
					<i class="fa fa-laptop fa-fw" style="color:#eee"></i>
					<span id="" style="color:#eee">&nbsp;&nbsp;Convênio</span>
					<span class="fa arrow" style="color:#eee"></span>
				</a>

				<ul class="nav nav-second-level">
					<li>
						<a href="adicionar_convenio.php">
							<i class="fa fa-plus-circle" style="color:#fff"></i>
							<span id="" style="color:#eee">&nbsp;Novo Convênio</span>
						</a>
					</li>

					<li>
						<a href="ver_convenio.php">
							<i class="fa fa-laptop" style="color:#fff"></i>
							<span id="" style="color:#eee">&nbsp;Visualizar</span>
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</nav>
</nav>