<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> 
    
    <!-- JQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Todo List</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-12 col-sm-12 col-12">
            </div>
            <div class="col-xl-4 col-md-12 col-sm-12 col-12">
                <!-- Card Task List -->
                <div class="wrapper">
                    <div class="card">
                        <div class="card-body">
                            <h4>Task List</h4>
                            <div class="divider"></div>
                            @foreach($todo as $t)
                            <div class="form-check" id="completeTask{{ $t->id }}">
                                @if($t->done == 0)  
                                    <label class="form-check-label check" id="checkActivity{{ $t->id }}">  
                                        <input type="checkbox" name="checkActivity" class="form-check-input" id="{{ $t->id }}" value="{{ $t->activity }}">{{ $t->activity }}
                                        <i id="checbox-icon{{ $t->id }}" class="checkbox-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z" fill="rgba(150,150,150,1)"/></svg></i>
                                    </label>
                                @else
                                    <label class="form-check-label uncheck" id="unCheckActivity{{ $t->id }}">
                                        <input type="checkbox" name="unCheckActivity" class="form-check-input" id="{{ $t->id }}" value="{{ $t->activity }}">{{ $t->activity }}
                                        <i id="checbox-icon{{ $t->id }}" class="checkbox-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm-.997-4L6.76 11.757l1.414-1.414 2.829 2.829 5.656-5.657 1.415 1.414L11.003 16z" fill="rgba(150,150,150,1)"/></svg></i>
                                    </label>
                                @endif
                            </div>
                            @endforeach
                            <div class="showForm">
                                <button class="btn showModal" id="showModal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"/></svg></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-12 col-sm-12 col-12">
            </div>
        </div>
    </div>
    
    <!-- Form Modal -->
    <div class="modal fade" id="formModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <h4>Add Activity</h4>
                    <div class="divider"></div>
                    <div class="wrapper-form">
                        <div id="notifikasi" class="text-center">

                        </div>
                        <form action="#">
                            <div class="form-group">
                                <label>Activity name</label>
                                <input type="text" id="activity" class="form-control activity" placeholder="Input your task...">
                            </div>  
                            <button id="submitHandle" class="btn submitHandle">Add activity</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
</body>
</html>