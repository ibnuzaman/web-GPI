<x-app-layout title="Home">
    <x-navbar />

    <section class="d-flex hero-section">
        <div class="hero-container container-fluid">
            <h1>Ingin Menemukan</h1>
            <h1> Produk Lebih Banyak?</h1>
            <a href="{{ route('produk') }}"><button class="btn btn-light"><span>Cek Disini</span></button></a>
        </div>
    </section>

    <section class="about">
        <div id="carouselExample" class="carousel slide carousel-landing" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item car-item-landing active" id="gpi">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 py-2">
                            <img class="d-block img-fluid" src="./assets/img/logo.jpg" alt="First slide">
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 py-2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget condimentum
                                risus.
                                Etiam vitae augue neque. Donec ultrices elit augue, eget consectetur felis molestie
                                non.
                                In metus ligula, auctor sit amet rutrum id, eleifend at odio. Donec blandit purus
                                quis
                                augue efficitur congue. Cras tincidunt porta tincidunt. Quisque ultricies ac mauris
                                non
                                hendrerit. Proin congue felis a nisl vulputate, non suscipit ipsum dapibus.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item car-item-landing" id="garish">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 py-2">
                            <img class="d-block img-fluid" src="./assets/img/carousel-igarish.png" alt="Second slide">
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 py-2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget condimentum
                                risus.
                                Etiam vitae augue neque. Donec ultrices elit augue, eget consectetur felis molestie
                                non.
                                In metus ligula, auctor sit amet rutrum id, eleifend at odio. Donec blandit purus
                                quis
                                augue efficitur congue. Cras tincidunt porta tincidunt. Quisque ultricies ac mauris
                                non
                                hendrerit. Proin congue felis a nisl vulputate, non suscipit ipsum dapibus.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item car-item-landing" id="tridaya">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 py-2">
                            <img class="d-block img-fluid" src="./assets/img/carousel-tridaya.png" alt="Third slide">
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 py-2">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget condimentum
                                risus.
                                Etiam vitae augue neque. Donec ultrices elit augue, eget consectetur felis molestie
                                non.
                                In metus ligula, auctor sit amet rutrum id, eleifend at odio. Donec blandit purus
                                quis
                                augue efficitur congue. Cras tincidunt porta tincidunt. Quisque ultricies ac mauris
                                non
                                hendrerit. Proin congue felis a nisl vulputate, non suscipit ipsum dapibus.</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="custom-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="custom-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <x-button-whatsapp />

    <x-footer />

</x-app-layout>
