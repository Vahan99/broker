@if(session()->has('message'))
    <div class="col-sm-4 col-md-4 pull-right">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-ok"></span> <strong>{{session()->get('message')['status']}} {{session()->get('message')['text']}}</strong>
        </div>
    </div>
@endif
