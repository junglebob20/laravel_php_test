<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/admin_panel.css">
</head>
<body>

<div class="wrapper">
    <div class="header">
        <div class="header-logo">
            <a href="{{url('/dashboard')}}"><h1>Admin panel</h1></a>
        </div>
        <div class="header-user-info">
            <div class="user-name" id="user_name">Admin</div>
            <div class="user-modal" id="user_modal">
                <div class="user-modal-wrapper">
                    <a href="{{url('/logout')}}" class="logout-user">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="main-tabs">
            <nav class="nav">
            <a class="nav-link" href="{{url('/dashboard')}}"><i class="fa fa-tachometer" aria-hidden="true"></i>Dashboard</a>
                <a class="nav-link" href="{{url('/images')}}"><i class="fa fa-picture-o" aria-hidden="true"></i>Images</a>
            </nav>
        </div>
        <div class="main-content" style="display: flex;justify-content: center;align-items: center;">
            <div class="sup-div">
                <h1>Go To Images Tab</h1>
            </div>
        </div>
    </div>
    <script>
        $('#user_name').click(function(){
            if(!$('#user_modal').hasClass('modal-open')){
                $('#user_modal').addClass('modal-open');
            }else{
                $('#user_modal').removeClass('modal-open');
            }
        });
    </script>
</div>

</body>
</html>