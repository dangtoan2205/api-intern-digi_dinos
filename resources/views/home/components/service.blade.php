<section
    class="elementor-section elementor-top-section elementor-element elementor-element-7ef1560 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
    data-id="7ef1560" data-element_type="section"
    data-settings="{&quot;animation&quot;:&quot;none&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-31b1c40 elementor-invisible"
            data-id="31b1c40" data-element_type="column"
            data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;}">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-80c7999 elementor-invisible elementor-widget elementor-widget-heading"
                    data-id="80c7999" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">SERVICES
                        </h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-8a96907 elementor-widget-divider--view-line elementor-invisible elementor-widget elementor-widget-divider"
                    data-id="8a96907" data-element_type="widget"
                    data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}"
                    data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator">
                            </span>
                        </div>
                    </div>
                </div>
                <section
                    class="elementor-section elementor-inner-section elementor-element elementor-element-83e21f1 elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="83e21f1" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-extended">
                        @foreach ($servicePCTop as $service)
                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-82b3f11"
                            data-id="82b3f11" data-element_type="column">
                            <div
                                class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-a7f5e42 pp-info-box-top elementor-widget elementor-widget-pp-info-box"
                                    data-id="a7f5e42" data-element_type="widget"
                                    data-settings="{&quot;icon_position&quot;:&quot;top&quot;}"
                                    data-widget_type="pp-info-box.default">
                                    <div class="elementor-widget-container">
                                        <a class="pp-info-box-container"
                                            href="/offshore-service/">
                                            <div class="pp-info-box">
                                                <div class="pp-info-box-icon-wrap">
                                                    <span
                                                        class="pp-info-box-icon pp-icon elementor-animation-bob">
                                                        <img width="900" height="900"
                                                            src="upload/service/{{ $service->image}}"
                                                            class="attachment-full size-full"
                                                            alt="{{ $service->name_vi }}​"
                                                            data-lazy-src="upload/service/{{ $service->image}}" /><noscript><img
                                                                width="900" height="900"
                                                                src="upload/service/{{ $service->image}}"
                                                                class="attachment-full size-full"
                                                                alt="{{ $service->name_vi }}​" /></noscript>
                                                    </span>
                                                </div>
                                                <div class="pp-info-box-content">
                                                    <div class="pp-info-box-title-wrap">
                                                        <div class="pp-info-box-title-container"
                                                            href="/offshore-service/">
                                                            <h4
                                                                class="pp-info-box-title">
                                                                {{ $service->title_vi }}</h4>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="pp-info-box-description">
                                                        <p>{{ $service->des_vi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </section>
                <section
                    class="elementor-section elementor-inner-section elementor-element elementor-element-83e21f1 elementor-hidden-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="83e21f1" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-extended">
                        @foreach ($servicePCBottom as $service)
                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-82b3f11"
                            data-id="82b3f11" data-element_type="column">
                            <div
                                class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-a7f5e42 pp-info-box-top elementor-widget elementor-widget-pp-info-box"
                                    data-id="a7f5e42" data-element_type="widget"
                                    data-settings="{&quot;icon_position&quot;:&quot;top&quot;}"
                                    data-widget_type="pp-info-box.default">
                                    <div class="elementor-widget-container">
                                        <a class="pp-info-box-container"
                                            href="/offshore-service/">
                                            <div class="pp-info-box">
                                                <div class="pp-info-box-icon-wrap">
                                                    <span
                                                        class="pp-info-box-icon pp-icon elementor-animation-bob">
                                                        <img width="900" height="900"
                                                            src="upload/service/{{ $service->image}}"
                                                            class="attachment-full size-full"
                                                            alt="{{ $service->name_vi }}​"
                                                            data-lazy-src="upload/service/{{ $service->image}}" /><noscript><img
                                                                width="900" height="900"
                                                                src="upload/service/{{ $service->image}}"
                                                                class="attachment-full size-full"
                                                                alt="{{ $service->name_vi }}​" /></noscript>
                                                    </span>
                                                </div>
                                                <div class="pp-info-box-content">
                                                    <div class="pp-info-box-title-wrap">
                                                        <div class="pp-info-box-title-container"
                                                            href="/offshore-service/">
                                                            <h4
                                                                class="pp-info-box-title">
                                                                {{ $service->title_vi }}</h4>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="pp-info-box-description">
                                                        <p>{{ $service->des_vi }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </section>
                <section
                    class="elementor-section elementor-inner-section elementor-element elementor-element-c7b9abd elementor-hidden-desktop elementor-hidden-tablet elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="c7b9abd" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-extended">
                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-b4592ec"
                            data-id="b4592ec" data-element_type="column">
                            <div
                                class="elementor-widget-wrap elementor-element-populated">
                                <div class="elementor-element elementor-element-3cb6989 elementor-widget elementor-widget-pp-info-box-carousel"
                                    data-id="3cb6989" data-element_type="widget"
                                    data-settings="{&quot;equal_height_boxes&quot;:&quot;yes&quot;,&quot;items&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:3,&quot;sizes&quot;:[]},&quot;items_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:2,&quot;sizes&quot;:[]},&quot;items_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:1,&quot;sizes&quot;:[]},&quot;margin&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;margin_tablet&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]},&quot;margin_mobile&quot;:{&quot;unit&quot;:&quot;px&quot;,&quot;size&quot;:10,&quot;sizes&quot;:[]}}"
                                    data-widget_type="pp-info-box-carousel.default">
                                    <div class="elementor-widget-container">
                                        <div
                                            class="swiper-container-wrap pp-info-box-carousel-wrap swiper-container-wrap-dots-outside">
                                            <div class="pp-info-box pp-info-box-carousel pp-swiper-slider swiper-container swiper-container-3cb6989"
                                                data-pagination=".swiper-pagination-3cb6989"
                                                data-arrow-next=".swiper-button-next-3cb6989"
                                                data-arrow-prev=".swiper-button-prev-3cb6989"
                                                data-slider-settings="{&quot;direction&quot;:&quot;horizontal&quot;,&quot;effect&quot;:&quot;slide&quot;,&quot;speed&quot;:600,&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:10,&quot;centeredSlides&quot;:false,&quot;grabCursor&quot;:false,&quot;autoHeight&quot;:true,&quot;loop&quot;:true,&quot;autoplay&quot;:{&quot;delay&quot;:3000,&quot;disableOnInteraction&quot;:false},&quot;pagination&quot;:{&quot;el&quot;:&quot;.swiper-pagination-3cb6989&quot;,&quot;type&quot;:&quot;bullets&quot;,&quot;clickable&quot;:true},&quot;breakpoints&quot;:{&quot;1025&quot;:{&quot;slidesPerView&quot;:3,&quot;spaceBetween&quot;:10},&quot;768&quot;:{&quot;slidesPerView&quot;:2,&quot;spaceBetween&quot;:10},&quot;320&quot;:{&quot;slidesPerView&quot;:1,&quot;spaceBetween&quot;:10}}}">
                                                <div class="swiper-wrapper">
                                                    @foreach ($serviceMobile as $item)
                                                    <div class="swiper-slide">
                                                        <div
                                                            class="pp-info-box-content-wrap">
                                                            <div
                                                                class="pp-info-box-icon-wrap">
                                                                <span
                                                                    class="pp-info-box-icon pp-icon elementor-animation-bob">
                                                                    <img width="768"
                                                                        height="768"
                                                                        src="upload/service/{{ $item->image}}"
                                                                        alt="オフショア開発​"
                                                                        data-lazy-src="upload/service/{{ $item->image}}"><noscript><img
                                                                            width="768"
                                                                            height="768"
                                                                            src="upload/service/{{ $item->image}}"
                                                                            alt="{{ $item->name_vi}}​"></noscript>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="pp-info-box-content">
                                                                <div
                                                                    class="pp-info-box-title-wrap">
                                                                    <div
                                                                        class="pp-info-box-title-container">
                                                                        <h4
                                                                            class="pp-info-box-title">
                                                                            {{ $item->title_vi}}
                                                                        </h4>
                                                                    </div>
                                                                </div>


                                                                <div
                                                                    class="pp-info-box-description">
                                                                    <p>&#8220;{{ $item->des_vi}}&#8221;
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div
                                                class="swiper-pagination swiper-pagination-3cb6989">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>