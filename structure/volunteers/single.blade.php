@extends('layouts.app')

@section('content')
  @include('partials.page-header')
    <section @php post_class('volunteer-page') @endphp>
        <div class="volunteer-page__body">
            @php
                $ID = get_queried_object()->ID;
                $usermeta = get_user_meta($ID);
                $userdata = get_userdata($ID);
            @endphp

            <li>
                ID: {{$ID}}
            </li>
            <li>
                posted on: {{date("d M Y", strtotime($userdata->user_registered))}}
            </li>
            <li>
                login name: {{$usermeta['nickname'][0]}}
            </li>
            <li>
                first name: {{$usermeta['first_name'][0]}}
            </li>
            <li>
                last name: {{$usermeta['last_name'][0]}}
            </li>
            @if (get_field('leeftijd', 'user_' . $ID))
                <li>
                    leeftijd: {{get_field('leeftijd', 'user_' . $ID)}}
                </li>
            @endif
            @if(get_field('adres', 'user_' . $ID))
                <li>
                    adres: {{get_field('adres', 'user_' . $ID)['address']}}
                </li>
            @endif
            @if(get_field('opleiding', 'user_' . $ID))
                <li>
                    opleiding: {{get_field('opleiding', 'user_' . $ID)}}
                </li>
            @endif
            @if(get_field('ervaring', 'user_' . $ID))
                <li>
                    ervaring: {{get_field('ervaring', 'user_' . $ID)}}
                </li>
            @endif
            @if(get_field('cv', 'user_' . $ID))
                <li>
                    cv downloadlink: {{get_field('cv', 'user_' . $ID)}}
                </li>
            @endif

            @php
                $posts = get_field('applied', 'user_' . $ID);
            @endphp
            @if($posts)
                <li>
                    <ul>
                    @foreach ($posts as $p){{-- // variable must NOT be called $post (IMPORTANT) --}}
                            <li>
                                Applied to: <a href="{{get_permalink($p->ID)}}">{{get_the_title($p->ID)}}</a>
                            </li>
                    @endforeach
                    </ul>
                </li>
            @endif

            @php
                wp_reset_postdata();
            @endphp
        </div>
    </section>
@endsection
