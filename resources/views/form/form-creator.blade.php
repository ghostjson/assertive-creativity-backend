@extends('layout.main')


@section('content')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/formbuilder/0.2.1/formbuilder-min.css">

    <style>
        body {
            padding: 0;
            margin: 10px 0;
            background: #f2f2f2 url('http://formbuilder.readthedocs.io/en/latest/img/noise.png');
        }
    </style>

    <section class="form-creator">
        <div class="form-group">
            <label for="name">Form Name</label>
            <input class="form-control input-lg" type="text" placeholder="Enter Name" id="name">
        </div>
        <div class="form-group">
            <label for="slug">Form Slug</label>
            <input class="form-control" type="text" placeholder="Enter Slug" id="slug">
        </div>

        <div id="build-wrap"></div>

    </section>






@endsection

@section('scripts')

    <script src="/js/form-builder.min.js"></script>

    <script>

        let form;

        $(document).ready(function(){
             form = $('#build-wrap').formBuilder({
                 disabledActionButtons: ['data'],
                 onSave: function(evt,formData){

                     const data = {
                         name : $('#name').val(),
                         slug : $('#slug').val(),
                         formData: formData
                     }

                     console.log(data)
                 }
             });
        });

    </script>

@endsection
