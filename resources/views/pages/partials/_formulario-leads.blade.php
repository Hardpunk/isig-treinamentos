<section id="ebook__wrapper" class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 col-lg-5 offset-lg-1">
                <div class="card shadow-none">
                    <div class="card-body">
                        <span class="badge badge-primary bg-white acim-text-color d-block d-md-inline-block">Newsletter</span>
                        <h4 class="mt-3">Quer receber novidades e promoções sobre cursos?</br>Cadastre-se na nossa newsletter!</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5">
                <div class="card shadow-none">
                    <div class="card-body">
                        <form id="form-ebook">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" id="name" name="name" placeholder="Nome" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" name="email" placeholder="E-mail" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="phone">Aniversário</label>
                                <input type="text" id="aniver" name="aniver" placeholder="Aniversário" class="form-control phone-mask" />
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn bg-white acim-text-color text-white ml-0">
                                    <i class="fas fa-paper-plane"></i>
                                    <span class="font-weight-bold">ENVIAR</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
