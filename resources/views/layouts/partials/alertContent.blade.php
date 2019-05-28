@if(session('info'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{--<div class="alert alert-success alert-dismissible fade show">
                    {{session('info')}}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>--}}
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> Exito!</h5>
                    {{session('info')}}
                </div>
            </div>
        </div>
    </div>
@endif