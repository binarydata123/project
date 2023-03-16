<!DOCTYPE html>
<html lang="en">

    @include('lawyer.community.layouts.head')

    <!-- <body  style="background-image: url('/community/assets/images/smiley-bg.jpg');"> -->
    <body  class="bg-smile">
        @include('common.layouts.header')
        @include('lawyer.community.layouts.group-tabs')
        <!-- page body start -->
        <section class="messanger-section">
            <div class="content-center col-xl-10">
                <div class="about-profile section-b-space"  style="margin-left: 17%!important;margin-top: 2%;">
                    <div class="card-title">
                        <h3>{{$group->group_name}}</h3>                    
                    </div>
                    <ul class="about-list">
                        <li>
                            <h5 class="title">About</h5>
                            <h6 class="content">{{$group->about}}
                            </h6>
                        </li>
                    </ul>
                </div>
            </div>
            @include('lawyer.community.layouts.scripts')
        </section>
    </body>
</html>