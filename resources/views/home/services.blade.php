<div class="services_section layout_padding">
    <div class="container">
        <h1 class="services_taital">Blog Post</h1>
        <p class="services_text">There are many variations of passages of Lorem Ipsum available, but the majority
            have suffered alteration</p>
        <div class="services_section_2">
            <div class="row">
                @foreach ($post as $post)
                    <div class="col-md-4">
                        <div>
                            <img src="/postimage/{{ $post->image }}" style="width: 350px; height: 350px; margin-bottom: 20px" class="services_img">
                        </div>

                        <h4>{{ $post->title }}</h4>
                        <p>Post By <b>{{ $post->name }}</b></p>

                        <div class="btn_main"><a href="{{ url('post_details', $post->id) }}">Readmore</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>