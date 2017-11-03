@extends('layouts.master')

@section('page-title','Careers page')

@section('content')

<div class="row">
    <div class="col">
    
        <h2>Careers page</h2>

        <div class="card card-borderless">
            <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <li class="nav-item">
                    <a class="active" href="#" data-toggle="tab" role="tab" data-target="#tab-content"> 
                        Content
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-images">
                        Images
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-menus">
                        Menus
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-settings">
                        Settings
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <div id="tab-content" class="tab-pane active">
                    @include('app.company.careers.tabs.content')
                </div>

                <div id="tab-images" class="tab-pane">
                    @include('app.company.careers.tabs.images')
                </div>

                <div id="tab-menus" class="tab-pane">
                    @include('app.company.careers.tabs.menus')
                </div>

                <div id="tab-settings" class="tab-pane">
                    @include('app.company.careers.tabs.settings')
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
                    has_changes: false,
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

                this.update(type);
            },

            deleteItem: function(type, key) {

                Vue.delete(this['page'][type], key);

                this['new_data'][type]['has_changes'] = true;
            },

            update: function(type)  {

                let vm = this;
                let data = {type: type, data: this['page'][type] }

                axios.patch('/api/company/careers', data).then( function(response)   {

                    console.log('Updated');

                    vm['new_data'][type]['has_changes'] = false;

                });

            },


            moveItem: function (type, direction , key)  {

                var elements = this['page'][type];
                var length = elements.length;

                if((direction == 'up' && key > 0) || (direction == 'down', key < length ))  {

                    var replacedKey;
                    var replacedItem;

                    var temporaryKey = length++;

                    // Get new key

                    if(direction == 'up')   {

                        replacedKey = key--;
                    }
                    else {

                        replacedKey = key++;
                    }
                    
                    originalItem = elements[key];
                    replacedItem = elements[replacedKey];

                    // Set temporary items


                    // Switch items
                    Vue.set(elements, replacedKey, originalItem);
                    Vue.set(elements, key, replacedItem);

                    // Signal that there are changes to be saved
                    this['new_data'][type]['has_changes'] = true;
                }
            }


        },

    });

</script>

@endsection