<div class="sidebar" data-color="purple">


    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">
        <div class="logo">
            <button class="btn border-0" style='color: white;' id="sidebarToggle">
            

            </button>

        </div>
        <ul class="nav mt-3">
            <li class="nav-item @if($activePage == 'dashboard') active @endif">
                <a class="nav-link" href="{{route('dashboard')}}">
                   <i class="fas fa-home"></i> 
                    <p>{{ __("Home") }}</p>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#laravelExamples" @if($activeButton=='laravel' )
                    aria-expanded="true" @endif>
                    <p>
                        {{ __('Tú') }}
                        <i id="my_icon" class="fas fa-angle-right"></i>
                    </p>

                </a>
                <div class="collapse @if($activeButton =='laravel') show @endif" id="laravelExamples">
                    <!-- <style>
                    .fas {
                        display: none;
                    } -->
                    </style>
                    <ul class="nav">
                        <li class="nav-item @if($activePage == 'channel') active @endif">
                            <a class="nav-link" href="{{route('profile.edit')}}">
                                <i class="fas fa-tv"></i>
                                <p>{{ __("Tu Canal") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'create') active @endif">
                            <a class="nav-link" href="{{ route('multimedias') }}">
                                <i class="fas fa-upload"></i>
                                <p>{{ __("Subir Videos") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'history') active @endif">
                            <a class="nav-link" href="">
                                <i class="fas fa-history"></i>
                                <p>{{ __("Historial") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'uservideo') active @endif">
                            <a class="nav-link" href="{{ route('multimedia.uservideo') }}">

                                <i class="fas fa-play "></i>
                                <p>{{ __("Tus Videos") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="">
                                <i class="fas fa-clock"></i>
                                <p>{{ __("Ver Mas Tarde") }}</p>
                            </a>
                        </li>
                        <li class="nav-item @if($activePage == 'user-management') active @endif">
                            <a class="nav-link" href="">
                                <i class="fas fa-thumbs-up"></i>
                                <p>{{ __("Videos que me Gustan") }}</p>
                            </a>
                        </li>



                    </ul>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#Subscripcion" @if($activeButton=='laravel' )
                    aria-expanded="true" @endif>
                    <p>{{ __('Subscripciones') }}</p>
                </a>
                <div class="collapse @if($activeButton =='laravel') hidden @endif" id="Subscripcion">
                    <ul class="nav">
                 
                        <li class="nav-item @if($activePage == 'show') active @endif">
                       
                        <a class="nav-link" href="#">
                 
                 
                </a>
                          
                        </li>
                     
                    </ul>
                </div>
            </li>



            
         
            <li class="nav-item @if($activePage == 'notifications') active @endif">
                <a class="nav-link" href="{{route('page.index', 'notifications')}}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __("Notifications") }}</p>
                </a>
            </li>

        </ul>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    // Toggle the icon when the collapse is shown or hidden
    $('#laravelExamples').on('show.bs.collapse hide.bs.collapse', function() {
        var myIcon = $("#my_icon");

        // Check if the collapse is shown or hidden and set the appropriate icon class
        if ($('#laravelExamples').hasClass('show')) {
            myIcon.removeClass("fas fa-angle-right").addClass("fas fa-angle-right fa-rotate-90");
        } else {
            myIcon.removeClass("fas fa-angle-right fa-rotate-90").addClass("fas fa-angle-right");
        }
    });

    // Optionally, you can add an additional click event to handle the initial opening
    $('#laravelExamples').on('shown.bs.collapse', function() {
        var myIcon = $("#my_icon");
        myIcon.removeClass("fas fa-angle-right").addClass("fas fa-angle-right fa-rotate-90");
    });

    $('#laravelExamples').on('hidden.bs.collapse', function() {
        var myIcon = $("#my_icon");
        myIcon.removeClass("fas fa-angle-right fa-rotate-90").addClass("fas fa-angle-right");
    });
});
</script>
<style>
#my_icon {
    transition: transform 0.1s ease;
    /* Adjust the transition duration as needed */
}

#my_icon.fa-rotate-90 {
    transform: rotate(90deg);
}
</style>