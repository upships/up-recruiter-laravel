@extends('layouts.master')

@section('page-title','Careers page')

@section('content')

<div class="row">
    <div class="col">
    
        <h2>Careers page</h2>
    </div>
</div>

<div class="row">
    <div class="col">

        <h3>Menu items</h3>
        
        <div class="card card-default">
            <div class="card-block">

                <div class="table-responsive">
                    <table class="table table-hover" id="basicTable">
                        <thead>
                            <tr>Label</tr>
                            <tr>Link</tr>
                            <tr>&nbsp;</tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" v-model="new_data.menu.label" placeholder="Label" >
                                </td>
                                <td>
                                    <input type="text" class="form-control" v-model="new_data.menu.link" placeholder="Link" >
                                </td>
                                <td>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-default" @click="addItem('menu')" >Save</button>
                                </td>
                            </tr>
                            
                            <tr v-for="(menu, key) in page.menu" >
                                <td>@{{menu.label}}</td>
                                <td>@{{menu.link}}</td>
                                <td>
                                    <a href="#del" @click="deleteItem('menu', key)" class="text-danger" >
                                        <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                    
                    
                    

                </div>
            </div>
        </div>
 
    </div>
</div>
@endsection

@section('local-footer')

<script>

    new Vue({

        el: '#up-app',

        data: {

            page: {
                menu: [],
                settings: [],
                content: []
            },

            new_data:   {

                menu: {
                    link: null,
                    label: null,
                },
            }
        },

        beforeMount: function() {

            let vm = this;

            axios.get('/api/company/careers').then(function(response)    {

                if(response.data.menu)  {

                    vm.page.menu = response.data.menu;    
                }
                
                if(response.data.settings)    {

                    vm.page.settings = response.data.settings;
                }

                if(response.data.content)    {

                    vm.page.content = response.data.content;
                }

            });
        },

        methods: {

            addItem: function(type) {

                var element = {};

                switch(type)    {

                    case 'menu':

                        element = {
                            link: this.new_data.menu.link,
                            label: this.new_data.menu.label,
                        }

                        this.new_data.menu.link = null;
                        this.new_data.menu.label = null;

                    break;
                }

                this['page'][type].push(element);
            },

            deleteItem: function(type, key) {

                Vue.delete(this['page'][type], key);
            }

        },

    });

</script>

@endsection