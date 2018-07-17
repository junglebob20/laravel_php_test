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
                <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
                <a class="nav-link" href="{{url('/images')}}">Images</a>
            </nav>
        </div>
        <div class="main-content">
            <div class="content-addimage">
                @if (session('success'))
                    <div class="image-status" style="color:green;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        {{session('success')}}
                    </div>
                @elseif (session('fail'))
                    <div class="image-status" style="color:red;">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        {{session('fail')}}
                    </div>
                @else
                    <div class="image-status">

                    </div>
                @endif
                <form id="addImage_form" action="{{url('/image')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="addimage_input" class="btn">Add new image</label>
                        <input type="file" name="image" class="form-control-file" id="addimage_input">
                    </div>
                </form>
            </div>
            <div class="content-imagedata">
                    @if (count($items)>0)
                    <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" class="table-col"><a href="{{ action('ImagesController@sort', ['column' => 'id', 'option' => 'asc']) }}"></a>Id</th>
                                <th scope="col" class="table-col">Image</th>
                                <th scope="col" class="table-col"><a href="{{ action('ImagesController@sort', ['column' => 'name', 'option' => 'asc']) }}"></a>Name</th>
                                <th scope="col" class="table-col"><a href="{{ action('ImagesController@sort', ['column' => 'tag', 'option' => 'asc']) }}"></a>Tag</th>
                                <th scope="col" class="table-col"><a href="{{ action('ImagesController@sort', ['column' => 'path', 'option' => 'asc']) }}"></a>Path to folder</th>
                                <th scope="col" class="table-col"><a href="{{ action('ImagesController@sort', ['column' => 'ext', 'option' => 'asc']) }}"></a>Image format</th>
                                <th scope="col" class="table-col"><a href="{{ action('ImagesController@sort', ['column' => 'created_at', 'option' => 'asc']) }}"></a>Created</th>
                                <th scope="col" class="table-col"><a href="{{ action('ImagesController@sort', ['column' => 'updated_at', 'option' => 'asc']) }}"></a>Updated</th>
                                <th scope="col" class="table-col"></th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $k=>$item)
                                <tr class="table-row">
                                    <th scope="row">{{$item->id}}</th>
                                    <td><img data-toggle="modal" data-target="#modal-open-img" class="img-item" src="{{$item->path.$item->name.'.'.$item->ext}}" alt="{{$item->name}}"></td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->tag}}</td>
                                    <td>{{$item->path}}</td>
                                    <td>{{$item->ext}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td class="delete-item-wrapper"><a href="{{action('ImagesController@destroy', ['id' => $item->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                    @endif
            </div>
        </div>
    </div>
    <div class="modal" id="modal-open-img" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body">
                
            </div>
          </div>
        </div>
    </div>
    <script>
        $('#addimage_input').change(function(){
            $('#addImage_form').submit();
        });
        $('.img-item').click(function(){
            var img_item=$(this).clone();
            $('#modal-open-img').find('.modal-body').empty().prepend(img_item);
        });
        $('#modal-open-img').on('shown.bs.modal', function (e) {
            $('#modal-open-img').attr('style','display: flex!important;justify-content: center;align-items: center;');
            $('#modal-open-img').find('.modal-dialog').attr('style','max-width: 542px;margin: 0;');
            $('#modal-open-img').find('img').attr('style','width: 100%;height: 100%;');
        })
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