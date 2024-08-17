@extends('admin.layout')

@section('title')
Edit Profile
@endsection


@section('content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Edit Profile</h2>
        </div>    
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>

        
    </div>


    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>


</section>


@endsection

@section('scripts')
        <script>
            document.getElementById('upload_button').addEventListener('click',function(e){
                console.log('clicked')
                e.preventDefault();
                document.getElementById('file').click();
            });  
        </script>
@endsection