<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/js/tether.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.4/css/tether.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/admin_panel.css">
</head>
<body>

<div class="wrapper">
    <div class="header">
        <div class="header-logo">
            <h1>Admin panel</h1>
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
                <a class="nav-link" href="#">Dashboard</a>
                <a class="nav-link" href="#">Images</a>
            </nav>
        </div>
        <div class="main-content">
            <div class="content-addimage">
                <form action="">
                    <div class="form-group">
                        <label for="addimage_btn" class="btn">Add new image</label>
                        <input type="file" class="form-control-file" id="addimage_btn">
                    </div>
                </form>
            </div>
            <div class="content-imagedata">
                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Tag</th>
                                <th scope="col">Path to folder</th>
                                <th scope="col">Image format</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td><img src="assets/images/cat1.jpeg" alt="cat"></td>
                                <td>Lorem</td>
                                <td>Lorem</td>
                                <td>/Lorem/Lorem/Lorem</td>
                                <td>Lor</td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td><img src="assets/images/cat2.jpg" alt="cat"></td>
                                <td>Lorem</td>
                                <td>Lorem</td>
                                <td>/Lorem/Lorem/Lorem</td>
                                <td>Lor</td>
                              </tr>
                            </tbody>
                          </table>
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