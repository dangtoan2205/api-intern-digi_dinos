@extends('layouts.main')
@section('content')
<div id="content" class="site-content">
    <div class="ast-container">
        <div id="primary" class="content-area primary">
            <main id="main" class="site-main">
                <article class="post-952 page type-page status-publish ast-article-single" id="post-952"
                    itemtype="https://schema.org/CreativeWork" itemscope="itemscope">
                    <header class="entry-header ast-header-without-markup">
                    </header><!-- .entry-header -->
                    <div class="entry-content clear" itemprop="text">
                        <div data-elementor-type="wp-page" data-elementor-id="952" class="elementor elementor-952"
                            data-elementor-settings="[]">
                            <div class="elementor-section-wrap">
                                @include('home.components.slider')
                                @include('home.components.introduction')
                                @include('home.components.service')
                                @include('home.components.achievement')
                                @include('home.components.qualifications')
                                @include('home.components.domain')
                                @include('home.components.news')
                                @include('home.components.faq')
                                @include('home.components.banner')      
                            </div>
                        </div>
                    </div><!-- .entry-content .clear -->
                </article><!-- #post-## -->
            </main><!-- #main -->
        </div><!-- #primary -->
    </div> <!-- ast-container -->
</div><!-- #content -->
@endsection