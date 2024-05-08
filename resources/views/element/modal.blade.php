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
                             limit <span class="limit">0</span>/100
                             <textarea name="shortdescription" class="form-control form-control-user" id="shortdescription" aria-describedby="shortdescription" placeholder="Enter Short Service description for Home page..." value="" maxlength="200"></textarea>
                         </div>

                         <div class="mt-4">
                             <label class="control-label">Description</label>
                             limit <span class="limit">0</span>/2000
                             <textarea name="description" class="form-control form-control-user" id="description" aria-describedby="description" placeholder="Enter Service description..." value="" maxlength="2000"></textarea>
                         </div>

                         <div class="mt-4">
                             <label>Upload Service Image</label>
                             <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" required="" accept="image/png, image/gif, image/jpeg, image/jpg">
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