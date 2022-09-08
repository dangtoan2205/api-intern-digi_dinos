<section
    class="elementor-section elementor-top-section elementor-element elementor-element-6ab4b57 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
    data-id="6ab4b57" data-element_type="section"
    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
    <div class="elementor-container elementor-column-gap-no">
        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a532ebd"
             data-id="a532ebd" data-element_type="column">
            <div class="elementor-widget-wrap elementor-element-populated">
                <div class="elementor-element elementor-element-1ee43f8 elementor-widget elementor-widget-smartslider"
                     data-id="1ee43f8" data-element_type="widget"
                     data-widget_type="smartslider.default">
                    <div class="elementor-widget-container">
                        <div class="n2-section-smartslider fitvidsignore  n2_clear"
                             data-ssid="1" tabindex="0" role="region"
                             aria-label="Slider">
                            <div id="n2-ss-1-align" class="n2-ss-align">
                                <div class="n2-padding">
                                    <div id="n2-ss-1" data-creator="Smart Slider 3"
                                         data-responsive="fullwidth"
                                         class="n2-ss-slider n2-ow n2-has-hover n2notransition  ">
                                        <div class="n2-ss-slider-wrapper-inside">
                                            <div class="n2-ss-slider-1 n2_ss__touch_element n2-ow"
                                                 style="">
                                                <div class="n2-ss-slider-2 n2-ow">
                                                    <div class="n2-ss-slider-3 n2-ow"
                                                         style="">

                                                        <div class="n2-ss-slide-backgrounds n2-ow-all">
                                                            @foreach($sliders as $key => $slider)
                                                            <div class="n2-ss-slide-background"
                                                                 data-public-id="{{$key+1}}"
                                                                 data-mode="fill">
                                                                <div class="n2-ss-slide-background-image"
                                                                     data-blur="0"
                                                                     data-opacity="100"
                                                                     data-x="50"
                                                                     data-y="50"
                                                                     data-alt=""
                                                                     data-title="">
                                                                    <picture
                                                                        class="skip-lazy"
                                                                        data-skip-lazy="1">
                                                                        <img
                                                                            src="{{url('uploads/imagesSlider/'.$slider->image_url)}}"
                                                                            alt="{{$slider->title_vi}}"
                                                                            title=""
                                                                            loading="lazy"
                                                                            class="skip-lazy"
                                                                            data-skip-lazy="1">
                                                                    </picture>
                                                                </div>
                                                                <div data-color="RGBA(255,255,255,0)"
                                                                     style="background-color: RGBA(255,255,255,0);"
                                                                     class="n2-ss-slide-background-color">
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                        <div class="n2-ss-slider-4 n2-ow">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                 viewBox="0 0 1200 600"
                                                                 data-related-device="desktopPortrait"
                                                                 class="n2-ow n2-ss-preserve-size n2-ss-preserve-size--slider n2-ss-slide-limiter"></svg>
                                                            <div data-first="1"
                                                                 data-slide-duration="0"
                                                                 data-id="1"
                                                                 data-slide-public-id="1"
                                                                 data-title="Slide Background"
                                                                 class="n2-ss-slide n2-ow  n2-ss-slide-1">
                                                                <div role="note"
                                                                     class="n2-ss-slide--focus"
                                                                     tabindex="-1">Slide
                                                                    Background
                                                                </div>
                                                                <div
                                                                    class="n2-ss-layers-container n2-ss-slide-limiter n2-ow">
                                                                    <div class="n2-ss-layer n2-ow n-uc-SjnTnCCs8E1Y"
                                                                         data-sstype="slide"
                                                                         data-pm="default">
                                                                        <div class="n2-ss-layer n2-ow n-uc-IbNOabpfT5aE"
                                                                             data-pm="default"
                                                                             data-sstype="content"
                                                                             data-hasbackground="0">
                                                                            <div
                                                                                class="n2-ss-section-main-content n2-ss-layer-with-background n2-ss-layer-content n2-ow n-uc-IbNOabpfT5aE-inner">
                                                                                <div
                                                                                    class="n2-ss-layer n2-ow n2-ss-layer--block n2-ss-has-self-align n-uc-dtwtw9DVCwgQ"
                                                                                    data-pm="normal"
                                                                                    data-sstype="row">
                                                                                    <div
                                                                                        class="n2-ss-layer-row n2-ss-layer-with-background n-uc-dtwtw9DVCwgQ-inner">
                                                                                        <div
                                                                                            class="n2-ss-layer-row-inner ">
                                                                                            <div
                                                                                                class="n2-ss-layer n2-ow n-uc-Fjvyu081qJeK"
                                                                                                data-pm="default"
                                                                                                data-hidetabletportrait="1"
                                                                                                data-sstype="col">
                                                                                                <div
                                                                                                    class="n2-ss-layer-col n2-ss-layer-with-background n2-ss-layer-content n-uc-Fjvyu081qJeK-inner">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="n2-ss-layer n2-ow n-uc-LnImbm1HgUAv"
                                                                                                data-pm="default"
                                                                                                data-sstype="col">
                                                                                                <div
                                                                                                    class="n2-ss-layer-col n2-ss-layer-with-background n2-ss-layer-content n-uc-LnImbm1HgUAv-inner">
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-5ejRTiSFBFUJ"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <h2 id="n2-ss-1item1"
                                                                                                            class="n2-font-85e4fe6c81c4caf2432459ed72bb8d4b-hover   n2-ss-item-content n2-ss-text n2-ow"
                                                                                                            style="display:block;">
                                                                                                            Miichisoftが「テクノロジーパートナー」になることは大変光栄です
                                                                                                        </h2>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-MNdinQWGXr3y"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <div
                                                                                                            class="n2-ss-item-content n2-ss-text n2-ow-all">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <p
                                                                                                                    class="n2-font-4b9831b6ab52b8f3922b049eab471333-paragraph   ">
                                                                                                                    我々はプロジェットの最初から開発、またメンテナンスの段階までのコンサルティングサービスを通じて要求に従うことだけでなく、お客様により多くの価値をもたらします。
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-slide-duration="0"
                                                                 data-id="3"
                                                                 data-slide-public-id="2"
                                                                 data-title="Slide Background"
                                                                 class="n2-ss-slide n2-ow  n2-ss-slide-3">
                                                                <div role="note"
                                                                     class="n2-ss-slide--focus"
                                                                     tabindex="-1">Slide
                                                                    Background
                                                                </div>
                                                                <div
                                                                    class="n2-ss-layers-container n2-ss-slide-limiter n2-ow">
                                                                    <div class="n2-ss-layer n2-ow n-uc-E9PN7Jg50GRm"
                                                                         data-sstype="slide"
                                                                         data-pm="default">
                                                                        <div class="n2-ss-layer n2-ow n-uc-tqe4bNzvZqpH"
                                                                             data-pm="default"
                                                                             data-sstype="content"
                                                                             data-hasbackground="0">
                                                                            <div
                                                                                class="n2-ss-section-main-content n2-ss-layer-with-background n2-ss-layer-content n2-ow n-uc-tqe4bNzvZqpH-inner">
                                                                                <div
                                                                                    class="n2-ss-layer n2-ow n2-ss-layer--block n2-ss-has-self-align n-uc-xD3C4JujMUTV"
                                                                                    data-pm="normal"
                                                                                    data-sstype="row">
                                                                                    <div
                                                                                        class="n2-ss-layer-row n2-ss-layer-with-background n-uc-xD3C4JujMUTV-inner">
                                                                                        <div
                                                                                            class="n2-ss-layer-row-inner ">
                                                                                            <div
                                                                                                class="n2-ss-layer n2-ow n-uc-tGvNXWGBVADH"
                                                                                                data-pm="default"
                                                                                                data-hidetabletportrait="1"
                                                                                                data-sstype="col">
                                                                                                <div
                                                                                                    class="n2-ss-layer-col n2-ss-layer-with-background n2-ss-layer-content n-uc-tGvNXWGBVADH-inner">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="n2-ss-layer n2-ow n-uc-CRV9q9mRiHMP"
                                                                                                data-pm="default"
                                                                                                data-sstype="col">
                                                                                                <div
                                                                                                    class="n2-ss-layer-col n2-ss-layer-with-background n2-ss-layer-content n-uc-CRV9q9mRiHMP-inner">
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-iCzyVRFFCCTY"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <h2 id="n2-ss-1item3"
                                                                                                            class="n2-font-85e4fe6c81c4caf2432459ed72bb8d4b-hover   n2-ss-item-content n2-ss-text n2-ow"
                                                                                                            style="display:block;">
                                                                                                            ビジョン<br>
                                                                                                        </h2>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-cVGLBMtm6HfQ"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <div
                                                                                                            class="n2-ss-item-content n2-ss-text n2-ow-all">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <p
                                                                                                                    class="n2-font-9c05093b7ccaeddc2ecbcc63362e6a9c-paragraph   ">
                                                                                                                    アジアでITソリューション及びITサービスプを提供するトッププロバイダーになること。
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-1fdd6fd738bdc"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <h2 id="n2-ss-1item5"
                                                                                                            class="n2-font-5fd9a517c21cf8eba899e1962973eb8d-hover   n2-ss-item-content n2-ss-text n2-ow"
                                                                                                            style="display:block;">
                                                                                                            ミッション
                                                                                                        </h2>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-11b399f8e677f"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <div
                                                                                                            class="n2-ss-item-content n2-ss-text n2-ow-all">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <p
                                                                                                                    class="n2-font-9abdbc07e1807ba16eceedbcdd057f62-paragraph   ">
                                                                                                                    最高のコンサルティング能力、サービス及びテクノロジーにより、お客様に満足と安心をもたらします。
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-193fc8417cb3c"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <div
                                                                                                            class="n2-ss-item-content n2-ss-text n2-ow-all">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <p
                                                                                                                    class="n2-font-9c05093b7ccaeddc2ecbcc63362e6a9c-paragraph   ">
                                                                                                                    幸せな職場環境を構築し、Miichisoft従業員の能力向上を促します。
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div
                                                                                                        class="n2-ss-layer n2-ow n-uc-133a94c46ea13"
                                                                                                        data-pm="normal"
                                                                                                        data-sstype="layer">
                                                                                                        <div
                                                                                                            class="n2-ss-item-content n2-ss-text n2-ow-all">
                                                                                                            <div
                                                                                                                class="">
                                                                                                                <p
                                                                                                                    class="n2-font-9c05093b7ccaeddc2ecbcc63362e6a9c-paragraph   ">
                                                                                                                    国際市場で、ベトナム発ブランドの評判を高めることに貢献。
                                                                                                                </p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div data-slide-duration="0"
                                                                 data-id="6"
                                                                 data-slide-public-id="3"
                                                                 data-title="web-01 (2) (1)"
                                                                 class="n2-ss-slide n2-ow  n2-ss-slide-6">
                                                                <div role="note"
                                                                     class="n2-ss-slide--focus"
                                                                     tabindex="-1">web-01
                                                                    (2) (1)
                                                                </div>
                                                                <div
                                                                    class="n2-ss-layers-container n2-ss-slide-limiter n2-ow">
                                                                    <div class="n2-ss-layer n2-ow n-uc-HPLFg5mfoN51"
                                                                         data-sstype="slide"
                                                                         data-pm="default">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="n2-ss-slider-controls n2-ss-slider-controls-absolute-left-center">
                                                <div style="--widget-offset:15px;"
                                                     class="n2-ss-widget nextend-arrow n2-ow-all nextend-arrow-previous  nextend-arrow-animated-fade"
                                                     data-hide-mobileportrait="1"
                                                     id="n2-ss-1-arrow-previous"
                                                     role="button"
                                                     aria-label="previous arrow"
                                                     tabindex="0"><img width="32"
                                                                       height="32"
                                                                       class="n2-arrow-normal-img skip-lazy"
                                                                       data-skip-lazy="1"
                                                                       src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxwYXRoIGQ9Ik0xMS40MzMgMTUuOTkyTDIyLjY5IDUuNzEyYy4zOTMtLjM5LjM5My0xLjAzIDAtMS40Mi0uMzkzLS4zOS0xLjAzLS4zOS0xLjQyMyAwbC0xMS45OCAxMC45NGMtLjIxLjIxLS4zLjQ5LS4yODUuNzYtLjAxNS4yOC4wNzUuNTYuMjg0Ljc3bDExLjk4IDEwLjk0Yy4zOTMuMzkgMS4wMy4zOSAxLjQyNCAwIC4zOTMtLjQuMzkzLTEuMDMgMC0xLjQybC0xMS4yNTctMTAuMjkiCiAgICAgICAgICBmaWxsPSIjZmZmZmZmIiBvcGFjaXR5PSIwLjgiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPgo8L3N2Zz4="
                                                                       alt="previous arrow"><img
                                                        width="32" height="32"
                                                        class="n2-arrow-hover-img skip-lazy"
                                                        data-skip-lazy="1"
                                                        src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxwYXRoIGQ9Ik0xMS40MzMgMTUuOTkyTDIyLjY5IDUuNzEyYy4zOTMtLjM5LjM5My0xLjAzIDAtMS40Mi0uMzkzLS4zOS0xLjAzLS4zOS0xLjQyMyAwbC0xMS45OCAxMC45NGMtLjIxLjIxLS4zLjQ5LS4yODUuNzYtLjAxNS4yOC4wNzUuNTYuMjg0Ljc3bDExLjk4IDEwLjk0Yy4zOTMuMzkgMS4wMy4zOSAxLjQyNCAwIC4zOTMtLjQuMzkzLTEuMDMgMC0xLjQybC0xMS4yNTctMTAuMjkiCiAgICAgICAgICBmaWxsPSIjZmZmZmZmIiBvcGFjaXR5PSIxIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz4KPC9zdmc+"
                                                        alt="previous arrow"></div>
                                            </div>
                                            <div class="n2-ss-slider-controls n2-ss-slider-controls-absolute-right-center">
                                                <div style="--widget-offset:15px;"
                                                     class="n2-ss-widget nextend-arrow n2-ow-all nextend-arrow-next  nextend-arrow-animated-fade"
                                                     data-hide-mobileportrait="1"
                                                     id="n2-ss-1-arrow-next"
                                                     role="button"
                                                     aria-label="next arrow"
                                                     tabindex="0"><img width="32"
                                                                       height="32"
                                                                       class="n2-arrow-normal-img skip-lazy"
                                                                       data-skip-lazy="1"
                                                                       src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxwYXRoIGQ9Ik0xMC43MjIgNC4yOTNjLS4zOTQtLjM5LTEuMDMyLS4zOS0xLjQyNyAwLS4zOTMuMzktLjM5MyAxLjAzIDAgMS40MmwxMS4yODMgMTAuMjgtMTEuMjgzIDEwLjI5Yy0uMzkzLjM5LS4zOTMgMS4wMiAwIDEuNDIuMzk1LjM5IDEuMDMzLjM5IDEuNDI3IDBsMTIuMDA3LTEwLjk0Yy4yMS0uMjEuMy0uNDkuMjg0LS43Ny4wMTQtLjI3LS4wNzYtLjU1LS4yODYtLjc2TDEwLjcyIDQuMjkzeiIKICAgICAgICAgIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjAuOCIgZmlsbC1ydWxlPSJldmVub2RkIi8+Cjwvc3ZnPg=="
                                                                       alt="next arrow"><img width="32"
                                                                                             height="32"
                                                                                             class="n2-arrow-hover-img skip-lazy"
                                                                                             data-skip-lazy="1"
                                                                                             src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMzIiIGhlaWdodD0iMzIiIHZpZXdCb3g9IjAgMCAzMiAzMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KICAgIDxwYXRoIGQ9Ik0xMC43MjIgNC4yOTNjLS4zOTQtLjM5LTEuMDMyLS4zOS0xLjQyNyAwLS4zOTMuMzktLjM5MyAxLjAzIDAgMS40MmwxMS4yODMgMTAuMjgtMTEuMjgzIDEwLjI5Yy0uMzkzLjM5LS4zOTMgMS4wMiAwIDEuNDIuMzk1LjM5IDEuMDMzLjM5IDEuNDI3IDBsMTIuMDA3LTEwLjk0Yy4yMS0uMjEuMy0uNDkuMjg0LS43Ny4wMTQtLjI3LS4wNzYtLjU1LS4yODYtLjc2TDEwLjcyIDQuMjkzeiIKICAgICAgICAgIGZpbGw9IiNmZmZmZmYiIG9wYWNpdHk9IjEiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPgo8L3N2Zz4="
                                                                                             alt="next arrow"></div>
                                            </div>
                                            <div class="n2-ss-slider-controls n2-ss-slider-controls-absolute-center-bottom">
                                                <div style="--widget-offset:5px;"
                                                     class="n2-ss-widget n2-ss-control-bullet n2-ow-all n2-ss-control-bullet-horizontal">
                                                    <div
                                                        class=" nextend-bullet-bar n2-bar-justify-content-center">
                                                        <div
                                                            class="n2-bullet n2-style-37b83350d88fb82e7ea26e8ad7887167-dot "
                                                            style="visibility:hidden;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <ss3-loader></ss3-loader>
                                </div>
                            </div>
                            <div class="n2_clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
