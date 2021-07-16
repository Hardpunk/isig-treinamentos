@extends('layouts.master')
@section('content')
<section class="header-padrao">
	<div class="container">
		<div class="row">
			<div class="col-md-12 pt-10 h-mobile">
				<div class="header-content light-color">
					<div class="texto-header">
						<header>
							<h1 class="">Como podemos te ajudar?</h1>
							<p class="subtitle">
							Preencha os campos abaixo para entrar em contato com a nossa equipe </p>
						</header>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-md-4 ordem-mobile-2">
				<form action="#" class="form-contact" method="post" tabindex="1">
					<input type="text" class="form-contact-input" name="nome" placeholder="Nome" required />
					<input type="tel" class="form-contact-input" name="tel" placeholder="Telefone" />
					<input type="email" class="form-contact-input" name="email" placeholder="Email" required />
					<textarea class="form-contact-textarea" name="conteudo" placeholder="Mensagem" required></textarea>
					<button type="submit" class="form-contact-button">Enviar</button>
				</form>
			</div>
			<div class="col-md-4 contato ordem-mobile-1">
				<h3>Entre em contato!</h3>
				<div class="d-flex my-3 py-3">
					<div class="icon-box-icon">
						<i aria-hidden="true" class="far fa-envelope-open"></i>
					</div>
					<div>
						<a class="text-cinza" href="mailto:contato@isigtreinamentos.com.br">contato@isigtreinamentos.com.br</a>
					</div>
				</div><div class="d-flex my-3 py-3">
				<div class="icon-box-icon">
					<i aria-hidden="true" class="fas fa-phone-volume"></i>
				</div>
				<div>
					<p>Distrito Federal: (61) 99884-2889</p>
				</div>
			</div><div class="d-flex my-3 py-3">
			<div class="icon-box-icon">
				<i aria-hidden="true" class="fas fa-map-marker-alt"></i>
			</div>
			<div>
				<p>Impact Hub Brasília | Sgan 601 Conjunto H <br> Sala 54 Ss1 Edifício Íon - Asa Norte,<br>Brasília/DF <br>CEP: 70830-018</p>
			</div>
		</div>
	</div>
</div>
</div>
<div class="w-100 py-3"></div>
</section>
@endsection
