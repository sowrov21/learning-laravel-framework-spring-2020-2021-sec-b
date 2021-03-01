@extends('accountant.master')

@section('title')
    Accountant || Dashboard
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            {{ $data->id}}
            {{ $data->type}}
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>



@endsection
