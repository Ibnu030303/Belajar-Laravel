<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    @include('home.homecss')
</head>
<style>
    .div-deg {
        text-align: center;
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
    .field-deg {
        padding: 25px
    }
</style>
<body>

    @include('sweetalert::alert')
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')


        <div class="div-deg">

            <h3 class="title-deg" > Add Post</h3>
            <form action="{{ url('user_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="field-deg">
                    <label for="">Title</label>
                    <input type="text" name="title">
                </div>
                <div class="field-deg">
                    <label for="">Description</label>
                    <input type="text" name="description">
                </div>
                <div class="field-deg">
                    <label for="">Add Image</label>
                    <input type="file" name="image">
                </div>
                <div class="field-deg">
                    <button type="submit" value="Add Post" class="btn btn-outline-secondary">Add Post</button>
                </div> 
            </form>
        </div>


    <!-- footer section start -->
    @include('home.footer')
</body>

</html>
