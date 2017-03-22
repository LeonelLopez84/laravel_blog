<div class="social-buttons pull-right">
    <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
       target="_blank">
       <i class="fa fa-facebook-official"></i>
    </a>
    <a class="twitter" href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}"
       target="_blank">
        <i class="fa fa-twitter-square"></i>
    </a>
    <a class="gplus" href="https://plus.google.com/share?url={{ urlencode($url) }}"
       target="_blank">
       <i class="fa fa-google-plus-square"></i>
    </a>
    <a class="pinterest" href="https://pinterest.com/pin/create/button/?{{ 
        http_build_query([
            'url' => $url,
            'media' => $image,
            'description' => $description
        ]) 
        }}" target="_blank">
        <i class="fa fa-pinterest-square"></i>
    </a>
</div>