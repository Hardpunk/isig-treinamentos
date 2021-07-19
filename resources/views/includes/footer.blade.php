<div id="footer">
    <section class="news-footer">
        <div class="container container mb-4 p-3">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <div class="subscribe-text mb-15">
                        <h4>Newsletter</h4>
                        <p>Quer receber novidades e promoções sobre cursos? Cadastre-se na nossa newsletter.</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="subscribe-form">
                        <form method="post" class="d-md-flex">
                            @csrf
                            <input type="email" required name="email" id="inputletter" class="form-control"
                                placeholder="Digite seu email">
                            <button type="button" data-loading-text="<i class='fas fa-spinner fa-spin mr-2'></i>Aguarde..."
                                class="botaoFooter">Cadastrar</button>
                        </form>
                        <div id="newsletterMessage"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container container mb-4 p-3">
        <div class="row">
            <div class="col-md-3">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Isig" class="logo img-fluid">
                </a>
                <div class="col-md-12 social-media text-aling-center">
                    <a href="https://www.facebook.com/isig.treinamentos"> <i class="fab fa-facebook"></i></a>
                    <a href="https://instagram.com/isig.treinamentos"> <i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/company/isig-treinamentos"> <i class="fab fa-linkedin"></i></a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="d-flex my-3">
                    <div class="icon-box-icon">
                        <i aria-hidden="true" class="fas fa-phone-volume"></i>
                    </div>
                    <div>
                        <p>Distrito Federal: (61) 99884-2889</p>
                    </div>
                </div>
                <div class="d-flex my-3">
                    <div class="icon-box-icon">
                        <i aria-hidden="true" class="far fa-envelope-open"></i>
                    </div>
                    <div>
                        <a href="mailto:contato@isigtreinamentos.com.br">contato@isigtreinamentos.com.br</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="d-flex my-3">
                    <div class="icon-box-icon">
                        <i aria-hidden="true" class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <p>Impact Hub Brasília | Sgan 601 Conjunto H </br> Sala 54 Ss1 Edifício Íon - Asa
                            Norte,</br>Brasília/DF </br>CEP: 70830-018</p>
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <a target="_blank"
                    href="https://transparencyreport.google.com/safe-browsing/search?url=https:%2F%2Fisigtreinamentos.com.br%2F&hl=pt_BR">
                    <img class="selo-footer my-3" src="/images/site-seguro.png"> </a>
            </div>

        </div>
    </div>

    <p class="copyright m-0">Copyright {{ date('Y') }} Isig Treinamentos®</p>
</div>
