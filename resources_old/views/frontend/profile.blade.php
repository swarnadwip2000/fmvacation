@extends('frontend.layouts.master')
@section('meta')
@endsection
@section('title')
    {{ env('APP_NAME') }} | My Profile
@endsection
@push('styles')
@endpush


@section('content')
<section class="dashboard_section section">
    <div class="container">
      <div class="row">
       @include('frontend.partials.sidebar')
       <div class="col-md-9">
        <div class="right_content_main">                      
          <div class="right_content">
            <div class="edit_profile">
                <a href="javascript:void(0);" id="edit_profile"><i
                        class="fa-solid fa-pen-to-square"></i></a>
            </div>
            <form action="{{ route('profile.update') }}" method="post" id="forms">
                @csrf
                <table class="table table-user-information">
                    <tbody>
                        <tr>
                            <td>First Name :</td>
                            <td class="data-field">{{ Auth::user()->first_name }}</td>
                            <td class="input-field">
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    value="{{ Auth::user()->first_name }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Last Name :</td>
                            <td class="data-field">{{ Auth::user()->last_name }}</td>
                            <td class="input-field">
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                    value="{{ Auth::user()->last_name }}">
                            </td>
                        </tr>
                       
                        <tr>
                            <td>Email :</td>
                            <td class="data-field"><a
                                    href="mailto:{{ Auth::user()->email }}">{{ Auth::user()->email }}</a>
                            </td>
                            <td class="input-field"><input type="text" name="email"
                                    class="form-control" id="email" value="{{ Auth::user()->email }}">
                            </td>
                        </tr>
                        <tr>
                            <td>Phone Number :</td>
                            <td class="data-field">{{ Auth::user()->phone }}
                            </td>
                            <td class="input-field"><input type="text" name="phone"
                                    class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                            </td>
                        </tr>
                        <tr>
                            <td id="d"></td>
                            <td colspan="" class="input-field text-end">
                                <button class="resend btn" type="submit"><span><i class="fas fa-profile"></i>
                                        Update</span></button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </form>
          </div>                  
        </div>
      </div>
      </div>
    </div>
  </section>
    <div loading="lazy" class="top__footer"></div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $('.input-field').hide();
        $('.red_btn').hide();
        $('#d').hide();
        $('#edit_profile').click(function() {
            $('.data-field').hide();
            $('.input-field').show();
            $('#edit_profile').hide();
            $('.red_btn').show();
            $('#d').show();
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#forms').validate({
            rules: {
                'first_name': {
                    required: true,
                },
                'last_name': {
                    required: true,
                },
                'phone': {
                    required: true,
                    minlength: 10,
                    maxlength: 11,
                },
                'email': {
                    required: true,
                    email: true,
                },
            },

            messages: {
                'first_name': {
                    required: 'Please enter your first name',
                },
                'last_name': {
                    required: 'Please enter your last name',
                },
                'phone': {
                    required: 'Please enter your phone number',
                    minlength: 'Please enter a valid phone number',
                    maxlength: 'Please enter a valid phone number',
                },
                'email': {
                    required: 'Please enter your email',
                    email: 'Please enter a valid email',
                }
            },
        });
    });
</script>
@endpush
