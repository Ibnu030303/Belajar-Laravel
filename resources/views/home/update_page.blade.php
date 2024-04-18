<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <!-- basic -->
    @include('home.homecss')
</head>
<style>
    .div-deg {
        text-align: center;
        background-color: black;
    }

    .title-deg {
        font-size: 30px;
        font-weight: bold;
        color: white;
        padding: 35px
    }

    label {
        display: inline-block;
        width: 200px;
        color: white;
        font-size: 18px;
        font-weight: bold;
    }

    img {
        margin: auto;
    }

    .field-deg {
        padding: 25px
    }
</style>

<body>
    <!-- header section start -->
    <div class="header_section">

        @include('home.header')

        <div class="div-deg">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h3 class="title-deg"> Update Post</h3>
            <form action="{{ url('update_post_data', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field-deg">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{ $data->title }}">
                </div>
                <div class="field-deg">
                    <label for="">Description</label>
                    <input type="text" name="description" value="{{ $data->description }}">
                </div>
                <div class="field-deg">
                    <label for="">Current Image</label>
                    <img src="/postimage/{{ $data->image }}" height="150" width="150" alt="iamge">
                </div>
                <div class="field-deg">
                    <label for="">Change Current Image</label>
                    <input type="file" name="image">
                </div>

                <div class="field-deg">
                    <button type="submit" value="Add Post" class="btn btn-outline-secondary">Update Post</button>
                </div>
            </form>
        </div>

        <!-- footer section start -->
        @include('home.footer')
</body>

</html>
