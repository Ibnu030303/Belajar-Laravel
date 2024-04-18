<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- basic -->
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

    </div>
    <!-- header section end -->

    <div class="col-md-12" style="text-align: center">
        <div>
            <img src="/postimage/{{ $post->image }}" style="padding: 20px; width: 350px; height: 350px; margin: auto;"
                class="services_img">
        </div>

        <h3><b>{{ $post->title }}</b></h3>
        <h4>{{ $post->description }}</h4>

        <p>Post By <b>{{ $post->name }}</b></p>

    </div>

    <!-- footer section start -->
    @include('home.footer')
</body>

</html>
