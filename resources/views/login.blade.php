@section('css')
<style>
    .panel {display: none;}
</style>


<!-- Sidemenu-respoansive-tabs css -->
{{-- <link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet"> --}}
@endsection
@include('layouts.dashboard.header')


<div class="login-box">
    @if ($errors->has('loginError'))
    <div class="alert alert-danger">
        {{ $errors->first('loginError') }}
    </div>
@endif
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">تسجيل الدخول</p>
            <div class="form-group">
                <label for="exampleFormControlSelect1">حدد طريقة الدخول</label>
                <select class="form-control" id="sectionChooser">
                    <option value="" selected disabled>اختر من القائمة</option>
                    <option value="user">عميل</option>
                    <option value="admin">ادمن</option>
                    <option value="support_team">الدعم الفني</option>
                </select>
            </div>


            {{--form user--}}
            <div class="panel " id="user">
                <h2>الدخول كعميل</h2>
                <form action="{{ route('login.user') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        {{-- <x-form.input name="email" placeholder="username or email" required autofocus/> --}}
                        <input type="text" name="email" class="form-control" placeholder="email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <x-form.input type="password" name="password" placeholder="Password" />
                        {{-- <input type="password" name="password" class="form-control" placeholder="Password"> --}}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">
    
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">دخول</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>

            {{--form admin--}}
            <div class="panel" id="admin">
                <h2>الدخول كادمن</h2>
                <form action="{{ route('login.admin') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <x-form.input name="email" placeholder="username or email" required autofocus/>
                        {{-- <input type="text" name="email" class="form-control" placeholder="username or email"> --}}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <x-form.input type="password" name="password" placeholder="Password" />
                        {{-- <input type="password" name="password" class="form-control" placeholder="Password"> --}}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">
    
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">دخول</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>

            {{--form support team --}}
            <div class="panel" id="support_team">
                <form action="{{ route('login.support_team') }}" method="post" >
                    <h2>الدخول كدعم فني</h2>
                    @csrf
                    <div class="input-group mb-3">
                        <x-form.input name="email" placeholder="username or email" required autofocus/>
                        {{-- <input type="text" name="email" class="form-control" placeholder="username or email"> --}}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="input-group mb-3">
                        <x-form.input type="password" name="password" placeholder="Password" />
                        {{-- <input type="password" name="password" class="form-control" placeholder="Password"> --}}
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">دخول</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@section('js')
    <script>
        $('#sectionChooser').change(function(){
            var myID = $(this).val();
            $('.panel').each(function(){
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
@include('layouts.dashboard.footer')

 
