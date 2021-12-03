<div class="hiraola-social_link">
    <ul>
        <li class="facebook">
            <a href="{{ $contacts[0]->facebook ?? '' }}" data-toggle="tooltip" target="_blank"
                title="Facebook">
                <i class="fab fa-facebook"></i>
            </a>
        </li>
       {{--  <li class="twitter">
            <a href="https://twitter.com" data-toggle="tooltip" target="_blank" title="Twitter">
                <i class="fab fa-twitter-square"></i>
            </a>
        </li>
        <li class="google-plus">
            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank"
                title="Google Plus">
                <i class="fab fa-google-plus"></i>
            </a>
        </li> --}}
        <li class="instagram">
            <a href="{{ $contacts[0]->instagram ?? '' }}" data-toggle="tooltip" target="_blank" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
    </ul>
</div>