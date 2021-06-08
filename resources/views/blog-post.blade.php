<x-home-master>
    @section('content')
     <!-- Title -->
     <h1 class="mt-4">{{$post->title}}</h1>

     <!-- Author -->
     <p class="lead">
       by
       <a href="#">{{$post->user->name}}</a>
     </p>

     <hr>

     <!-- Date/Time -->
        <p>Posted on {{$post->created_at->diffForHumans()}}</p>

     <hr>

     <!-- Preview Image -->
     <img style="height: 200px; width: 400px" class="img-fluid rounded" src="{{asset("/storage/public/post_images/$post->post_image")}}" alt="something">

     <hr>

     <!-- Post Content -->
    <p>{{$post->body}}</p>
  
     <hr>
     <div id="disqus_thread"></div>
     <script>
     
     /**
     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    
     var disqus_config = function () {
     this.page.url = "";  // Replace PAGE_URL with your page's canonical URL variable
     this.page.identifier = ""; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
     var disqus_url = 'http://localhost/';
     };
     
     (function() { // DON'T EDIT BELOW THIS LINE
     var d = document, s = d.createElement('script');
     s.src = 'https://myposts.disqus.com/embed.js';
     s.setAttribute('data-timestamp', +new Date());
     (d.head || d.body).appendChild(s);
     })();
     </script>
     <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                 
     <script id="dsq-count-scr" src="//myposts.disqus.com/count.js" async></script>
     <hr>


    @endsection
</x-home-master>