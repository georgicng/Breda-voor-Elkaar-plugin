@extends('layouts.app')

@section('content')
  @include('partials.page-header')
    <section class="company">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    @php
                        $ID = get_queried_object()->ID;
                        $usermeta = get_user_meta($ID);
                        $userdata = get_userdata($ID);

                        global $post; 
                        $post = get_post( $ID, OBJECT );
                        setup_postdata( $post );
                    @endphp
                    <h1 class="company__name">{{ $usermeta['first_name'][0] }} {{ $usermeta['last_name'][0] }}</h1>
                    <div class="d-flex company__profile">
                        <div class="company__logo-wrapper">
                            <img src="{{ get_field('afbeelding', 'user_' . $ID) }}" class="w-100 img-fluid company__logo">
                        </div>
                        <div class="company__contact">
                            <div class="d-flex flex-column company__contact-group">
                                <small class="company__address">{{ get_field('adres', 'user_' . $ID)['address'] }}</small>
                                <small class="company__phone">{{ get_field('telefoonnummer', 'user_' . $ID) }}</small>
                                <small class="company__website">{{$userdata->user_url}}</small>
                                <small class="company__email">{{$userdata->user_email}}</small>
                            </div>
                            @php
                                $social = [
                                    'instagram' => '#',
                                    'twitter' => '#',
                                    'facebook' => '#',
                                    'linkedin' => '#',
                                    'youtube' => '#',
                                ];
                            @endphp
                            @include('partials.content-organisation-social-link')
                        </div>
                    </div>
                    <div class="row company__bio">
                        {{ $userdata->description }}
                    </div>
                    @if($categories = get_field('categorie', 'user_' . $ID))
                        <div class="d-flex flex-wrap text-dark company__categories">
                            @include('partials.content-organisation-categories')
                        </div>
                    @endif

                    @php
                        $args = array(
                        'author' => $ID,
                        'post_type' => 'vacancies',
                        );
                        $posts = get_posts($args);
                    @endphp
                    @if ($posts)
                    <h1>Vacancies</h1>    
                        @foreach ($posts as $p)
                            @php
                                $more = '.<a href="' . get_permalink($p->ID) . '" class="card-link vacancy-card__link">lees meer ›</a>';
                                $vacancy = [
                                    'title' => $p->post_title,
                                    'link' => get_permalink($p->ID),
                                    'image_link' => get_the_post_thumbnail_url($p->ID, [200, 200]),
                                    'excerpt' => wp_kses_post(wp_trim_words($p->post_content, 25, $more)),
                                    'subtitle' => $p->post_title,
                                    'footer' => get_field("image_link", $p->ID),
                                ];
                            @endphp
                            @include('partials.content-vacancy')
                        @endforeach
                    @endif
                    @php
                        wp_reset_postdata();
                    @endphp
                </div>
                <aside class="col-sm-4 company__sidebar blog__sidebar sidebar">
                    @include('partials.content-contact-form')
                </aside>
            </div>
        </div>
    </section>
@endsection
