 <!-- model for admin user add in database -->

 <div class="modal fade" id="addadminuser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Admin</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <form method="POST" action="{{ URL::to('registeradmin') }}">
                         @csrf
                         <div class="mb-4">
                             <x-input-label for="name" :value="__('Name')" />
                             <x-text-input id="name" class="form-control form-control-solid" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                             <x-input-error :messages="$errors->get('name')" class="mt-2" />
                         </div>

                         <input type="hidden" name="madeby" value="1">

                         <div class="mb-4">
                             <label for="exampleFormControlSelect1">User type</label><select class="form-control form-control-solid" name="usertype" id="exampleFormControlSelect1">
                                 <option value="0">Master Admin</option>
                                 <option value="1">Sub Admin</option>
                                 <option value="2">Blogger</option>
                             </select>
                         </div>

                         <!-- Email Address  -->
                         <div class="mt-4">
                             <x-input-label for="email" :value="__('Email')" />
                             <x-text-input id="email" class="form-control form-control-solid" type="email" name="email" :value="old('email')" required autocomplete="username" />
                             <x-input-error :messages="$errors->get('email')" class="mt-2" />
                         </div>

                         <!-- Password  -->
                         <div class="mt-4">
                             <x-input-label for="password" :value="__('Password')" />
                             <x-text-input id="password" class="form-control form-control-solid" type="password" name="password" maxlength="10" required autocomplete="new-password" />
                             <x-input-error :messages="$errors->get('password')" class="mt-2" />
                         </div>

                         <!-- Confirm Password  -->
                         <div class="mt-4">
                             <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                             <x-text-input id="password_confirmation" class="form-control form-control-solid" type="password" name="password_confirmation" maxlength="10" required autocomplete="new-password" />
                             <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                         </div>

                         <div class="mt-4">
                             <x-primary-button class="ms-4 btn btn-primary">
                                 {{ __('Register') }}
                             </x-primary-button>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
         </div>
     </div>
 </div>


 <!-- model for service add in database -->

 <div class="modal fade" id="addservice" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Service</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <form class="user" id="formdata" method="POST" action="{{ URL::to('addservice') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         <div class="mt-4">
                             <label class="control-label">Service Name</label>
                             <input type="text" class="form-control form-control-user" placeholder="Service Name" name="name" value="" required autofocus>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">Short Description</label>
                             limit <span class="limit">0</span>/200
                             <textarea name="shortdescription" class="form-control form-control-user" id="shortdescription" aria-describedby="shortdescription" placeholder="Enter Short Service description for Home page..." value="" maxlength="200" required></textarea>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">Description</label>
                             limit <span class="limit">0</span>/2000
                             <textarea name="description" class="form-control form-control-user" id="description" aria-describedby="description5" placeholder="Enter Service description..." value="" maxlength="2000" rows="10" cols="50" required></textarea>
                         </div>

                         <div class="mt-4">
                             <label>Upload Service Image</label>
                             <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required="" accept="image/png, image/gif, image/jpeg, image/jpg" required>
                         </div>
                         <div class="mt-4">
                             <button type="submit" class="btn btn-success btn-user btn-block">
                                 Add Service
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
         </div>
     </div>
 </div>

 <!-- model for Chamber add in database -->

 <div class="modal fade" id="addchamber" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Chamber</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <form class="user" id="formdata2" method="POST" action="{{ URL::to('addchamber') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         <div class="mt-4">
                             <label class="control-label">Chamber Location</label>
                             <input type="text" class="form-control form-control-user" placeholder="........" name="name" value="" required autofocus>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">Available Days</label>

                             <div class="form-check">
                                 <input class="form-check-input dayselect" type="checkbox" value="1" name="day[]">
                                 <label class="form-check-label" for="flexCheckDefault">
                                     Sunday
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input dayselect" type="checkbox" value="2" name="day[]" checked>
                                 <label class="form-check-label" for="flexCheckChecked">
                                     Monday
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input dayselect" type="checkbox" value="3" name="day[]">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     Tuesday
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input dayselect" type="checkbox" value="4" name="day[]">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     Wednesday
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input dayselect" type="checkbox" value="5" name="day[]">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     Thursday
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input dayselect" type="checkbox" value="6" name="day[]">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     Friday
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input dayselect" type="checkbox" value="7" name="day[]">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     Saturday
                                 </label>
                             </div>

                             <div class="form-check">
                                 <input class="form-check-input" type="checkbox" value="0" id="alldays">
                                 <label class="form-check-label" for="flexCheckChecked">
                                     All
                                 </label>
                             </div>
                         </div>


                         <div class="mt-4">
                             <label class="control-label">Short Description</label>
                             limit <span class="limit">0</span>/200
                             <textarea name="description" class="form-control form-control-user" id="descriptionchamber" aria-describedby="description" placeholder="Enter description for Chamber..." value="" maxlength="200"></textarea>
                         </div>

                         <div class="mt-4">
                             <button type="submit" class="btn btn-success btn-user btn-block">
                                 Add Chamber
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
         </div>
     </div>
 </div>

 <!-- model for Banner and video add in database -->
 <div class="modal fade" id="addbannervideo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Banner or Video</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <form class="user" id="formdata6" method="POST" action="{{ URL::to('addbannervideo') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         <div class="mt-4">
                             <label>Upload Thumbnail Image</label>
                             <input type="file" class="form-control" name="fileToUpload" id="fileToUpload2" required="" accept="image/png, image/gif, image/jpeg, image/jpg" required>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">Video link </label>
                             <input type="url" pattern="https://.*" class="form-control form-control-user" placeholder="https://www.youtube.com/watch?v=tZJeArQpsrI" name="videolink" value="" autofocus>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">File Type</label>

                             <div class="form-check">
                                 <input class="form-check-input" type="radio" name="thumbnailtype" id="flexRadioDefault1" value="0">
                                 <label class="form-check-label" for="flexRadioDefault1">
                                     Banner
                                 </label>
                             </div>
                             <div class="form-check">
                                 <input class="form-check-input" type="radio" name="thumbnailtype" id="flexRadioDefault2" value="1" checked>
                                 <label class="form-check-label" for="flexRadioDefault2">
                                     Video panel
                                 </label>
                             </div>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">File Visibility</label>

                             <div class="form-check">
                                 <input class="form-check-input" type="radio" name="show" id="flexRadioDefault4" value="1" checked>
                                 <label class="form-check-label" for="flexRadioDefault4">
                                     Show
                                 </label>
                             </div>
                         </div>

                         <div class="form-check">
                             <input class="form-check-input" type="radio" name="show" id="flexRadioDefault3" value="0">
                             <label class="form-check-label" for="flexRadioDefault3">
                                 Hide
                             </label>
                         </div>

                         <div class="mt-4">
                             <button type="submit" class="btn btn-success btn-user btn-block">
                                 Add Banner or Video
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
         </div>
     </div>
 </div>


 <!-- modal for social media link -->
 <div class="modal fade" id="addsociallink" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Social Link</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <form class="user" id="formdata8" method="POST" action="{{ URL::to('addsociallink') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         <div class="mt-4">
                             <label class="control-label">Social Platform Name</label>
                             <input type="text" class="form-control form-control-user" placeholder="Youtube" name="name" value="" required autofocus>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">URL of the Platform </label>
                             <input type="url" pattern="https://.*" class="form-control form-control-user" placeholder="https://www.youtube.com/@AchariyaDebdutta" name="url" value="">
                         </div>

                         <div class="mt-4">
                             <label class="control-label">Social Platform Icon</label>
                             <input type="text" class="form-control form-control-user" placeholder='<i class=" fa-brands fa-youtube"></i>' name="icon" value="" required>
                         </div>

                         <div class="mt-4">
                             <button type="submit" class="btn btn-success btn-user btn-block">
                                 Add Social Platform
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
         </div>
     </div>
 </div>

 <!-- modal for blog add -->

 <div class="modal fade" id="addblog" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Add Blog</h5>
                 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <form class="user" id="formdatablog" method="POST" action="{{ URL::to('addblog') }}" enctype="multipart/form-data">
                         {{ csrf_field() }}

                         <div class="mt-4">
                             <label class="control-label">Title</label>
                             <input type="text" class="form-control form-control-user" placeholder="Daily Panchang" name="name" value="" required autofocus>
                         </div>

                         <div class="mt-4">
                             <label>Upload Image</label>
                             <input type="file" class="form-control" name="image" id="fileToUpload9" accept="image/png, image/gif, image/jpeg, image/jpg">
                         </div>

                         <div class="mt-4">
                             <label class="control-label">Description</label>
                             limit <span class="limit">0</span>/2000
                             <textarea name="blogdescription" class="form-control form-control-user" id="default" aria-describedby="description5" placeholder="Enter blog description..." value=""></textarea>
                         </div>
                         <div class="row">
                             <div style="width: 40%;">
                                 <label>Tags</label>
                                 <select name="tags[]" data-placeholder="Choose a Country..." class="chosen-select" multiple tabindex="4">
                                     <option value=""></option>
                                     @if(isset($tagsdata))
                                     @foreach ( $tagsdata as $tags )
                                     <option value="{{$tags}}">{{$tags}}</option>
                                     @endforeach
                                     @endif
                                 </select>
                             </div>
                             <div style="width: 60%;">
                                 <label>New Tags</label>
                                 <lable style="font-size:12px;">(enter "," between two Category )</lable>
                                 <input type="text" class="form-control form-control-user" placeholder="New Tags" name="newtags" multiple value="">
                             </div>
                         </div>
                         <div class="row">
                             <div style="width: 40%;">
                                 <label>Keywords</label>
                                 <select name="keyword[]" data-placeholder="Choose a Country..." class="chosen-select" multiple tabindex="4">
                                     <option value=""></option>
                                     @if(isset($keyworddata))
                                     @foreach ( $keyworddata as $keywords )
                                     <option value="{{$keywords}}">{{$keywords}}</option>
                                     @endforeach
                                     @endif
                                 </select>
                             </div>
                             <div style="width: 60%;">
                                 <label>New Keywords</label>
                                 <lable style="font-size:12px;">(enter "," between two Category )</lable>
                                 <input type="text" class="form-control form-control-user" placeholder="New Keywords" name="newkeyword" multiple value="">
                             </div>
                         </div>

                         <div class="row">
                             <div style="width: 40%;">
                                 <label>Category</label>
                                 <select data-placeholder=" Choose a Country..." class="chosen-select" multiple tabindex="4" name="category[]">
                                     <option value=""></option>
                                     @if(isset($categorydata))
                                     @foreach ( $categorydata as $categorys )
                                     <option value="{{$categorys}}">{{$categorys}}</option>
                                     @endforeach
                                     @endif
                                 </select>
                             </div>
                             <div style="width: 60%;">
                                 <label>New Category</label>
                                 <lable style="font-size:12px;">(enter "," between two Category )</lable>
                                 <input type="text" class="form-control form-control-user" placeholder="New Category" name="newcategory" multiple value="">
                             </div>
                         </div>

                         <div class="mt-4">
                             <button type="submit" class="btn btn-success btn-user btn-block">
                                 Add Blog
                             </button>
                         </div>
                     </form>
                 </div>
             </div>
             <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button></div>
         </div>
     </div>
 </div>