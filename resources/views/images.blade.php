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
    <link rel="stylesheet" href="{{ url('css/admin_panel.css') }}">
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
        <div class="main-content">
        <?php if(!isset($form)){ ?>
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
                <button type="button" data-toggle="modal" data-target="#modal-open-add-img" class="btn btn-primary">Add new image</button>
            </div>
        <?php }?>
            @if (count($items)>0)
            <div class="data-filt" style="margin-bottom: 10px;">
                <form action="{{ action('ImagesController@filtr', ['column' => $sortColumn[0], 'option' => $sortColumn[1]]) }}" method="get">
                    <div class="form-group">
                        <label >Id</label>
                        <input type="text" class="form-control" name="id" placeholder="Enter Id" value="<?php echo isset($form->id) ? $form->id : null; ?>">
                    </div>
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo isset($form->name) ? $form->name : null; ?>">
                    </div>
                    <div class="form-group">
                        <label >Tag</label>
                        <input type="text" class="form-control" name="tag" placeholder="Enter Tag" value="<?php echo isset($form->tag) ? $form->tag : null; ?>">
                    </div>
                    <div class="form-group">
                        <label >Path</label>
                        <input type="text" class="form-control" name="path" placeholder="Enter Path" value="<?php echo isset($form->path) ? $form->path : null; ?>">
                    </div>
                    <div class="form-group">
                        <label >Ext</label>
                        <input type="text" class="form-control" name="ext" placeholder="Enter Ext" value="<?php echo isset($form->ext) ? $form->ext : null; ?>">
                    </div>
                    <div class="form-group">
                        <label >Created_at</label>
                        <input type="text" class="form-control" name="created_at" placeholder="Enter Created_at" value="<?php echo isset($form->created_at) ? $form->created_at : null; ?>">
                    </div>
                    <div class="form-group">
                        <label >Updated_at</label>
                        <input type="text" class="form-control" name="updated_at" placeholder="Enter Updated_at" value="<?php echo isset($form->updated_at) ? $form->updated_at : null; ?>"> 
                    </div>
                     
                        <button class="btn btn-secondary" type="submit">Submit</button>
                </form>
            </div>
            <div class="content-imagedata">
                    <table class="table">
                            <thead>
                              <tr>
                              @foreach ($items[0]->getAttributes() as $key => $val)
                                @if($key===$sortColumn[0])
                                    <th scope="col" class="table-col" style="background:#f9f9f9;">{{$key}}
                                    @if($sortColumn[1]==='desc')
                                        <a href="{{ action('ImagesController@filtr', ['column' => $key, 'option' => 'asc']) }}"></a>
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    @elseif ($sortColumn[1]==='asc')
                                        <a href="{{ action('ImagesController@filtr', ['column' => $key, 'option' => 'desc']) }}"></a>
                                        <i class="fa fa-arrow-up" aria-hidden="true"></i>
                                    @endif
                                    </th>
                                @else
                                    <th scope="col" class="table-col"><a href="{{ action('ImagesController@filtr', ['column' => $key, 'option' => 'asc']) }}"></a>{{$key}}</th>
                                @endif
                                @if($key==='id')
                                    <th scope="col" class="table-col" style="background:#fff;">image</th>
                                @endif
                              @endforeach
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $k=>$item)
                                <tr class="table-row">
                                    <th scope="row">{{$item->id}}</th>
                                    <td><img data-toggle="modal" data-target="#modal-open-img" class="img-item" src="{{ url($item->path.$item->name.'.'.$item->ext) }}" alt="{{$item->name}}"></td>
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
                    @else
                        <div class="sup-div" style="text-align: center;">
                            <h1>You have 0 images</h1>
                        </div>
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
    <div class="modal" id="modal-open-add-img" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          <form id="addImage_form" action="{{url('/image')}}" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                <h5 class="modal-title">Add New Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="addimage_btn" class="btn">Choose image</label>
                        <input style="display:none;" name="image" type="file" class="form-control-file" id="addimage_btn">
                    </div>
                    <div class="form-group">
                        <label for="tag_add" class="btn">Tag:</label>
                        <input type="text" name="tag_add" class="form-control" id="tag_add" placeholder="Enter tag" required>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    <script>
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
        <?php if(isset($form)){ ?>
            var url_string = window.location.href;
            var url = new URL(url_string);
            var filter_params = url.search;
            $('.table-col').each(function(){
                var col=$(this);
                col.find('a').attr('href',col.find('a').attr('href')+filter_params);
            });
        <?php }?>
    </script>
</div>

</body>
</html>