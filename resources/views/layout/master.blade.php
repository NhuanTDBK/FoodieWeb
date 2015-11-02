<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300italic,300,100' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" type="text/css" href="vendors/css/nomalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/style.css">
    <!-- Latest compiled and minified CSS -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="vendors/js/jquery.min.js"></script>
    <script src="vendors/js/bootstrap.min.js"></script>

    <script src="vendors/js/responsive_waterfall.js"></script>
    <title>Fresh Food</title>

    <script>
        window.fbAsyncInit = function() {
                FB.init({
                appId      : '1473244306316838',
                xfbml      : true,
                version    : 'v2.5'
            });
        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
    
<body>
    {{-- Thanh menu --}}
    <nav class="navbar navbar-inverse navbar-fixed-top" style='background-color:#fff;webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.22);'>
        <div class="container-fluid">
            <div class="navbar-header"> 
                <a class="navbar-brand logo" href="/" style="margin-left:80px;">
                    <img src="vendors/img/logo.png" height="50" width="50">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="margin-top:25px;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
            </div>
        
            <div class="collapse navbar-collapse container" id="myNavbar">
                <form class="nav navbar-nav navbar-left" style="margin-top:17px;">
                    <input type="search" placeholder="Search">
                </form> 
                
                <ul class="nav navbar-nav navbar-right" style="margin-top:15px; margin-left:65px;">
                    <li><a href="#" class="loginfb">Đăng nhập bằng fb</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
       
    <section style="margin-top:40px;background-color:#E9E9E9;">
        <div class="wf-container">
            <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Title</h3>
                    <p>Content Here</p>
                    <p>Content Here</p>    
                    <p>Content Here</p>
                </div>
            </div>
            <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Title</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
            </div>
            <div class="wf-box">
                <img src="vendors/img/5.jpg">
                <div class="content">
                    <h3>Heading</h3>
                    <p>Content aa asdfasdfjal</p>    
                </div>
            </div>
        </div>    
    </section>
                        
    @include('layout.modal')
</body>

<script>
    $(document).ready(function(){
        $('.loginfb').on('click', function(){
            FB.login(function(response) {
                if (response.authResponse) {
                    FB.api('/me?fields=id,name,email,birthday,gender', function(response) {
                        console.log(response);
                        $.ajax({
                            type: "POST",
                            url: "{{url('/facebook/login')}}",
                            cache: false,
                            data: {response : response},
                            success: function(data){
                                window.location = '/home';
                            }
                        });
                    });
                } else {
                    console.log('User cancelled login or did not fully authorize.');
                }
            }, {scope: ('email','user_about_me','user_birthday')});
        });

        $("img").click(function(){
            $(".modal").modal('show'); 
        });

        $("#upload-img").click(function(){
            $("#modal").toggle(1000); 
            $(".bar").toggle(2000);
            $(".bar-fill").css("width","100%");
        });
    
        var waterfall = new Waterfall({ 
            minBoxWidth: 250 
        });
    }); 
</script>