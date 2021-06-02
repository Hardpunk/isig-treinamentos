<section class="mt-0 choose-category text-center py-5 mb-6 bg-area-curso">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <h3 class="title d-block text-cinza">Mais de <b>1000 cursos</b> online em diversas áreas com <b>certificado</b>.</br>
O que você quer <b>aprender</b> hoje?
</h3>

            </div>
        </div>
        <div class="container align-items-center">
            <div class="row col-equal">
                <?php $count = 0; ?>
                @if(count($destaques) > 0)
                @foreach($destaques as $categoria)
                <?php if($count == 12) break; ?>
                <div class="col-md-4 p-4 col-sm-12">
                    <div class="card category-item item shadow-none">
                        <a class="url-curso" href="{{ route('courses.category', $categoria->slug) }}"
                            title="{{ $categoria->title }}">
                            <div class="card-img-top"
                            style="background-image: url('{{ $categoria->image }}');">
                            <div class="categories__course-count py-1 px-3 text-white">
                            <span class="icon-agenda mr-2"></span> {{ $categoria->courses_total }}
                                CURSOS
                            </div>
                        </div>
                        <div class="card-body py-2 d-flex justify-content-center flex-column">
                            <div>
                                <h5 class="card-title mb-2 mt-2 texto-cursos">{{ $categoria->title }}</h5>
                              <!--  <p class="card-text">
                                    {{ substr($categoria->description, 0, strpos(wordwrap($categoria->description, 70), "\n")) . '...' }}
                                </p>-->
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php $count++; ?>
            @endforeach
            <div class="col-12 d-flex justify-content-center btn-verm">
                <a href="/cursos/" class="btn btn-lg btn-read-more font-weight-bold waves-effect waves-light m-0 btn-ec">
                    Ver todos cursos!
                </a>
            </div>
        </div>
        @else
        <div class="no-results">
            <h4 class="text-center">NENHUMA CATEGORIA ENCONTRADA</h4>
        </div>
        @endif
    </div>
</div>
</section>
