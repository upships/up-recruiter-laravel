@extends('layouts.master')

@section('page-title','Careers page')

@section('content')

<div class="row">
    <div class="col">
    
        <h2>Careers page</h2>

        
 
    </div>
</div>
@endsection

@section('local-footer')

<script>

    new Vue({

        el: '#up-app',

        data: {

            page: [],
        },

        beforeMount: function() {

            let vm = this;

            axios.get('/api/company/career').then(function(response)    {

                vm.page = response.data;
                
            });
        }

    });

</script>

@endsection