<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- basic -->
    @include('home.homecss')
</head>
<style>
    .post-deg {
        padding: 30px;
        text-align: center;
        background-color: whitesmoke;
    }

    .title-deg {
        font-size: 30px;
        font-weight: bold;
        padding: 15px;
        color: black;
    }

    .desc-deg {
        font-size: 18px;
        font-weight: bold;
        padding: 15px;
        color: black;
    }

    .img-deg {
        height: 200px;
        width: 300px;
        margin: auto;
        padding: 30px;
    }
</style>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')

        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{ session()->get('message') }}
            </div>
        @endif
        @foreach ($data as $data)
            <div class="post-deg">
                <img src="/postimage/{{ $data->image }}" alt="deas" class="img-deg">
                <h4 class="title-deg">{{ $data->title }}</h4>
                <p class="desc-deg">{{ $data->description }}</p>

                <a href="{{ url('my_post_del', $data->id) }}" onclick="return confirm('are you sure delete ?')"
                    class="btn btn-danger">Delete</a>
                <a href="{{ url('post_update_page', $data->id) }}" class="btn btn-primary">Update</a>
            </div>
        @endforeach

    </div>
    <!-- header section end -->


    <!-- footer section start -->
    @include('home.footer')
</body>

</html>
