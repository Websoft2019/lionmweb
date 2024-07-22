@extends('site.template')
@section('content')
<section class="page-header">
    <div class="page-header-bg">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('getHome') }}">Home</a></li>
                <li><span>/</span></li>
                <li class="active">Contact</li>
            </ul>
            <h2>Contact us</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Contact Three Start-->
<section class="contact-three">
    <div class="contact-three-shape"
        style="background-image: url(assets/images/shapes/contact-three-shape.png);"></div>
    <div class="container">
        <div class="section-title text-center">
            <span class="section-title__tagline">Contact with us</span>
            <h2 class="section-title__title">Feel free to write us <br> anytime</h2>
        </div>
        <div class="contact-page__form-box">
            <form action="" class="contact-page__form contact-form-validated">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Your name" name="name">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="email" placeholder="Email address" name="email">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Phone" name="phone">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Club ID" name="clubid">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="contact-form__input-box">
                            <input type="text" placeholder="Subject" name="subject">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-form__input-box text-message-box">
                            <textarea name="message" placeholder="Write a message"></textarea>
                        </div>
                        <div class="contact-form__btn-box">
                            <button type="submit" class="thm-btn contact-form__btn">Send a message</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--Contact Three End-->

<!--Contact One Start-->
<section class="contact-one">
    <div class="container">
        <div class="contact-one__inne">
            <ul class="list-unstyled contact-one__list">
               
                <li class="contact-one__single">
                    <div class="contact-one__icon">
                        <span class="icon-location"></span>
                    </div>
                    <div class="contact-one__content">
                        <p class="contact-one__sub-title">Kathmandu</p>
                        <p class="contact-one__sub-title">Chamati, Balaju-16, KMC</p>
                       
                        <p><a href="tel:+97715912325">+977 015912325</a></p>
                        <h3 class="contact-one__number">
                            <a href="mailto:lionsdistrict325jnepal@gmail.com">lionsdistrict325jnepal@gmail.com</a>
                        </h3>
                    </div>
                </li>
                <li class="contact-one__single">
                    <div class="contact-one__icon">
                        <span class="icon-location"></span>
                    </div>
                    <div class="contact-one__content">
                        <p class="contact-one__sub-title">Pokhara</p>
                        <p class="contact-one__sub-title">Annapurna Lions Service Center</p>
                        <h3 class="contact-one__number">Parsyang, Pokhara-5, Nepal</h3>
                        <p><a href="tel:+97761535222">+977 061535222</a></p>
                        <h3 class="contact-one__number">
                            <a href="mailto:lionsdistrict325jnepal@gmail.com">lionsdistrict325jnepal@gmail.com</a>
                        </h3>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="google-map google-map-two">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d985.0233929953254!2d83.97910990706707!3d28.223714996196243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39959450ce8b459d%3A0xd0e0063cf541b377!2zTGlvbidzIENoaWxkcmVuIFBhcmssIOCkquCli-CkluCksOCkviAzMzcwMA!5e0!3m2!1sne!2snp!4v1657649750212!5m2!1sne!2snp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@stop